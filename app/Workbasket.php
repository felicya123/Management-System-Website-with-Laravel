<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Workbasket extends Model
{
    public $table ='workbaskets';
    public $fillable = ['itsr_no','description','division','assign_to'];

    //untuk dashboard
    public function getWB(){
        $wb =  \App\Workbasket::all();
        return $wb;
    }

    public function wbStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'description' => "Waiting ITSR to be reviewed by IT BA",
            'division' => "IT_BA",
        ]);
        $this->save();
    }
    public function wbStore($data,$descwb,$div){
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
            'assign_to' => $assign,
            'description' => $descwb,
            'division' => $div
        ]);
        $this->save();
    }


    public function wbCancelDrop($data){
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'description' => $data['description_temp'],
            'assign_to' => $data['assign_to_temp'],
            'division' =>$data['division_temp']
        ]);
        $this->save();
    }

    public function wbStore_sysadmin2($data){
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'division' => "Sysadmin"
        ]);
    }

    public function deleteWB($userwb){
        $wb = Workbasket::find($userwb);
        if(isset($userwb)){
            $wb->delete();
         }
    }
}
