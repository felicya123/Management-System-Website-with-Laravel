<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITSR;
use App\ITSRDetails;
use App\Workbasket;
use App\PostImplementationDoc;
use DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Response;

class postimplementationController extends Controller
{
    public function show_file_pir($itsr_no){
        $data=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('*')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        return view('postimplementation.pir_file', compact('data'));
    }

    public function create_pir($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('postimplementationdocs.id')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('*')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $users = DB::table('users')
        ->select('*')
        ->get();

        return view('postimplementation.create_pir')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('users',$users);
    }

    public function create_pir_store(Request $request,$id){
        $phase = "Phase6";
        $this->validate($request,[
            'pir_file' => 'required|mimes:pdf'
        ]);

        $postimp_id = DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('postimplementationdocs.id')
        ->where('postimplementationdocs.itsr_no','=',$request->itsr_no)
        ->first();

        $postimp = PostImplementationDoc::findOrFail($postimp_id->id);
        $postimp->pirStore_create($request);
        
        if(!$postimp->save()){
            return back()->withError('Failed to Insert !');
        }
        else{
            $wb1 = DB::table('workbaskets')
            ->join('postimplementationdocs','postimplementationdocs.itsr_no','workbaskets.itsr_no')
            ->select('workbaskets.id','workbaskets.description')
            ->where(['workbaskets.itsr_no'=>$request->itsr_no])
            ->first();

            $itsrd = new ITSRDetails();
            $desc = "Waiting for PIR Document to be approved by Business Owner";
            if($wb1->description=="Waiting for PIR Document to be revised by User"){
                $status = "PIR Document has been revised"; 
            }
            else{
                $status = "PIR Document has been created";
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

            return Redirect::route('index',Auth::user()->division)->with('success','PIR created successfully');
        }
    }

    //approval by bo
    public function approve_pir_bo($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('postimplementationdocs.id')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('*')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $reject=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('postimplementationdocs.reject_receiver')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();


        return view('postimplementation.approve_pir')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('reject',$reject)->with('users',$users);
    }

    public function approve_pir_bo_store(Request $request){
        $phase = "Phase6";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for PIR Document to be approved by IT Apps Manager";
            $div = "IT_AppsManager";
        }else{
            $desc = "Waiting for PIR Document to be revised by User";
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
        
       return Redirect::route('index',Auth::user()->division)->with('success','PIR Approval created successfully');
    }

    //approval by it apps manager
    public function approve_pir_am($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('postimplementationdocs.id')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('*')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $reject=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('postimplementationdocs.reject_receiver')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();


        return view('postimplementation.approve_pir')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('reject',$reject)->with('users',$users);
    }

    public function approve_pir_am_store(Request $request){
        $phase = "Phase6";
        if($request->status_itsr=="Approve"){
            $desc = "Waiting for PIR Document to be approved by IT Owner";
            $div = "IT_Owner";
        }else{
            $desc = "Waiting for PIR Document to be revised by User";
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

        return Redirect::route('index',Auth::user()->division)->with('success','PIR Approval created successfully');
    }

    //approval by it owner
    public function approve_pir_owner($itsr_no){
        $itsr=  ITSR::findOrFail($itsr_no);
        $wb =  DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->select('itsrs.itsr_no','itsrs.create_by','itsrs.project_name','itsrs.request_type','users.fullname','workbaskets.description')
        ->where(['itsrs.itsr_no'=>$itsr_no])
        ->get();

        $id=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->join('users','users.user_id','itsrs.create_by')
        ->join('workbaskets','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('postimplementationdocs.id')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $data=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('*')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->first();

        $reject=  DB::table('postimplementationdocs')
        ->join('itsrs','itsrs.itsr_no','postimplementationdocs.itsr_no')
        ->select('postimplementationdocs.reject_receiver')
        ->where(['postimplementationdocs.itsr_no'=>$itsr_no])
        ->get();

        $users = DB::table('users')
        ->select('*')
        ->get();


        return view('postimplementation.approve_pir')->with('wb',$wb)->with('id',$id)->with('itsr',$itsr)->with('data',$data)->with('reject',$reject)->with('users',$users);
    }

    public function approve_pir_owner_store(Request $request,$id){
        $phase = "Phase6";

        $data = DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('workbaskets.id')
        ->where('workbaskets.itsr_no','=',$request->itsr_no)
        ->first();
       
        if($request->status_itsr=="Approve"){
            $itsr = ITSR::findOrFail($request->itsr_no);
            $itsr->itsrUpdate_Closed();
            $desc =  "Project done";
            $wb = new Workbasket();
            $wb->deleteWB($data->id);
        }else{
            $desc = "Waiting for PIR Document to be revised by User";
            $div ="User";
            
            $wb = Workbasket::find($data->id);
            $wb->wbStore($request,$desc,$div);
        }
        $itsrd = new ITSRDetails();
        $itsrd->itsrdStore($request,$desc,$phase);

       
        return Redirect::route('index',Auth::user()->division)->with('success','PIR Approval created successfully');
    }
}
