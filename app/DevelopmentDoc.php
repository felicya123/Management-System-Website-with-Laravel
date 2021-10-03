<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class DevelopmentDoc extends Model
{
    public $table = 'developmentdocs';
    public $fillable = ['itsr_no','developer_id','dev_file_sa','reject_receiver','week','status_dev','onprogress_detail'];

    //untuk dashboard
    public function getPhase3(){
        $dev =  \App\DevelopmentDoc::all();
        return $dev;
    }

    public function devdocStore_first($data){
        $user_id = DB::table('users')
        ->select('users.user_id')
        ->where('users.fullname','=',$data->assign_to)
        ->first();

        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'developer_id' => $user_id->user_id,
            'week' => '0'
        ]);
        $this->save();
    }

    public function devdocStore_rejectreceiver($data){
        $current_user = Auth::user();
        $this->fill([
            'reject_receiver' => $current_user->fullname
        ]);
        $this->save();
    }

    public function devdocStore($data){
        $this->fill([
            'week' => $data['week'],
            'status_dev' => $data['status_itsr'],
            'onprogress_detail' => $data['onprogress_detail']
        ]);
        $this->save();
    }

    public function devdocStore_submitdev($data){
        if($data->file('dev_file_sa')){
            $file = $data->file('dev_file_sa');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->dev_file_sa->move('storage/dev/sa',$filename);
        }
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'dev_file_sa' => $filename
        ]);
        $this->save();
    }
}
