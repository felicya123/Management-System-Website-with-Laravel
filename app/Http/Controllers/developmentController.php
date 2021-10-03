<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\Workbasket;
use App\DevelopmentDoc;
use App\DevelopmentDev;
use App\TestingDoc;
use \App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationDevelopmentDeadline;
use App\Mail\NotificationDevelopment_h2;

class developmentController extends Controller
{
    public function show_file_dev($id){
        $data =  DB::table('developmentdev')
        ->join('developmentdocs','developmentdocs.id','developmentdev.dev_id')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('developmentdev.dev_file')
        ->where(['developmentdev.id'=>$id])
        ->get();
        return view('development.devprogress_file', compact('data'));
    }

    public function show_file_dev_sa($itsr_no){
        $data=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();
        return view('development.devprogress_sa_file', compact('data'));
    }

    //IT DEVELOPER //DEVELOPER
    public function createDev($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();
        

        $data = DB::table('developmentdev')
        ->join('developmentdocs','developmentdocs.id','developmentdev.dev_id')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $dev = DB::table('developmentdev')
        ->select('*')
        ->where('developmentdev.dev_id','=',$data->id)
        ->get();

        return view('development.create_dev')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('dev',$dev);
    }

    public function createDev_store(Request $request, $id){
        $this->validate($request,[
            'dev_file' => 'mimes:pdf'
        ]);

        $devdev_itsr = DB::table('developmentdev')
        ->join('developmentdocs','developmentdocs.id','developmentdev.dev_id')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->select('developmentdev.id')
        ->where('developmentdocs.itsr_no','=',$request->itsr_no)
        ->orderBy('id','desc')
        ->first();

        $devdoc = DB::table('developmentdocs')
        ->select('developmentdocs.id')
        ->where('developmentdocs.itsr_no','=',$request->itsr_no)
        ->first();

        if($request->dev_file  != null){
            $dev = DevelopmentDev::findOrFail($devdev_itsr->id);
            $dev->devstore($request);
            if(!$dev->save()){
                return back()->withError('Failed to Insert !');
            }
        }else{
            $dev = DevelopmentDev::findOrFail($devdev_itsr->id);
            $dev->devStore_withoutfile($request);
        }

        $devdoc = DevelopmentDoc::findOrFail($devdoc->id);
        $devdoc->devdocStore_rejectreceiver($request);
        $devdoc->devdocStore($request);
        
        
            $desc =  "Waiting for Development to be updated by IT SA";
            $div = "IT_SA";
            $phase = "Phase3";
            $status = "Development has been started";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
        
            return Redirect::route('index',Auth::user()->division)->with('success','Development created successfully');
        
    }

    //IT SA
    public function submitDev_sa($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();
        

        $data=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('developmentdev','developmentdev.dev_id','developmentdocs.id')
        ->select('*')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->get();

        

        return view('development.submit_dev')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data);
    }

    public function updateDev_sa($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject =  DB::table('users')
        ->join('developmentdocs','developmentdocs.reject_receiver','users.fullname')
        ->select('users.fullname')
        ->get();
        
        $data = DB::table('developmentdev')
        ->join('developmentdocs','developmentdocs.id','developmentdev.dev_id')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $dev = DB::table('developmentdev')
        ->select('*')
        ->where('developmentdev.dev_id','=',$data->id)
        ->get();

        $dev2 = DB::table('developmentdocs')
        ->select('*')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->get();

        return view('development.update_dev')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('dev',$dev)->with('data',$data)->with('reject',$reject)->with('dev2',$dev2);
    }

    public function updateDev_sa_store(Request $request,$id){

        $dev_doc = DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->select('developmentdocs.id')
        ->where('developmentdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $dev = DevelopmentDoc::findOrFail($dev_doc->id);
        $dev->devdocStore($request);

       
    if($request->status_itsr=='Development Done'){
        $desc =  "Waiting for Development to be submitted by IT SA";
        $div = "IT_SA";
        $phase = "Phase3";
        $request->assign_to = "";

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
            $devdocs_id = DB::table('developmentdocs')
            ->select('developmentdocs.id')
            ->where('developmentdocs.itsr_no','=',$request->itsr_no)
            ->first();
            $dev = new DevelopmentDev();
            $dev->devStore_first($request);

            $developer= DB::table('users')
            ->join('developmentdocs','users.user_id','developmentdocs.developer_id')
            ->select('users.email')
            ->where('developmentdocs.itsr_no','=',$request->itsr_no)
            ->first();

            $end_date_dev = DB::table('itsrassessments')
            ->select('itsrassessments.dev_end_date')
            ->where('itsrassessments.itsr_no','=',$request->itsr_no)
            ->first();



            $curr_date =  new DateTime(date("Y-m-d"));  
            $end_date = $end_date_dev->dev_end_date;
            $end = new DateTime($end_date);
            $interval = $curr_date->diff($end);
            $days = $interval->format('%d');

            

            

            if($days == 2){
                Mail::to($developer->email)->send(new NotificationDevelopment_h2());
            }elseif($days == 0){
                Mail::to($developer->email)->send(new NotificationDevelopmentDeadline());
            }
                $desc = "Waiting for Development Execution to be updated by IT Developer";
                $div ="IT_Developer";
                $phase = "Phase3";

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
            }
            return Redirect::route('index',Auth::user()->division)->with('success','Development Update created successfully');
    }

    public function submitDev_sa_store(Request $request,$id){

        if($request->dev_file_sa  != null){
            $dev = DevelopmentDoc::findOrFail($id);
            $dev->devdocStore_submitdev($request);
            if(!$dev->save()){
                return back()->withError('Failed to Insert !');
            }
        }
        
        
            $desc = "Waiting for Development to be approved by IT Apps Manager";
            $status = "Development submitted by IT SA";
            $div = "IT_AppsManager";
            $phase = "Phase3";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','Development Submission created successfully');
    }

    //IT AM //IT APPS MANAGER
    public function approveDev($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('developmentdocs.id')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        $reject = DB::table('users')
        ->join('developmentdocs','developmentdocs.reject_receiver','users.user_id')
        ->select('users.fullname')
        ->get();
        

        $data=  DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('developmentdev','developmentdev.dev_id','developmentdocs.id')
        ->select('*')
        ->where(['developmentdocs.itsr_no'=>$itsr_no])
        ->get();

        return view('development.approve_dev')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('data',$data)->with('reject',$reject);
    }

    public function approveDev_store(Request $request){
        $itsr = ITSR::findOrFail($request->itsr_no);

        if($request->status_itsr=='Approve'){
            $desc =  "Waiting for SIT Test Plan to be submitted by IT BA";
            $div = "IT_BA";
            $phase4 = "Phase4";
            $phase3 = "Phase3";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase3);

            $testing = new TestingDoc();
            $testing->testingdocStore_first($request);
            $itsr->itsrUpdate_phase($phase4);
        }else{
            $desc =  "Waiting for Development to be revised by IT Developer";
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
            $itsrd->itsrdStore($request,$desc,$phase3);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','Development Approval created successfully');
    }
}
