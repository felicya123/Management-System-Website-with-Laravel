<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class PostImplementationDoc extends Model
{
    public $table = 'postimplementationdocs';

    public $fillable = ['itsr_no','pir_file','reject_receiver'];

    //untuk dashboard
    public function getPhase6(){
        $post_imp =  \App\PostImplementationDoc::all();
        return $post_imp;
    }

    public function postimpdocStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no']
        ]);
        $this->save();
    }
    
    public function pirStore_create($data){
        $current_user = Auth::user();
        if($data->file('pir_file')){
            $file = $data->file('pir_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->pir_file->move('storage/pir/',$filename);
        }
        $this->fill([
            'reject_receiver' => $current_user->fullname,
            'pir_file' => $filename
        ]);
        $this->save();
    }
}
