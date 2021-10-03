<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DevelopmentDev extends Model
{
    public $table = 'developmentdev';
    public $fillable = ['dev_id','dev_file','week','comment','status_dev','onprogress_detail'];

    public function devStore_first($data){
        $devdoc = DB::table('developmentdocs')
        ->join('itsrs','itsrs.itsr_no','developmentdocs.itsr_no')
        ->select('developmentdocs.id')
        ->where('developmentdocs.itsr_no','=',$data->itsr_no)
        ->first();

        $this->fill([
            'dev_id' => $devdoc->id
        ]);
        $this->save();
    }

    public function devStore($data){
        if($data->file('dev_file')){
            $file = $data->file('dev_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->dev_file->move('storage/dev/developer',$filename);
        }
        $this->fill([
            'week' => $data['week'],
            'status_dev' => $data['status_itsr'],
            'onprogress_detail' => $data['onprogress_detail'],
            'comment' => $data['comment_itsr'],
            'dev_file' => $filename
        ]);
        $this->save();
    }

    public function devStore_withoutfile($data){
        $this->fill([
            'week' => $data['week'],
            'status_dev' => $data['status_itsr'],
            'onprogress_detail' => $data['onprogress_detail'],
            'comment' => $data['comment_itsr']
            
        ]);
        $this->save();
    }


}
