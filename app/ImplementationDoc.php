<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class ImplementationDoc extends Model
{
    public $table = 'implementationdocs';

    public $fillable = ['itsr_no','memodeploy_file','deploydoc_file','ccr_file','deploymentplan_file','rollbackplan_file',
    'ccr_information','itsr_status','itsr_assess_status','fsd_status','tsd_status','sit_tc_status','sit_tp_status',
    'sit_tr_status','sat_tp_status','sat_tr_status','uat_tc_status','uat_tp_status','uat_tr_status','memodeploy_status','patscript_file','golive_file',
    'rollback_file','status_deployment','status_pat','reject_receiver','email_sendto'];

    //untuk dashboard
    public function getPhase5(){
        $imp =  \App\ImplementationDoc::all();
        return $imp;
    }

    public function impdocStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no']
        ]);
        $this->save();
    }
    
    public function memoDeployStore_create($data){
        $current_user = Auth::user();
        if($data->file('memodeploy_file')){
            $file = $data->file('memodeploy_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->memodeploy_file->move('storage/memodeploy/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'memodeploy_file' => $filename
        ]);
        $this->save();
    }
    
    public function deploydocStore_create($data){
        $current_user = Auth::user();
        if($data->file('deploydoc_file')){
            $file = $data->file('deploydoc_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->deploydoc_file->move('storage/deploydoc/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'deploydoc_file' => $filename
        ]);
        $this->save();
    }

    public function deploydocStore_verif($data){
        $current_user = Auth::user();

        $this->fill([
            'itsr_status' => $data['itsr_status'],
            'itsr_assess_status' => $data['itsr_assess_status'],
            'fsd_status' => $data['fsd_status'],
            'tsd_status' => $data['tsd_status'],
            'sit_tc_status' => $data['sit_tc_status'],
            'sit_tp_status' => $data['sit_tp_status'],
            'sit_tr_status' => $data['sit_tr_status'],
            'sat_tp_status' => $data['sat_tp_status'],
            'sat_tr_status' => $data['sat_tr_status'],
            'uat_tc_status' => $data['uat_tc_status'],
            'uat_tp_status' => $data['uat_tp_status'],
            'uat_tr_status' => $data['uat_tr_status'],
            'memodeploy_status' => $data['memodeploy_status']
        ]);
        $this->save();
    }
    
    public function ccrStore_create($data){
        $current_user = Auth::user();
        if($data->file('ccr_file')){
            $file1 = $data->file('ccr_file');
            $filename1 = time().'.'.$file1->getClientOriginalExtension();
            $data->ccr_file->move('storage/ccr/',$filename1);
        }
        if($data->file('deployplan_file')){
            $file2 = $data->file('deployplan_file');
            $filename2 = time().'.'.$file2->getClientOriginalExtension();
            $data->deployplan_file->move('storage/deployplan/',$filename2);
        }
        if($data->file('rollbackplan_file')){
            $file3 = $data->file('rollbackplan_file');
            $filename3 = time().'.'.$file3->getClientOriginalExtension();
            $data->rollbackplan_file->move('storage/rollbackplan/',$filename3);
        }
        $this->fill([
            'ccr_file' => $filename1,
            'deploymentplan_file' => $filename2,
            'rollbackplan_file' => $filename3,
            'ccr_information' => $data->ccr
        ]);
        $this->save();
    }
    
    public function ccrStore_view($data){
        $current_user = Auth::user();
        $this->fill([
            'email_sendto' => $current_user->user_id
        ]);
        $this->save();
    }
    
    public function patStore_create($data){
        $current_user = Auth::user();
        if($data->file('pat_file')){
            $file = $data->file('pat_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->pat_file->move('storage/pat/',$filename);
        }
        $this->fill([
            'patscript_file' => $filename,
            'email_sendto' => $current_user->user_id
        ]);
        $this->save();
    }
    
    public function goliveStore_create($data){
        $current_user = Auth::user();
        if($data->file('golive_file')){
            $file = $data->file('golive_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->golive_file->move('storage/golive/',$filename);
        }
        $this->fill([
            'golive_file' => $filename
        ]);
        $this->save();
    }
    
    public function rollbackPATStore_create($data){
        $current_user = Auth::user();
        if($data->file('rollback_file')){
            $file = $data->file('rollback_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->rollback_file->move('storage/rollback/',$filename);
        }
        $this->fill([
            'rollback_file' => $filename
        ]);
        $this->save();
    }

}
