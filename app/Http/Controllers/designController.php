<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\Workbasket;
use App\DesignDoc;
use App\DevelopmentDoc;
use App\DevelopmentDev;
use App\ITSRAssessment;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;

class designController extends Controller
{
    
    public function show_file_fsd($itsr_no){
        $data= DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.fsd_file', compact('data'));
    }

    public function show_file_review_fsd_user($itsr_no){
        $data= DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.fsd_user_review_file', compact('data'));
    }

    public function show_file_review_fsd_bahead($itsr_no){
        $data= DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.fsd_bahead_review_file', compact('data'));
    }

    public function show_file_tsd($itsr_no){
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.tsd_file', compact('data'));
    }

    public function show_file_review_tsd_sa($itsr_no){
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.tsd_sa_review_file', compact('data'));
    }

    public function show_file_review_tsd_infra($itsr_no){
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.tsd_infra_review_file', compact('data'));
    }
    public function show_file_review_tsd_security($itsr_no){
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.tsd_security_review_file', compact('data'));
    }
    
    //IT BA-
    public function createFSD($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();
        
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();
        return view('design.fsd.create_fsd')->with('wb',$wb)->with('id',$id)->with('data',$data)->with('itsr',$itsr)->with('users',$users);
    }

    public function createFSD_store(Request $request,$id){
        $this->validate($request,[
            'fsd_file' => 'required|mimes:pdf'
        ]);

        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $fsd = DesignDoc::findOrFail($design_id->id);
        $fsd->fsdStore_create($request);
        
        if(!$fsd->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $status = "FSD has been created";
            $desc = "Waiting for FSD to be reviewed by User";
            $div = "User";
            $phase = "Phase2";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);


            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','FSD created successfully');
        }
    }

    //USER
    public function reviewFSD_user($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject=  DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.review_fsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function reviewFSD_user_store(Request $request,$id){
        $phase = "Phase2";
        $this->validate($request,[
            'reviewfsd_user' => 'mimes:pdf'
        ]);

        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $fsd = DesignDoc::findOrFail($design_id->id);
        $fsd->fsdStore_reviewuser($request);

       

        if(!$fsd->save()){
            return back()->withError('Failed to Insert !');
        }else{
            if($request->status_itsr=='Approve'){
                $desc = "Waiting for FSD to be reviewed by IT BA Head";
                $div = "IT_BAHead";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }else{
                $desc = "Waiting for FSD to be revised by IT BA";
                $div = "IT_BA";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
            return Redirect::route('index',Auth::user()->division)->with('success','FSD Review created successfully');
        }
    }

    //BA HEAD
    public function reviewFSD_bahead($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();
        
        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();
       

        return view('design.fsd.review_fsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }
    public function reviewFSD_bahead_store(Request $request,$id){
        $this->validate($request,[
            'reviewfsd_bahead' => 'mimes:pdf'
        ]);

        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $fsd = DesignDoc::findOrFail($design_id->id);
        $fsd->fsdStore_reviewbahead($request);
        
        

        if(!$fsd->save()){
            return back()->withError('Failed to Insert !');
        }else{
            if($request->status_itsr=='Approve'){
                $desc = "Waiting for FSD to be approved by Business Owner";
                $div ="BO";
                $phase = "Phase2";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }else{
                $desc = "Waiting for FSD to be revised by IT BA";
                $div ="IT_BA";
                $phase = "Phase2";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
            return Redirect::route('index',Auth::user()->division)->with('success','FSD Review created successfully');
        }
    }

    //BUSINESS OWNER
    public function approveFSD_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.approve_fsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveFSD_BO_store(Request $request){
        $phase ="Phase2";
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for FSD to be approved by IT Apps Manager";
            $div = "IT_AppsManager";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
        
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }else{
            $desc = "Waiting for FSD to be revised by IT BA";
            $div = "IT_BA";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','FSD Approval created successfully');
    }

    //IT APPS MANAGER //IT AM
    public function approveFSD_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.approve_fsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('aassess',$assess)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveFSD_IT_AM_store(Request $request){
        $phase = "Phase2";
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for FSD to be approved by IT Owner";
            $div = "IT_Owner";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }else{
            $desc = "Waiting for FSD to be revised by IT BA";
            $div = "IT_BA";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','FSD Approval created successfully');
    }

    public function approveTSD_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

         $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.approve_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveTSD_IT_AM_store(Request $request){
        
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for TSD to be approved by IT Owner";
            $div = "IT_Owner";
            $phase ="Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }else{
            $desc = "Waiting for TSD to be revised by IT Developer";
            $div = "IT_Developer";
            $phase ="Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','TSD Approval created successfully');
    }

    //IT OWNER
    public function approveFSD_owner($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();
        
        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.fsd_file','designdocs.fsd_review_user_file','designdocs.fsd_review_bahead_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.fsd.approve_fsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveFSD_IT_Owner_store(Request $request){
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for TSD to be created by IT Developer";
            $div = "IT_Developer";
            $phase = "Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }else{
            $desc = "Waiting for FSD to be revised by IT BA";
            $div = "IT_BA";
            $phase = "Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','FSD Approval created successfully');
    }

    public function approveTSD_IT_Owner($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.approve_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveTSD_IT_Owner_store(Request $request){
        $phase2="Phase2";
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for Development Progress to be submitted by IT Developer";
            $div = "IT_Developer";
            $phase3 = "Phase3";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase2);

            $devdoc = new DevelopmentDoc();
            $devdoc->devdocStore_first($request);

            $dev = new DevelopmentDev();
            $dev->devStore_first($request);

            $itsr = ITSR::findOrFail($request->itsr_no);
            $itsr->itsrUpdate_phase($phase3);
        }else{
            $desc = "Waiting for TSD to be revised by IT Developer";
            $div = "IT_Developer";
            $phase2 = "Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase2);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','TSD Approval created successfully');
    }

    //IT DEVELOPER
    public function createTSD($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();
        $users = DB::table('users')
        ->select('*')
        ->get();
        
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.tsd_file','designdocs.tsd_review_sa_file','designdocs.tsd_review_infra_file','designdocs.tsd_review_security_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.create_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data);
    }

    public function createTSD_store(Request $request,$id){
        $this->validate($request,[
            'tsd_file' => 'required|mimes:pdf'
        ]);
        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $tsd = DesignDoc::findOrFail($design_id->id);
        $tsd->tsdStore_create($request);

        
        if(!$tsd->save()){
            return back()->withError('Failed to Insert !');
        }else{
            $desc = "Waiting for TSD to be reviewed by IT_SA";
            $status = "TSD has been created";
            $div = "IT_SA";
            $phase = "Phase2";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
            
            return Redirect::route('index',Auth::user()->division)->with('success','TSD created successfully');
        }
    }

    //IT SA
    public function reviewTSD_sa($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);

        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('itsrassessments.impacted_app','itsrassessments.pic_impacted_app1','itsrassessments.pic_impacted_app2','itsrassessments.pic_impacted_app3','itsrassessments.total_impacted_app')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        
        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.tsd_file','designdocs.tsd_review_sa_file','designdocs.tsd_review_infra_file','designdocs.tsd_review_security_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.review_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('assess',$assess)->with('reject',$reject);
    }

    public function reviewTSD_sa_store(Request $request,$id){
        $this->validate($request,[
            'tsd_sa_review_file' => 'mimes:pdf'
        ]);

        $assessments = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->where('itsrassessments.itsr_no','=',$request->itsr_no)
        ->select('itsrassessments.id')
        ->first();

        $assess = ITSRAssessment::findOrFail($assessments->id);

       
        if($request->status_itsr=="Approve"){
             //gaada impacted app
             if($assess->impacted_app == "0" ){
                $desc = "Waiting for TSD to be reviewed by IT Security";
                $div = "IT_Security";
                $phase = "Phase2";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
               
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
            //ada impacted app
            elseif($assess->impacted_app !="0"){
                $desc = "Waiting for TSD to be reviewed by Impacted IT SA";
                $div = "IT_SA";
                $phase = "Phase2";
    
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
               
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
        }else{
            $desc = "Waiting for TSD to be revised by IT Developer";
            $div = "IT_Developer";
            $phase = "Phase2";
    
            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
               
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $tsd = DesignDoc::findOrFail($design_id->id);
        $tsd->tsdStore_reviewsa($request);
            
        if(!$tsd->save()){
            return back()->withError('Failed to Insert !');
        }else{
            return Redirect::route('index',Auth::user()->division)->with('success','TSD Review created successfully');
        }
    
    }
    public function reviewTSD_sa_impacted_store(Request $request, $id){
        $assessments = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->where('itsrassessments.itsr_no','=',$request->itsr_no)
        ->select('itsrassessments.id')
        ->first();

        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        if($request->tsd_sa_review_file  != null){
            $tsd = DesignDoc::findOrFail($design_id->id);
            $tsd->tsdStore_reviewsa($request);
            if(!$tsd->save()){
                return back()->withError('Failed to Insert !');
            }
        }

        $assess = ITSRAssessment::findOrFail($assessments->id);
        $assess->assessStore_itsaimpact($assess->total_impacted_app);

        if($request->status_itsr=='Approve'){
            if($assess->total_impacted_app == "0"){
                $desc = "Waiting for TSD to be reviewed by IT Security";
                $div = "IT_Security";
                $phase = "Phase2";
        
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);

                $assess->countImpactedSA($assess);
            }else{
                $desc = "Waiting for TSD to be reviewed by Impacted IT SA";
                $div = "IT_SA";
                $phase = "Phase2";
        
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
        }else{
            $desc = "Waiting for TSD to be revised by IT Developer";
            $div = "IT_Developer";
            $phase = "Phase2";
    
            $wb = new Workbasket();
            $wb->wbStore($request,$desc,$div);
            
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','TSD Review created successfully');
    }

    //IT SECURITY
    public function reviewTSD_security($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.tsd_file','designdocs.tsd_review_sa_file','designdocs.tsd_review_infra_file','designdocs.tsd_review_security_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();


        return view('design.tsd.review_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function reviewTSD_security_store(Request $request,$id){
        $this->validate($request,[
            'tsd_security_review_file' => 'mimes:pdf'
        ]);
        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        if($request->tsd_security_review_file  != null){
            $tsd = DesignDoc::findOrFail($design_id->id);
            $tsd->tsdStore_reviewsecurity($request);
            if(!$tsd->save()){
                return back()->withError('Failed to Insert !');
            }

        }
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_phase2($request);

            if($request->status_itsr=='Approve'){
                $desc = "Waiting for TSD to be reviewed by IT Infra";
                $div = "IT_Infra";
                $phase = "Phase2";
        
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }else{
                $desc = "Waiting for TSD to be revised by IT Developer";
                $div = "IT_Developer";
                $phase = "Phase2";
        
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                
                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
            return Redirect::route('index',Auth::user()->division)->with('success','TSD Review created successfully');
        
    }

    //IT INFRA 
    public function reviewTSD_infra($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.id')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('designdocs','designdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('designdocs.tsd_file','designdocs.tsd_review_sa_file','designdocs.tsd_review_infra_file','designdocs.tsd_review_security_file')
        ->where(['designdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('design.tsd.review_tsd')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function reviewTSD_infra_store(Request $request,$id){
        $this->validate($request,[
            'tsd_infra_review_file' => 'required|mimes:pdf'
        ]);

        $design_id = DB::table('designdocs')
        ->join('itsrs','itsrs.itsr_no','designdocs.itsr_no')
        ->select('designdocs.id')
        ->where('designdocs.itsr_no','=',$request->itsr_no)
        ->first();

        
        
        if($request->tsd_infra_review_file  != null){
            $tsd = DesignDoc::findOrFail($design_id->id);
            $tsd->tsdStore_reviewinfra($request);
            if(!$tsd->save()){
                return back()->withError('Failed to Insert !');
            }

        }
        

    
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for TSD to be approved by IT Apps Manager";
            $div = "IT_AppsManager";
            $phase = "Phase2";
        
            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
                
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }else{
            $desc = "Waiting for TSD to be revised by IT Developer";
            $div = "IT_Developer";
            $phase = "Phase2";
        
            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
                
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }
       
        return Redirect::route('index',Auth::user()->division)->with('success','TSD Review created successfully');
    
    }
}
