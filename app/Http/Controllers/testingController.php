<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\Workbasket;
use App\TestingDoc;
use App\ITSRAssessment;
use App\ImplementationDoc;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationSITDeadline;
use App\Mail\NotificationSIT_h3;
use App\Mail\NotificationSATDeadline;
use App\Mail\NotificationSAT_h3;
use App\Mail\NotificationUATDeadline;
use App\Mail\NotificationUAT_h3;


class testingController extends Controller
{
    public function show_file_sit_tp($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tp_file', compact('data'));
    }

    public function show_file_sit_tp_sa($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tp_review_sa_file', compact('data'));
    }

    public function show_file_sit_tp_bahead($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tp_review_bahead_file', compact('data'));
    }

    public function show_file_sit_report($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_report_file', compact('data'));
    }

    public function show_file_sit_tr($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tr_file', compact('data'));
    }

    public function show_file_sit_tr_sa($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tr_review_sa_file', compact('data'));
    }

    public function show_file_sit_tr_bahead($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sit.sit_tr_review_bahead_file', compact('data'));
    }

    public function show_file_sat_tp($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sat.sat_tp_file', compact('data'));
    }

    public function show_file_sat_report($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sat.sat_report_file', compact('data'));
    }

    public function show_file_sat_tr($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.sat.sat_tr_file', compact('data'));
    }

    public function show_file_uat_tp($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.uat.uat_tp_file', compact('data'));
    }

    public function show_file_uat_report($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.uat.uat_report_file', compact('data'));
    }

    public function show_file_uat_tr($itsr_no){
        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('testing.uat.uat_tr_file', compact('data'));
    }

    public function create_sit_tp($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_sit_tp_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sit_tp_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_create($request);
        
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for SIT Test Plan to be reviewed by IT SA";
            $div = "IT_SA";
            if($wb1->description=="Waiting for SIT Test Plan to be revised by IT BA"){
                $status = "SIT Test Plan has been revised"; 
            }
            else{
                $status = "SIT Test Plan has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Plan created successfully');
        }
    }

    public function update_sit($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.update')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function update_sit_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sit_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_update($request);
        
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            if($request->status_itsr=='SIT Done'){
                $desc = "Waiting for SIT Test Result to be submitted by IT BA";
                $div = "IT_BA";
                $request->assign_to = "";
            }else{
                $sitdocs_id = DB::table('testingdocs')
                ->select('testingdocs.id')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                $sit_end_date = DB::table('itsrassessments')
                ->select('itsrassessments.sit_end_date')
                ->where('itsrassessments.itsr_no','=',$request->itsr_no)
                ->first();

                $curr_date =  new DateTime(date("Y-m-d"));  
                $end_date = $sit_end_date->sit_end_date;
                $end = new DateTime($end_date);
                $interval = $curr_date->diff($end);
                $days = $interval->format('%d');

                $ba= DB::table('users')
                ->join('testingdocs','users.user_id','testingdocs.email_sendto')
                ->select('users.email')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                if($days == 2){
                    Mail::to($ba->email)->send(new NotificationSIT_h3());
                }elseif($days == 0){
                    Mail::to($ba->email)->send(new NotificationSITDeadline());
                }
                    $desc = "Waiting for SIT Execution Status to be updated by IT BA";
                    $div ="IT_BA";
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
        
                return Redirect::route('index',Auth::user()->division)->with('success','SIT Execution created successfully');
        }
    }

    public function create_sit_tr($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_sit_tr_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sit_tp_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_create2($request);
        
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for SIT Test Result to be reviewed by IT SA";
            $div = "IT_SA";

            if($wb1->description=="Waiting for SIT Test Result to be revised by IT BA"){
                $status = "SIT Test Result has been revised"; 
            }
            else{
                $status = "SIT Test Result has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Result created successfully');
        }
    }

    //IT SA
    public function reviewSIT_tp_sa($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.review')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function reviewSIT_tp_sa_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sit_file' => 'required|mimes:pdf'
        ]);
       
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Plan to be reviewed by IT BA Head";
            $div = "IT_BAHead";
        }else{
            $desc = "Waiting for SIT Test Plan to be revised by IT BA";
            $div ="IT_BA";
        }

        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_sareview($request);
            
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }else{
            
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Plan Review created successfully');
        }
    }

    public function reviewSIT_tr_sa($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.review')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function reviewSIT_tr_sa_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sit_file' => 'required|mimes:pdf'
        ]);
       
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Result to be reviewed by IT BA Head";
            $div = "IT_BAHead";
        }else{
            $desc = "Waiting for SIT Test Result to be revised by IT BA";
            $div ="IT_BA";
        }

        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_sareview2($request);
            
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }else{
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Result Review created successfully');
        }
    }

    //IT BA HEAD
    public function reviewSIT_tp_bahead($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.review')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function reviewSIT_tp_bahead_store(Request $request,$id){
        $this->validate($request,[
            'sit_file' => 'required|mimes:pdf'
        ]);

        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Plan to be approved by IT Apps Manager";
            $div = "IT_AppsManager";
        }else{
            $desc = "Waiting for SIT Test Plan to be revised by IT BA";
            $div ="IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_baheadreview($request);
            
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }else{
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Plan Review created successfully');
        }
    }

    public function reviewSIT_tr_bahead($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.review')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function reviewSIT_tr_bahead_store(Request $request,$id){
        $this->validate($request,[
            'sit_file' => 'required|mimes:pdf'
        ]);

        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Result to be approved by IT Apps Manager";
            $div = "IT_AppsManager";
        }else{
            $desc = "Waiting for SIT Test Result to be revised by IT BA";
            $div ="IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sit = TestingDoc::findOrFail($testing_id->id);
        $sit->sitStore_baheadreview2($request);
            
        if(!$sit->save()){
            return back()->withError('Failed to Insert !');
        }else{
            return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Result Review created successfully');
        }
    }

    //IT APPS MANAGER //IT AM
    public function approveSIT_tp_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveSIT_tp_am_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Plan to be approved by IT Owner";
            $div = "IT_Owner";
        }else{
            $desc = "Waiting for SIT Test Plan to be revised by IT BA";
            $div ="IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        
        return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Plan Approval created successfully');
    }

    public function approveSIT_tr_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveSIT_tr_am_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Test Result to be approved by IT Owner";
            $div = "IT_Owner";
        }else{
            $desc = "Waiting for SIT Test Result to be revised by IT BA";
            $div ="IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Result Approval created successfully');
    }

    //IT OWNER
    public function approveSIT_tp_owner($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveSIT_tp_owner_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SIT Execution Status to be updated by IT BA";
            $div = "IT_BA";
        }else{
            $desc = "Waiting for SIT Test Plan to be revised by IT BA";
            $div ="IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Plan Approval created successfully');
    }

    public function approveSIT_tr_owner($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $assess = DB::table('itsrassessments')
        ->join('testingdocs','testingdocs.itsr_no','itsrassessments.itsr_no')
        ->select('itsrassessments.id','itsrassessments.security_testing')
        ->where(['itsrassessments.itsr_no'=>$itsr_no])
        ->first();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sit.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('assess',$assess)->with('reject',$reject);
    }

    public function approveSIT_tr_owner_store(Request $request, $id){
        $phase = "Phase4";

        $assess = DB::table('itsrassessments')
        ->join('testingdocs','testingdocs.itsr_no','itsrassessments.itsr_no')
        ->select('itsrassessments.id','itsrassessments.security_testing')
        ->where(['itsrassessments.itsr_no'=>$request->itsr_no])
        ->first();
       
        if($request->status_itsr=="Approve"){
            if($assess->security_testing=='1'){
                $desc = "Waiting for SAT Test Plan to be submitted by IT Security";
                $div = "IT_Security";
            }
            else{
                $desc = "Waiting for UAT Test Plan to be submitted by User";
                $div = "User";
            }
        }else{
            $desc = "Waiting for SIT Test Result to be revised by IT BA";
            $div = "IT_BA";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        return Redirect::route('index',Auth::user()->division)->with('success','SIT Test Result Approval created successfully');
    }

    //IT SECURITY
    public function create_sat_tp($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sat.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_sat_tp_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sat_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sat = TestingDoc::findOrFail($testing_id->id);
        $sat->satStore_create($request);
        
        if(!$sat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();
            
            $itsrd = new ITSRDetails();
            $desc = "Waiting for SAT Test Plan to be approved by IT Security Head";
            if($wb1->description=="Waiting for SAT Test Plan to be revised by IT Security"){
                $status = "SAT Test Plan has been revised"; 
            }
            else{
                $status = "SAT Test Plan has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            
            $div = "IT_SecurityHead";
            
            $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','SAT Test Plan created successfully');
        }
    }

    public function update_sat($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sat.update')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function update_sat_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sat_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sat = TestingDoc::findOrFail($testing_id->id);
        $sat->satStore_update($request);
        
        if(!$sat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_phase4($request);
            if($request->status_itsr=='SAT Done'){
                $desc = "Waiting for SAT Test Result to be submitted by IT Security";
                $div = "IT_Security";
                $request->assign_to = "";
            }else{
                $satdocs_id = DB::table('testingdocs')
                ->select('testingdocs.id')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                $sat_end_date = DB::table('itsrassessments')
                ->select('itsrassessments.sat_end_date')
                ->where('itsrassessments.itsr_no','=',$request->itsr_no)
                ->first();

                $curr_date =  new DateTime(date("Y-m-d"));  
                $end_date = $sat_end_date->sat_end_date;
                $end = new DateTime($end_date);
                $interval = $curr_date->diff($end);
                $days = $interval->format('%d');

                $ba= DB::table('users')
                ->join('testingdocs','users.user_id','testingdocs.email_sendto')
                ->select('users.email')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                if($days == 2){
                    Mail::to($ba->email)->send(new NotificationSAT_h3());
                }elseif($days == 0){
                    Mail::to($ba->email)->send(new NotificationSATDeadline());
                }
                    $desc = "Waiting for SAT Execution Status to be updated by IT Security";
                    $div ="IT_Security";
                    $request->assign_to = "";
                }

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);

                
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                return Redirect::route('index',Auth::user()->division)->with('success','SAT Execution created successfully');
        }
    }

    public function create_sat_tr($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sat.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_sat_tr_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'sat_file' => 'required|mimes:pdf'
        ]);
        
        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $sat = TestingDoc::findOrFail($testing_id->id);
        $sat->satStore_create2($request);
        
        if(!$sat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for SAT Test Result to be approved by IT Security Head";
            if($wb1->description=="Waiting for SAT Test Result to be revised by IT Security"){
                $status = "SAT Test Result has been revised"; 
            }
            else{
                $status = "SAT Test Result has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);
            $div = "IT_SecurityHead";
            
            $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','SAT Test Result created successfully');
        }
    }

    //IT SECURITY HEAD
    public function approveSAT_tp_securityhead($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sat.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveSAT_tp_securityhead_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for SAT Execution Status to be updated by IT Security";
            $div = "IT_Security";
        }else{
            $desc = "Waiting for SAT Test Plan to be revised by IT Security";
            $div ="IT_Security";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);
        
        return Redirect::route('index',Auth::user()->division)->with('success','SAT Test Plan Approval created successfully');
    }

    public function approveSAT_tr_securityhead($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.sat.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveSAT_tr_securityhead_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for UAT Test Plan to be submitted by User";
            $div = "User";
        }else{
            $desc = "Waiting for SAT Test Result to be revised by IT Security";
            $div ="IT_Security";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        
        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

       
        return Redirect::route('index',Auth::user()->division)->with('success','SAT Test Result Approval created successfully');
    }

    //USER
    public function create_uat_tp($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.uat.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_uat_tp_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'uat_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $uat = TestingDoc::findOrFail($testing_id->id);
        $uat->uatStore_create($request);
        
        if(!$uat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for UAT Test Plan to be approved by Business Owner";
            if($wb1->description=="Waiting for UAT Test Plan to be revised by User"){
                $status = "UAT Test Plan has been revised"; 
            }
            else{
                $status = "UAT Test Plan has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            $div = "BO";
            
            $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            return Redirect::route('index',Auth::user()->division)->with('success','UAT Test Plan created successfully');
        }
    }

    public function update_uat($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.uat.update')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function update_uat_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'uat_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $uat = TestingDoc::findOrFail($testing_id->id);
        $uat->uatStore_update($request);
        
        if(!$uat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore_phase4($request);
            if($request->status_itsr=='UAT Done'){
                $desc = "Waiting for UAT Test Result to be submitted by User";
                $div ="User";
                $request->assign_to = "";
            }else{
                $uatdocs_id = DB::table('testingdocs')
                ->select('testingdocs.id')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                $uat_end_date = DB::table('itsrassessments')
                ->select('itsrassessments.uat_end_date')
                ->where('itsrassessments.itsr_no','=',$request->itsr_no)
                ->first();

                $curr_date =  new DateTime(date("Y-m-d"));  
                $end_date = $uat_end_date->uat_end_date;
                $end = new DateTime($end_date);
                $interval = $curr_date->diff($end);
                $days = $interval->format('%d');

                $ba= DB::table('users')
                ->join('testingdocs','users.user_id','testingdocs.email_sendto')
                ->select('users.email')
                ->where('testingdocs.itsr_no','=',$request->itsr_no)
                ->first();

                if($days == 2){
                    Mail::to($ba->email)->send(new NotificationUAT_h3());
                }elseif($days == 0){
                    Mail::to($ba->email)->send(new NotificationUATDeadline());
                }
                    $desc = "Waiting for UAT Execution Status to be updated by User";
                    $div ="User";
                    $request->assign_to = "";
                }

                $itsrd = new ITSRDetails();
                $itsrd->itsrdStore($request,$desc,$phase);

                
                $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
                $wb = Workbasket::find($data->id);
                $wb->wbStore($request,$desc,$div);
                return Redirect::route('index',Auth::user()->division)->with('success','UAT Execution created successfully');
        }
    }

    public function create_uat_tr($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.uat.create')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_uat_tr_store(Request $request,$id){
        $phase = "Phase4";
        $this->validate($request,[
            'uat_file' => 'required|mimes:pdf'
        ]);

        $testing_id = DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.id')
        ->where('testingdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $uat = TestingDoc::findOrFail($testing_id->id);
        $uat->uatStore_create2($request);
        
        if(!$uat->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('testingdocs','testingdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for UAT Test Result to be approved by Business Owner";
            if($wb1->description=="Waiting for UAT Test Result to be revised by User"){
                $status = "UAT Test Result has been revised"; 
            }
            else{
                $status = "UAT Test Result has been created";
            }
            $itsrd->itsrdStore_withoutStatus($request,$desc,$status,$phase);

            $div = "BO";
            
            $data= DB::table('workbaskets')
                ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
                ->select('workbaskets.id')
                ->where('workbaskets.itsr_no','=',$request->itsr_no)
                ->first();
                    
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
            return Redirect::route('index',Auth::user()->division)->with('success','UAT Test Result created successfully');
        }
    }

    //BO //Business Owner
    public function approveUAT_tp_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.uat.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveUAT_tp_bo_store(Request $request){
        $phase = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for UAT Execution Status to be updated by User";
            $div = "User";
        }else{
            $desc = "Waiting for UAT Test Plan to be revised by User";
            $div ="User";
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

        $data= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
            
        $wb = Workbasket::find($data->id);
        $wb->wbStore($request,$desc,$div);

        return Redirect::route('index',Auth::user()->division)->with('success','UAT Test Plan Approval created successfully');
    }

    public function approveUAT_tr_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('testingdocs.id')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $reject=  DB::table('testingdocs')
        ->join('itsrs','itsrs.itsr_no','testingdocs.itsr_no')
        ->select('testingdocs.reject_receiver')
        ->where(['testingdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('testing.uat.approve')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users)->with('reject',$reject);
    }

    public function approveUAT_tr_bo_store(Request $request){
        $phase4 = "Phase4";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for Memo Deploy to be submitted by User";
            $div = "User";
            $itsrd = new ITSRDetails();
            $itsrd->itsrdStore($request,$desc,$phase4);

            $data= DB::table('workbaskets')
            ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id')
            ->where('workbaskets.itsr_no','=',$request->itsr_no)
            ->first();
                
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);

            $dev = new ImplementationDoc();
            $dev->impdocStore_first($request);
            
            $phase5 = "Phase5";
            $itsr = ITSR::findOrFail($request->itsr_no);
            $itsr->itsrUpdate_phase($phase5);
        }else{
            $phase = "Phase4";
            $desc = "Waiting for UAT Test Result to be revised by User";
            $div ="User";
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
        return Redirect::route('index',Auth::user()->division)->with('success','UAT Test Result Approval created successfully');
    }
}
