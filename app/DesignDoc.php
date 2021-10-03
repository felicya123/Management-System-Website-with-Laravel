<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DesignDoc extends Model
{
    public $table = 'designdocs';
    public $fillable = ['itsr_no','fsd_file','fsd_review_user_file','fsd_review_bahead_file','reject_receiver','tsd_file','tsd_review_sa_file','tsd_review_security_file','tsd_review_infra_file'];

    //untuk dashboard
    public function getPhase2(){
        $design =  \App\DesignDoc::all();
        return $design;
    }

    public function fsdStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no']
        ]);
        $this->save();
    }

    public function fsdStore_create($data){
        $current_user = Auth::user();
        if($data->file('fsd_file')){
            $file = $data->file('fsd_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->fsd_file->move('storage/fsd/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'fsd_file' => $filename
        ]);
        $this->save();
    }

    public function fsdStore_reviewuser($data){
        if($data->reviewfsd_user != null){
            if($data->file('reviewfsd_user')){
                $file = $data->file('reviewfsd_user');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $data->reviewfsd_user->move('storage/fsd/user',$filename);

                $this->fill([
                    'fsd_review_user_file' => $filename
                ]);
            }
        }
        $this->save();
    }

   
    public function fsdStore_reviewbahead($data){
        if($data->reviewfsd_bahead != null){
            if($data->file('reviewfsd_bahead')){
                $file = $data->file('reviewfsd_bahead');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $data->reviewfsd_bahead->move('storage/fsd/bahead',$filename);

                $this->fill([
                    'fsd_review_bahead_file' => $filename
                ]);
            }
        }
        $this->save();
    }


    public function tsdStore_create($data){
        $current_user = Auth::user();
        if($data->file('tsd_file')){
            $file = $data->file('tsd_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->tsd_file->move('storage/tsd/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'tsd_file' => $filename
        ]);
        $this->save();
    }

    public function tsdStore_reviewsa($data){
        if($data->file('tsd_sa_review_file')){
            $file = $data->file('tsd_sa_review_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->tsd_sa_review_file->move('storage/tsd/sa',$filename);
        }
        $this->fill([
            'tsd_review_sa_file' => $filename
        ]);
        $this->save();
    }

    public function tsdStore_reviewsecurity($data){
        $current_user = Auth::user();
        if($data->file('tsd_security_review_file')){
            $file = $data->file('tsd_security_review_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->tsd_security_review_file->move('storage/tsd/security',$filename);
        }
        $this->fill([
            'tsd_review_security_file' => $filename
        ]);
        $this->save();
    }

    public function tsdStore_reviewinfra($data){
        $current_user = Auth::user();
        if($data->file('tsd_infra_review_file')){
            $file = $data->file('tsd_infra_review_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->tsd_infra_review_file->move('storage/tsd/infra',$filename);
        }
        $this->fill([
            'tsd_review_infra_file' => $filename
        ]);
        $this->save();
    }
}
