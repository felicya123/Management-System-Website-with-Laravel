<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class TestingDoc extends Model
{
    public $table = 'testingdocs';

    public $fillable = ['itsr_no','sit_tp_file','sit_tp_review_sa_file','sit_tp_review_bahead_file','sit_report_file','sit_tr_file',
    'sit_tr_review_sa_file','sit_tr_review_bahead_file','sat_tp_file','sat_report_file','sat_tr_file','uat_tp_file','uat_report_file',
    'uat_tr_file','status_sit','status_sat','status_uat','reject_receiver','email_sendto'];

    //untuk dashboard
    public function getPhase4(){
        $testing =  \App\TestingDoc::all();
        return $testing;
    }

    public function testingdocStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no']
        ]);
        $this->save();
    }

    public function sitStore_create($data){
        $current_user = Auth::user();
        if($data->file('sit_tp_file')){
            $file = $data->file('sit_tp_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_tp_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'sit_tp_file' => $filename,
            'email_sendto' => $current_user->user_id
        ]);
        $this->save();
    }

    public function satStore_create($data){
        $current_user = Auth::user();
        if($data->file('sat_file')){
            $file = $data->file('sat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sat_file->move('storage/sat/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'sat_tp_file' => $filename,
            'email_sendto' => $current_user->user_id
        ]);
        $this->save();
    }

    public function uatStore_create($data){
        $current_user = Auth::user();
        if($data->file('uat_file')){
            $file = $data->file('uat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->uat_file->move('storage/uat/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'uat_tp_file' => $filename,
            'email_sendto' => $current_user->user_id
        ]);
        $this->save();
    }

    public function sitStore_update($data){
        $current_user = Auth::user();
        if($data->file('sit_file')){
            $file = $data->file('sit_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'sit_report_file' => $filename,
            'status_sit' => $data->status_itsr
        ]);
        $this->save();
    }

    public function satStore_update($data){
        $current_user = Auth::user();
        if($data->file('sat_file')){
            $file = $data->file('sat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sat_file->move('storage/sat/',$filename);
        }
        $this->fill([
            'sat_report_file' => $filename,
            'status_sat' => $data->status_itsr
        ]);
        $this->save();
    }

    public function uatStore_update($data){
        $current_user = Auth::user();
        if($data->file('uat_file')){
            $file = $data->file('uat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->uat_file->move('storage/uat/',$filename);
        }
        $this->fill([
            'uat_report_file' => $filename,
            'status_uat' => $data->status_itsr
        ]);
        $this->save();
    }

    public function sitStore_create2($data){
        $current_user = Auth::user();
        if($data->file('sit_tp_file')){
            $file = $data->file('sit_tp_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_tp_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'sit_tr_file' => $filename
        ]);
        $this->save();
    }

    public function satStore_create2($data){
        $current_user = Auth::user();
        if($data->file('sat_file')){
            $file = $data->file('sat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sat_file->move('storage/sat/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'sat_tr_file' => $filename
        ]);
        $this->save();
    }
    public function uatStore_create2($data){
        $current_user = Auth::user();
        if($data->file('uat_file')){
            $file = $data->file('uat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->uat_file->move('storage/uat/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'uat_tr_file' => $filename
        ]);
        $this->save();
    }

    public function sitStore_sareview($data){
        $current_user = Auth::user();
        if($data->file('sit_file')){
            $file = $data->file('sit_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'sit_tp_review_sa_file' => $filename
        ]);
        $this->save();
    }

    public function sitStore_sareview2($data){
        $current_user = Auth::user();
        if($data->file('sit_file')){
            $file = $data->file('sit_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'sit_tr_review_sa_file' => $filename
        ]);
        $this->save();
    }

    public function sitStore_baheadreview($data){
        $current_user = Auth::user();
        if($data->file('sit_file')){
            $file = $data->file('sit_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'sit_tp_review_bahead_file' => $filename
        ]);
        $this->save();
    }

    public function sitStore_baheadreview2($data){
        $current_user = Auth::user();
        if($data->file('sit_file')){
            $file = $data->file('sit_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->sit_file->move('storage/sit/',$filename);
        }
        $this->fill([
            'sit_tr_review_bahead_file' => $filename
        ]);
        $this->save();
    }
}
