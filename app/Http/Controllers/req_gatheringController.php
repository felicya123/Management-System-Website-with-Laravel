<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\ITSRAssessment;
use App\Workbasket;
use App\DesignDoc;
use App\DevelopmentDoc;
use App\DevelopmentDev;
use App\TestingDoc;
use App\ImplementationDoc;
use App\PostImplementationDoc;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;

class req_gatheringController extends Controller
{
    public function viewdashboard(){
        
        $itsrD1 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase1')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_1');
        $itsrD2 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase2')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_2');
        $itsrD3 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase3')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_3');
        $itsrD4 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase4')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_4');
        $itsrD5 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase5')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_5');
        $itsrD6 = ITSR::orderBy('created_at','asc')->where('stage','=','Phase6')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_6');

        $itsrD1a = ITSR::orderBy('created_at','asc')->where('stage','!=','Phase1')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_1a');
        $itsrD2a = ITSR::orderBy('created_at','asc')->where('stage','!=','Phase2')->where('stage','!=','Phase1')->where('development_choice','=','Third Party (Vendor)')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_2a');
        $itsrD3a = ITSR::orderBy('created_at','asc')->where('stage','!=','Phase3')->where('stage','!=','Phase2')->where('stage','!=','Phase1')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_3a');
        $itsrD4a = ITSR::orderBy('created_at','asc')->where('stage','!=','Phase4')->where('stage','!=','Phase3')->where('stage','!=','Phase2')->where('stage','!=','Phase1')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_4a');
        $itsrD5a = ITSR::orderBy('created_at','asc')->where('stage','!=','Phase5')->where('stage','!=','Phase4')->where('stage','!=','Phase3')->where('stage','!=','Phase2')->where('stage','!=','Phase1')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_5a');
        
        $itsr3 =  new ITSR();
        $itsr = $itsr3->getITSR();
        $itsrd1 =  new ITSRDetails();
        $itsrd = $itsrd1->getITSRDetails();
        $assess1 =  new ITSRAssessment();
        $assess = $assess1->getITSRAssess();
        $wb1 =  new Workbasket();
        $wb = $wb1->getWB();
        $design1 =  new DesignDoc();
        $design = $design1->getPhase2();
        $dev1 =  new DevelopmentDoc();
        $dev = $dev1->getPhase3();
        $testing1 =  new TestingDoc();
        $testing = $testing1->getPhase4();
        $imp1 =  new ImplementationDoc();
        $imp = $imp1->getPhase5();
        $post_imp1 =  new PostImplementationDoc();
        $post_imp = $post_imp1->getPhase6();

        return view('index.dashboard_all')->with('wb',$wb)->with('itsrd',$itsrd)->with('itsr',$itsr)->with('itsrD1',$itsrD1)->with('itsrD2',$itsrD2)->with('itsrD3',$itsrD3)->with('itsrD4',$itsrD4)->with('itsrD5',$itsrD5)->with('itsrD6',$itsrD6)->with('itsrD1a',$itsrD1a)->with('itsrD2a',$itsrD2a)->with('itsrD3a',$itsrD3a)->with('itsrD4a',$itsrD4a)->with('itsrD5a',$itsrD5a)->with('assess',$assess)->with('design',$design)->with('dev',$dev)->with('testing',$testing)->with('imp',$imp)->with('post_imp',$post_imp);
    }

    public function searchProject(){
        $itsr = ITSR::orderBy('created_at','asc')->paginate(10, ['*'], 'pagination_1a');
        $itsrA = ITSR::orderBy('created_at','asc')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_A');
        $itsrC = ITSR::orderBy('created_at','asc')->where('status_assignment','=','Closed')->paginate(10, ['*'], 'pagination_C');
        
        // $itsr1 =  new ITSR();
        // $itsr = $itsr1->getITSR();
        // $itsr2 =  new ITSR();
        // $itsrA = $itsr2->getITSRActive();
        // $itsr3 =  new ITSR();
        // $itsrC = $itsr3->getITSRClosed();
        $itsrd1 =  new ITSRDetails();
        $itsrd = $itsrd1->getITSRDetails();
        $assess1 =  new ITSRAssessment();
        $assess = $assess1->getITSRAssess();
        $wb1 =  new Workbasket();
        $wb = $wb1->getWB();
        $design1 =  new DesignDoc();
        $design = $design1->getPhase2();
        $dev1 =  new DevelopmentDoc();
        $dev = $dev1->getPhase3();
        $testing1 =  new TestingDoc();
        $testing = $testing1->getPhase4();
        $imp1 =  new ImplementationDoc();
        $imp = $imp1->getPhase5();
        $post_imp1 =  new PostImplementationDoc();
        $post_imp = $post_imp1->getPhase6();
        return view('itsr.searchProject')->with('itsrd',$itsrd)->with('itsr',$itsr)->with('itsrA',$itsrA)->with('itsrC',$itsrC)->with('wb',$wb)->with('assess',$assess)->with('design',$design)->with('dev',$dev)->with('testing',$testing)->with('imp',$imp)->with('post_imp',$post_imp);
    }

    
    public function view_itsr_assess($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users=   DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.view_itsr_assessment')->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function dropProject(){
        $itsr = \App\ITSR::all();
        return view('dropproject.dropProject')->with('itsr',$itsr);
    }

    public function dropProject_reason($id){
        $itsr =  ITSR::findOrFail($id);
        $itsr_no = DB::table('itsrs')
        ->select('itsr_no')
        ->where(['itsr_no'=>$id])
        ->first();

        $data =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('itsrdetails','itsrs.itsr_no','itsrdetails.itsr_no')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','itsrdetails.id')
        ->where('workbaskets.itsr_no','=',$id)
        ->get();

        $users = \App\User::all();
        return view('dropproject.dropProject_reason')->with('data',$data)->with('users',$users)->with('itsr_no',$itsr_no);
    }

    public function dropProject_reason_store(Request $request,$id){
        $desc =  "Waiting for Project to be reviewed by Business Owner";
        $div = "BO";
        $current_user = Auth::user();

        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore_dropProject($request);
       
        $data = DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
                
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        return Redirect::route('index',Auth::user()->division)->with('success','Request Drop Project created successfully');
    }

    public function approve_dropProject($id){
        $itsr =  ITSR::findOrFail($id);
        $itsr_no = DB::table('itsrs')
        ->select('itsr_no')
        ->where(['itsr_no'=>$id])
        ->first();

        $itsrd = \App\ITSRDetails::all();
        $itsrd = $itsrd->reverse();
        
        $data =  DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','itsrdetails.id','itsrdetails.stage','itsrdetails.description_temp','itsrdetails.assign_to_temp','itsrdetails.division_temp')
        ->where('itsrdetails.itsr_no','=',$id)
        ->orderBy('itsrdetails.created_at','DESC')
        ->get();

        $users = \App\User::all();
        return view('dropproject.approve_dropProject')->with('data',$data)->with('users',$users)->with('itsr_no',$itsr_no);
    }

    public function approve_dropProject_store(Request $request){
        $current_user = Auth::user();
        
        if($request->status_itsr == "Dropped"){
            $itsr = ITSR::findOrFail($request->itsr_no);
            $status = "Closed";
            $itsr->itsrUpdate_statusAssignment($status);

            $phase = "Done";
            $desc = "ITSR has been dropped";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $currwb = Workbasket::find($data->id);
            $currwb->deleteWB($currwb->id);
           
        }else{
            $desc = "Drop ITSR has been canceled";
            $itsrd = new ITSRDetails();
            $itsrd->itsrdCancelDropStore($request,$desc);

            $itsrd_new = new ITSRDetails();
            $itsrd_new->itsrdNewStore($request);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$itsrd->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbCancelDrop($request);
        }
        return Redirect::route('index',Auth::user()->division)->with('success','Drop Project Approval created successfully');
    }

    public function show($id){
        $data= ITSRDetails::findOrFail($id);
        return view('index')->with('data',$data);
    }

    public function create(){
        return view('itsr.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'itsr_no' => 'required | unique:itsrs',
            'total_mandays' => 'required|numeric',
            'itsr_file' => 'required|mimes:pdf'
        ]);
        $itsr = new ITSR();
        $itsr->itsrStore($request);

        if(!$itsr->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            $desc = "Waiting ITSR to be reviewed by IT BA";
            $div = "IT_BA";

            $wb = new Workbasket();
            $wb->wbStore($request,$desc,$div);
        
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_first($request);
          
            return Redirect::route('index',Auth::user()->division)->with('itsr',$itsr)->with('success','ITSR created successfully');
        }
    }

    public function show_itsr_file($itsr_no){
        $data = ITSR::findOrFail($itsr_no);
        return view('itsr.itsr_file', compact('data'));
    }

    public function show_prereview_file($itsr_no){
        $data = ITSR::findOrFail($itsr_no);
        return view('itsr.prereview_file', compact('data'));
    }

    public function show_assessment_file($itsr_no){
        $id = DB::table('itsrassessments')
        ->select('itsrassessments.id')
        ->where('itsrassessments.itsr_no','=',$itsr_no)
        ->first();
        
        $data = ITSRAssessment::findOrFail($id->id);

        return view('itsr.assessment_file', compact('data'));
    }



    //REVISI ITSR BY USER ---------------------------
    public function editITSR($itsr_no)
    {
       $itsr = ITSR::findOrFail($itsr_no);

       $data=   DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('itsrdetails','itsrs.itsr_no','itsrdetails.itsr_no')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','itsrdetails.id')
        ->get();

        $id=   DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrdetails.id')
        ->where(['itsrdetails.itsr_no'=>$itsr_no])
        ->first();

        $user= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$itsr_no)
        ->first();

        return view('itsr.edit_itsr')->with('data',$data)->with('id',$id)->with('itsr',$itsr);
    }

    public function editITSR_store(Request $request, $itsr_no) 
    {  
        $itsr = ITSR::findOrFail($itsr_no);
        $itsr->itsrUpdatePreReview($request);

        if(!$itsr->save()){
            return back()->withError('Failed to Insert !');
        }else{
            $descwb = "Waiting ITSR to be reviewed by IT BA";
            $div = "IT_BA";
           
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_first($request);

            $user= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($user->id);
            $wb->wbStore($request,$descwb,$div);
            
          
            return redirect('dashboard')->with('itsr',$itsr)->with('success','ITSR created successfully');
        }
    } 

    public function reviewRequest($itsr_no){
       $itsr = ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('itsrdetails','itsrs.itsr_no','itsrdetails.itsr_no')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','itsrdetails.id')
        ->get();

        $id=   DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrdetails.id')
        ->where(['itsrdetails.itsr_no'=>$itsr_no])
        ->first();

        $bas =  DB::table('users')
        ->select('*')
        ->where('division','=','IT_BA')
        ->get();

        $users =  DB::table('users')
        ->select('*')
        ->where('division','=','User')
        ->get();
        
        return view('itsr.review_request')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('users',$users)->with('bas',$bas);
    }

    public function reviewRequest_store(Request $request){
        $itsr = ITSR::findOrFail($request->itsr_no);

        $phase= "Phase1";
        
        if($request->status_itsr == 'Approve'){
            //ada pre review
        $itsr->itsrUpdatePreReview($request);
            if($itsr->pre_review_status == "1"){
                $request->assign_to=null;
                $request->assign_to2==null;
                $desc = "Waiting for pre-review to be uploaded by IT BA";
                $div = "IT_BA";

                $data = DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
            else{
                $request->assign_to=null;
                $request->assign_to2==null;
                $desc = "Waiting for ITSR Assessment to be uploaded by IT BA";
                $div = "IT_BA";

                $data = DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                
                $assess = new ITSRAssessment();
                $assess->assessStore_first($request);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);
            }
        }else{
            $desc = "Waiting for ITSR to be revised by User";
            $div = "User";
            $request->assign_to = $request->assignto_reject;

            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
        }

        return Redirect::route('index',Auth::user()->division)->with('success','ITSR Review created successfully');
        
    }

    public function createPrereview($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        $data =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrdetails.id')
        ->where(['itsrdetails.itsr_no'=>$itsr_no])
        ->first();

        $users =  DB::table('users')
        ->select('*')
        ->get();
        return view('itsr.create_prereview')->with('data',$data)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }
    

    public function createPrereview_store(Request $request){
        $itsr= ITSR::findOrFail($request->itsr_no);
        $itsr->itsrUpdatePreReviewFile($request);
 
        if(!$itsr->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            $desc = "Waiting for Pre-Review to be submitted by User";
            $status = "Pre-Review has been uploaded by IT BA";
            $phase = "Phase1";
            $div = "User";

            $itsrd =  new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

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
            ->where('itsrdetails.itsr_no','=',$itsrd->itsr_no)
            ->first();
            return Redirect::route('index',Auth::user()->division)->with('success','ITSR PreReview created successfully');
        }
    }

    public function createAssessment($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $assess =  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $users =  DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function createAssessment_store(Request $request, $id){
        $request->validate([
            'assessment_start_date' => 'required|date',
            'assessment_end_date' => 'required|date|after_or_equal:assessment_start_date',
            'project_description' => 'required',
            'scope_of_work' => 'required',
            'user_requirement' => 'required',
            'assessment_file' => 'required|mimes:pdf'
        ]);
       

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_itba($request);
        

        if(!$assess->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            
            $desc = "Waiting IT BA Assessment to be approved by IT BA Head";
            $status = "ITSR Assessment has been created by IT BA";
            $phase = "Phase1";
            $div = "IT_BAHead";

            $itsrd =  new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
          
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$itsrd->itsr_no)
            ->first();
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            $itsrd = DB::table('itsrdetails')
            ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
            ->select('itsrdetails.id')
            ->where('itsrdetails.itsr_no','=',$itsrd->itsr_no)
            ->first();
           
           return Redirect::route('index',Auth::user()->division)->with('itsr',$assess)->with('success','ITSR Assessment created successfully');
        }
    }

    public function editAssessment($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $assess =  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $users =  DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.assessment_revision')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function editAssessment_store(Request $request, $id){
        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_itba($request);

        if($assess->save()){
            $desc = "Waiting IT BA Assessment to be approved by IT BA Head";
            $status = "ITSR Assessment has been created by IT BA";
            $phase = "Phase1";
            $div = "IT_BAHead";

            $itsrd =  new ITSRDetails();
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
            
            
            $data = DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$itsrd->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
        }

        $itsrd = DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->select('itsrdetails.id')
        ->where('itsrdetails.itsr_no','=',$itsrd->itsr_no)
        ->first();
       
        return Redirect::route('index',Auth::user()->division)->with('assess',$assess);
    }

    public function reviewPrereview($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $data=  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('itsrdetails','itsrdetails.itsr_no','workbaskets.itsr_no')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','itsrs.pre_review_file')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->first();
        
        $id= DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->select('itsrdetails.id')
        ->where(['itsrdetails.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.review_prereview')->with('data',$data)->with('id',$id)->with('itsr',$itsr)->with('users',$users);
    }

    public function reviewPrereview_store(Request $request){
        $status = "Pre-review has been submitted by User";
        $desc = "Waiting for ITSR Assessment to be uploaded by IT BA";
        $phase = "Phase1";
        $div = "IT_BA";

        $itsrd =  new ITSRDetails();
        $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

        $data = DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$itsrd->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        $assess = new ITSRAssessment();
        $assess->assessStore_first($request);      
        
        return Redirect::route('index',Auth::user()->division)->with('success','User PreReview created successfully');
    }
    
    public function user($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();
        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_user_store(Request $request, $id){
        $itsr = ITSR::findOrFail($request->itsr_no);

        $assess_id = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->select('itsrassessments.id')
        ->where('itsrassessments.itsr_no','=',$request->itsr_no)
        ->first();

        $assess = ITSRAssessment::findOrFail($assess_id->id);
        $phase1 = "Phase1";
        if($request->status_itsr=='Approve'){
            if($assess->implementation_development == "Third Party (Vendor)"){
                $desc = "Waiting for FSD to be submitted by IT BA";
                $div = "IT_BA";
                
                $phase2 = "Phase2";

                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                

               
                $itsr->itsrUpdate_phase($phase2);

                $designdoc = new DesignDoc();
                $designdoc->fsdStore_first($request);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase1);
               
                
            }else{
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

                $itsr->itsrUpdate_phase($phase3);

                $devdoc = new DevelopmentDoc();
                $devdoc->devdocStore_first($request);

                $dev = new DevelopmentDev();
                $dev->devStore_first($request);

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase1);
            }
            
        }else{
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_dropProject($request);
            
            $div = "BO";
            $desc = "Waiting for Project to be reviewed by Business Owner";
            $phase1 = "Phase1";

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();

            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            
        }
        return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
    }

    public function approval_bahead($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $assess =  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $id=  DB::table('itsrdetails')
        ->join('itsrs','itsrs.itsr_no','itsrdetails.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrdetails.id')
        ->where(['itsrdetails.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.approval_bahead')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_bahead_store(Request $request){
        $phase = "Phase1";
        
        if($request->status_itsr=='Approve'){
            $desc = "Waiting for Assessment to be reviewed by IT_SA";
            $div = "IT_SA";

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
            $desc = "Waiting for Assessment to be revised by IT BA";
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
       
        return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment Approval created successfully');
    }

    public function indexAll($division){
        $wb = \App\Workbasket::where('division','=',$division)->get();
        $itsrd = \App\ITSRDetails::all();
        $itsrd = $itsrd->reverse();
        $assess=  \App\ITSRAssessment::where('impacted_app','=','1')->get();
        return view('index.index_all',['wb' => $wb,'itsrd'=>$itsrd,'assess'=>$assess]);
    }

    public function sa($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users=   DB::table('users')
        ->select('*')
        ->get();
        

        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_sa_store(Request $request,$id){
        $request->validate([
            'impacted_app' => 'required'
        ]);

        $phase = "Phase1";
        $assess= ITSRAssessment::findOrFail($id);
        $assess->assessStore_itsa($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{

             //gaada impacted app
             if($assess->impacted_app == "0"){
                $desc = "Waiting for Assessment to be reviewed by IT Security";
                $div = "IT_Security";

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
            else if($assess->impacted_app == "1"){
                $desc = "Waiting for Assessment to be reviewed by IT SA(Impacted)";
                $div = "IT_SA";
                $request->assign_to = $request->pic_impacted_app1;
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
        
        
        return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }

        
           
    }

    

    public function approval_sa_impacted_store(Request $request,$id){
        $phase = "Phase1";
        $assess_id = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->select('itsrassessments.id')
        ->where('itsrassessments.itsr_no','=',$request->itsr_no)
        ->first();

        $assess= ITSRAssessment::findOrFail($assess_id->id);
        $assess->assessStore_itsaimpact($assess->total_impacted_app);

        
            if($assess->total_impacted_app != "0" ){
                $desc = "Waiting for Assessment to be reviewed by IT SA(Impacted)";
                $div = "IT_SA";
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
                $desc = "Waiting for Assessment to be reviewed by IT Security";
                $div = "IT_Security";

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
            }
        return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
    }

    public function security($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();
        $users=   DB::table('users')
        ->select('*')
        ->get();
        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_security_store(Request $request, $id){
        $request->validate([
            'security_testing' => 'required',
            'penetration_test_internal' => 'required',
            'penetration_test_vendor' => 'required',
            'user_matrix_doc' => 'required',
            'assessment_security' => 'required'
        ]);

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_itsecurity($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            $desc = "Waiting for Assessment to be reviewed by SKMR";
            $phase = "Phase1";
            $div = "SKMR";
    
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
    
            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }
    }

    public function skmr($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();
        $users=   DB::table('users')
        ->select('*')
        ->get();
        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_skmr_store(Request $request, $id){
        $request->validate([
            'assessment_skmr' => 'required',
        ]);

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_skmr($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            $desc = "Waiting for Assessment to be reviewed by SKK";
            $div = "SKK";
            $phase = "Phase1";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
        
            return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }
    }

    public function skk($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users=   DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_skk_store(Request $request, $id){
        $request->validate([
            'report_ojk' => 'required',
            'reportregulator_approval' => 'required',
            'assessment_skk' => 'required'
        ]);

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_skk($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !')->withInput($request->input());
        }else{
            $desc = "Waiting for Assessment to be reviewed by IT Apps Manager";
            $div = "IT_AppsManager";
            $phase = "Phase1";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            $itsr = ITSR::findOrFail($request->itsr_no);

            //smntr
            if($assess->reportregulator_approval == "0"){
                $reg_approval = "No";
                $itsr->itsrUpdate_regApproval($reg_approval);
                
            }else{
                $reg_approval = "Yes";
                $itsr->itsrUpdate_regApproval($reg_approval);
            }

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);        

            return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }
    }

    public function am($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $users=   DB::table('users')
        ->select('*')
        ->get();

        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_am_store(Request $request, $id){
        $this->validate($request,[
            'dev_start_date' => 'required|date',
            'dev_end_date' => 'required|date|after:dev_start_date',
            'sit_start_date' => 'required|date|after:dev_end_date',
            'sit_end_date' => 'required|date|after:sit_start_date',
            'sat_start_date' => 'required|date|after:sit_end_date',
            'sat_end_date' => 'required|date|after:sat_start_date',
            'uat_start_date' => 'required|date|after:sat_end_date',
            'uat_end_date' => 'required|date|after:uat_start_date',
            'deploy_start_date' => 'required|date|after:uat_end_date',
            'deploy_end_date' => 'required|date|after:deploy_start_date',
            'pat_start_date' => 'required|date|after:deploy_end_date',
            'pat_end_date' => 'required|date|after:pat_start_date',
            'golive_date' => 'required|date|after:pat_end_date'
        ]);

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_itam($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !');
        }else{
            $desc = "Waiting for Assessment to be reviewed by IT PMO";
            $div = "IT_PMO";
            $phase = "Phase1";

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);
    
           

            $itsr = ITSR::findOrFail($request->itsr_no);
            $itsr->itsrUpdate_Devchoice($request);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }
    
    }

    public function pmo($itsr_no){
        $itsr = ITSR::findOrFail($itsr_no);
        
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();
        
        $assess = DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('workbaskets','workbaskets.itsr_no','itsrs.itsr_no')
        ->select('*')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('itsrassessments')
        ->join('itsrs','itsrs.itsr_no','itsrassessments.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('itsrassessments.id')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();
        $users=   DB::table('users')
        ->select('*')
        ->get();
        return view('itsr.create_assessment')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('assess',$assess)->with('users',$users);
    }

    public function approval_pmo_store(Request $request, $id){
        $desc = "Waiting for Assessment to be reviewed by User";
        $div = "User";
        $phase = "Phase1";

        $assess = ITSRAssessment::findOrFail($id);
        $assess->assessStore_itpmo($request);

        if(!$assess->save()){
            return back()->withError('Failed to Insert !');
        }else{

            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase);

            //smntr
            $itsr = ITSR::findOrFail($request->itsr_no);
            $itsr->itsrUpdate_requestType($request);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','ITSR Assessment created successfully');
        }
    }
}
