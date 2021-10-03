<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class ITSRDetails extends Model
{
    public $table ='itsrdetails';
    public $fillable = ['itsr_no','title_itsr','assign_to','operator_id','operator_name','description','stage','status_itsr','comment_itsr','description_temp','assign_to_temp','division_temp','stage_temp'];

    //untuk dashboard
    public function getITSRDetails(){
        $itsrd =  \App\ITSRDetails::all();
        return $itsrd;
    }

    public function itsrdStore_first($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'description' => "Waiting ITSR to be reviewed by IT BA",
            'stage' => "Phase1",
            'status_itsr' => "ITSR has been created",
            'comment_itsr' => "ITSR has been created"
        ]);
        $this->save();
    }

    public function itsrdStore($data, $desc, $phase){
        $current_user = Auth::user();
        if($data->assign_to==null && $data->assign_to2==null){
            $assign = $current_user->fullname;
        }
        else if($data->assign_to==null && $data->assign_to2!=null){
            $assign = $data->assign_to2;
        }
        else{
            $assign = $data->assign_to;
        }
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'operator_id' => $current_user->user_id,
            'assign_to' => $assign,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'description' => $desc,
            'stage' => $phase
        ]);
        $this->save();
    }

    public function itsrdStore_withoutStatus($data,$desc,$status,$phase){
        $current_user = Auth::user();
        if($data->assign_to==null && $data->assign_to2==null){
            $assign = $current_user->fullname;
        }
        else if($data->assign_to==null && $data->assign_to2!=null){
            $assign = $data->assign_to2;
        }
        else{
            $assign = $data->assign_to;
        }
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'assign_to' => $assign,
            'comment_itsr' => $data['comment_itsr'],
            'description' => $desc,
            'status_itsr' => $status,
            'stage' => $phase
        ]);
        $this->save();
    }

    public function itsrdCancelDropStore($data, $desc){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'description' => $desc,
            'stage' => $data['stage_temp']
        ]);
        $this->save();
    }

    public function itsrdNewStore($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to_temp'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => "Project Restored",
            'comment_itsr' => "",
            'description' => $data['description_temp'],
            'stage' => $data['stage_temp']
        ]);
        $this->save();
    }

    public function itsrdStore_phase1($data, $desc){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase1"
        ]);
    }

    public function itsrdStore_phase2($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase2"
        ]);
    }

    public function itsrdStore_phase3($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase3"
        ]);
    }

    public function itsrdStore_phase4($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase4"
        ]);
    }

    public function itsrdStore_phase5($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase5"
        ]);
    }

    public function itsrdStore_phase6($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'status_itsr' => $data['status_itsr'],
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase6"
        ]);
    }

    public function itsrdStore_withoutStatus2($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase2"
        ]);
    }

    public function itsrdStore_withoutStatus3($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase3"
        ]);
    }

    public function itsrdStore_withoutStatus4($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase4"
        ]);
    }

    public function itsrdStore_withoutStatus5($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase5"
        ]);
    }

    public function itsrdStore_withoutStatus6($data){
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'title_itsr' => $data['title_itsr'],
            'assign_to' => $data['assign_to'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'comment_itsr' => $data['comment_itsr'],
            'stage' => "Phase6"
        ]);
    }

   
    public function itsrdStore_dropProject($data){
        $wb= DB::table('workbaskets')
        ->join('itsrs','itsrs.itsr_no','workbaskets.itsr_no')
        ->select('*')
        ->where('workbaskets.itsr_no','=',$data->itsr_no)
        ->first();

        $itsr = ITSR::findOrFail($data->itsr_no);
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'operator_id' => $current_user->user_id,
            'operator_name' => $current_user->fullname,
            'description_temp' => $wb->description,
            'assign_to_temp' => $wb->assign_to,
            'division_temp' => $wb->division,
            'status_itsr' => "ITSR has been dropped",
            'stage' => $itsr['stage'],
            'stage_temp' => $itsr['stage'],
            'comment_itsr' => $data['comment_itsr'],
            'description' => "Waiting for Project to be reviewed by Business Owner"
        ]);
        $this->save();
    }



  
}
