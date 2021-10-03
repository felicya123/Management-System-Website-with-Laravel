<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\Workbasket;
use App\TestingDoc;
use App\ITSRAssessment;
use App\ImplementationDoc;
use App\PostImplementationDoc;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationDeployDeadline;
use App\Mail\NotificationDeploy_h3;
use App\Mail\NotificationPATDeadline;
use App\Mail\NotificationPAT_h3;


class implementationController extends Controller
{
    public function show_file_memodeploy($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.MemoDeploy.memodeploy_file', compact('data'));
    }

    public function show_file_deploydoc($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.MemoDeploy.deploydoc_file', compact('data'));
    }

    public function show_file_ccr($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.CCR.ccr_file', compact('data'));
    }

    public function show_file_deployplan($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.CCR.deployplan_file', compact('data'));
    }

    public function show_file_rollbackplan($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.CCR.rollbackplan_file', compact('data'));
    }

    public function show_file_pat($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.PAT.pat_file', compact('data'));
    }

    public function show_file_golive($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.PAT.golive_file', compact('data'));
    }

    public function show_file_rollback($itsr_no){
        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.PAT.rollback_file', compact('data'));
    }

    public function create_memodeploy($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.memodeploy_file')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_memodeploy_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'memodeploy_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->memoDeployStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('implementationdocs','implementationdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for Memo Deploy to be approved by Business Owner";
            if($wb1->description=="Waiting for Memo Deploy to be revised by User"){
                $status = "Memo Deploy has been revised"; 
            }
            else{
                $status = "Memo Deploy has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "BO";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            
            return Redirect::route('index',Auth::user()->division)->with('success','Memo Deploy created successfully');
        }
    }

    public function approveMemodeploy_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.memodeploy_file')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $reject=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.reject_receiver')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.approval_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('reject',$reject)->with('users',$users);
    }

    public function approveMemodeploy_bo_store(Request $request,$id){
        $phase = "Phase5";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for Deploy Doc to be created by User";
            $div = "User";
        }else{
            $desc = "Waiting for Memo Deploy to be revised by User";
            $div ="User";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        $data = DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
        
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

       
        return Redirect::route('index',Auth::user()->division)->with('success','Memo Deploy Approval created successfully');
    }

    public function create_deploydoc($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.deploydoc_file','implementationdocs.memodeploy_file')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_deploydoc_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'deploydoc_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->deploydocStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for Deployment Doc to be verification by IT PMO";
            $status = "Deploy Doc has been created";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "IT_PMO";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','Deploy Docs created successfully');
        }
    }
    public function verif_deploydoc($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrassessments','itsrassessments.itsr_no','implementationdocs.itsr_no')
        ->select('itsrassessments.implementation_development','itsrassessments.security_testing')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.verif_deploydoc')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function verif_deploydoc_store(Request $request,$id){
        $phase = "Phase5";
        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->deploydocStore_verif($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for Deployment Doc to be viewed by IT Apps Manager";
            $status = "Deploy Doc has been verification by IT PMO";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "IT_AppsManager";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','Deployment Verification created successfully');
        }
    }

    public function view_deploydoc_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrassessments','itsrassessments.itsr_no','implementationdocs.itsr_no')
        ->select('itsrassessments.implementation_development','itsrassessments.security_testing')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $verif=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.view_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('verif',$verif);
    }

    public function view_deploydoc_am_store(Request $request,$id){
        $phase = "Phase5";
        $itsrd = new ITSRDetails();
        $desc = "Waiting for CCR, Deploy Plan and Rollback Plan to be upload by IT Developer";
        $status = "Deploy Doc has been viewed by IT Apps Manager";
        $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

        
        $div = "IT_Developer";
        $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        
        return Redirect::route('index',Auth::user()->division)->with('success','Deployment Verification View created successfully');
    }

    public function create_ccr_dev($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_ccr_dev_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'ccr_file' => 'required|mimes:pdf',
            'deployplan_file' => 'required|mimes:pdf',
            'rollbackplan_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->ccrStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin";
            $status = "CCR, Deploy Plan and Rollback Plan has been uploaded by IT Developer";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "Sysadmin";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','CCR - Deployment and Rollback Plan created successfully');
        }
    }

    public function view_ccr_sysadmin($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.view_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data);
    }

    public function view_ccr_sysadmin_store(Request $request,$id){
        $phase = "Phase5";
        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->ccrStore_view($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for Deployment Status to be updated by Sysadmin";
            $status = "CCR, Deployment Plan and Rollback Plan has been viewed by Sysadmin";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

           
            $div = "Sysadmin";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','CCR - Deployment and Rollback Plan View created successfully');
        }
    }

    public function update_deploy_sysadmin($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.update_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function update_deploy_sysadmin_store(Request $request,$id){
        $phase = "Phase5";
        if($request->status_itsr=='Deployment Done'){
            $desc = "Waiting for PAT Script to be upload by User";
            $div ="User";
        }else{
            $impdocs_id = DB::table('implementationdocs')
            ->select('implementationdocs.id')
            ->where('implementationdocs.itsr_no','=',$request->itsr_no)
            ->first();

            $deploy_end_date = DB::table('itsrassessments')
            ->select('itsrassessments.deploy_end_date')
            ->where('itsrassessments.itsr_no','=',$request->itsr_no)
            ->first();

            $curr_date =  new DateTime(date("Y-m-d"));  
            $end_date = $deploy_end_date->deploy_end_date;
            $end = new DateTime($end_date);
            $interval = $curr_date->diff($end);
            $days = $interval->format('%d');

            $ba= DB::table('users')
            ->join('implementationdocs','users.user_id','implementationdocs.email_sendto')
            ->select('users.email')
            ->where('implementationdocs.itsr_no','=',$request->itsr_no)
            ->first();

            if($days == 2){
                Mail::to($ba->email)->send(new NotificationDeploy_h3());
            }elseif($days == 0){
                Mail::to($ba->email)->send(new NotificationDeployDeadline());
            }
                    $desc = "Waiting for Deployment Status to be updated by Sysadmin";
                    $div ="Sysadmin";
                    $request->assign_to = "";
                }

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','Deployment Execution created successfully');
    }

    public function create_pat($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr);
    }

    public function create_pat_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'pat_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->patStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for PAT Status to be updated by User";
            $status = "PAT has been created by User";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "User";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','PAT Script created successfully');
        }
    }
    public function update_pat_status($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.update_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function update_pat_status_store(Request $request,$id){
        $phase = "Phase5";
        if($request->status_itsr=='PAT Done'){
            $desc = "Waiting for PAT to be approve by Business Owner";
            $div =  "BO";
        }else{
            $impdocs_id = DB::table('implementationdocs')
            ->select('implementationdocs.id')
            ->where('implementationdocs.itsr_no','=',$request->itsr_no)
            ->first();

            $pat_end_date = DB::table('itsrassessments')
            ->select('itsrassessments.pat_end_date')
            ->where('itsrassessments.itsr_no','=',$request->itsr_no)
            ->first();

            $curr_date =  new DateTime(date("Y-m-d"));  
            $end_date = $pat_end_date->pat_end_date;
            $end = new DateTime($end_date);
            $interval = $curr_date->diff($end);
            $days = $interval->format('%d');

            $ba= DB::table('users')
            ->join('implementationdocs','users.user_id','implementationdocs.email_sendto')
            ->select('users.email')
            ->where('implementationdocs.itsr_no','=',$request->itsr_no)
            ->first();

            if($days == 2){
                Mail::to($ba->email)->send(new NotificationPAT_h3());
            }elseif($days == 0){
                Mail::to($ba->email)->send(new NotificationPATDeadline());
            }
                    $desc = "Waiting for PAT Status to be updated by User";
                    $div ="User";
                    $request->assign_to = "";
                }

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
           
            return Redirect::route('index',Auth::user()->division)->with('success','PAT Execution created successfully');
    }
    public function approvePat_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.approval_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function approvePat_bo_store(Request $request,$id){
        $phase = "Phase5";
        if($request->status_itsr=="PAT Success"){
            $desc = "Waiting for Go-Live to be upload by Business Owner";
        }else{
            $desc = "Waiting for No Go-Live to be upload by Business Owner";
        }
        $div ="BO";
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        $data = DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
        
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);
       
       
        return Redirect::route('index',Auth::user()->division)->with('success','PAT Approval created successfully');
    }

    public function upload_golive($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function upload_golive_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'golive_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->goliveStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsr1 = DB::table('itsrs')
            ->join('implementationdocs','implementationdocs.itsr_no','itsrs.itsr_no')
            ->select('itsrs.request_type','itsrs.itsr_no')
            ->where(['itsrs.itsr_no'=>$request->itsr_no])
            ->first();
            $itsrd = new ITSRDetails();
            $status = "Go Live has been uploaded by Business Owner";

            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();

            if($itsr1->request_type == "Enhancement Besar" || $itsr1->request_type == "Enhancement Kecil"){
                $itsr = ITSR::findOrFail($itsr1->itsr_no);
                $itsr->itsrUpdate_Closed();
                $desc =  "Project done";
                $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
                $wb = new Workbasket();
                $wb->deleteWB($data->id);
            }else{
                $wb = Workbasket::find($data->id);
                $div = "User";
                $desc = "Waiting for PIR Doc to be upload by User";
                $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
                $wb->wbStore($request,$desc,$div);

                $postimpdoc = new PostImplementationDoc();
                $postimpdoc->postimpdocStore_first($request);
                
                $phase = "Phase6";
                $itsr = ITSR::findOrFail($request->itsr_no);
                $itsr->itsrUpdate_phase($phase);
            }

            return Redirect::route('index',Auth::user()->division)->with('success','GoLive created successfully');
        }
    }

    public function upload_no_golive($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function upload_no_golive_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'golive_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->goliveStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $desc = "Waiting for Rollback PAT Doc to be upload by Sysadmin";
            $status = "No Go Live has been uploaded by Business Owner";
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "Sysadmin";
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

           
            $itsrd = DB::table('itsrdetails')
            ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
            ->select('itsrdetails.id')
            ->where('itsrdetails.itsr_no','=',$request->itsr_no)
            ->first();

            return Redirect::route('index',Auth::user()->division)->with('success','NoGolive created successfully');
        }
    }

    public function upload_rollback($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('implementationdocs.id')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('*')
        ->where(['implementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('implementation.create_imp')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function upload_rollback_store(Request $request,$id){
        $phase = "Phase5";
        $this->validate($request,[
            'rollback_file' => 'required|mimes:pdf'
        ]);

        $imp_id = DB::table('implementationdocs')
        ->join('itsrs','itsrs.itsr_no','implementationdocs.itsr_no')
        ->select('implementationdocs.id')
        ->where('implementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $imp = ImplementationDoc::findOrFail($imp_id->id);
        $imp->rollbackPATStore_create($request);
        
        if(!$imp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsr1 = DB::table('itsrs')
            ->join('implementationdocs','implementationdocs.itsr_no','itsrs.itsr_no')
            ->select('itsrs.request_type','itsrs.itsr_no')
            ->where(['itsrs.itsr_no'=>$request->itsr_no])
            ->first();

            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            if($request->status_itsr == "Rollback PAT Done"){
                if($itsr1->request_type == "Enhancement Besar" || $itsr1->request_type == "Enhancement Kecil"){
                    $itsr = ITSR::findOrFail($itsr1->itsr_no);
                    $itsr->itsrUpdate_Closed();
                    $desc =  "Project done";
                    $wb = new Workbasket();
                    $wb->deleteWB($data->id);
                }else{
                    $div = "User";
                    $desc = "Waiting for PIR Doc to be upload by User";
                    
                    $wb = Workbasket::find($data->id);
                    $wb->wbStore($request,$desc,$div);

                    $postimpdoc = new PostImplementationDoc();
                    $postimpdoc->postimpdocStore_first($request);

                    $itsrd = new ITSRDetails();
                    $itsrd->itsrdStore($request,$desc,$phase);
        
                    $itsr = ITSR::findOrFail($request->itsr_no);
                    $phase = "Phase6";
                    $itsr->itsrUpdate_phase($phase);
                }
            }
            else{
                $desc = "Waiting for Rollback PAT Doc to be upload by Sysadmin";
                $div ="Sysadmin";
                $data = DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                
                $request->assign_to = Auth::user()->fullname;
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }

            return Redirect::route('index',Auth::user()->division)->with('success','Rollback PAT created successfully');
    }
    }
}
