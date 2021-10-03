<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ITSRAssessment extends Model
{
    public $table ='itsrassessments';
    public $fillable = ['itsr_no',
    'assessment_start_date',
    'assessment_end_date',
    'assessment_srname',
    'project_description',
    'scope_of_work',
    'user_requirement',
    'impacted_app',
    'impacted_app1',
    'impacted_app2',
    'impacted_app3',
    'pic_impacted_app1',
    'pic_impacted_app2',
    'pic_impacted_app3',
    'total_impacted_app',
    'security_testing',
    'penetration_test_internal',
    'penetration_test_vendor',
    'user_matrix_doc',
    'assessment_security',
    'assessment_skmr',
    'report_ojk',
    'reportregulator_approval',
    'assessment_skk',
    'implementation_development',
    'dev_start_date',
    'dev_end_date',
    'sit_start_date',
    'sit_end_date',
    'sat_start_date',
    'sat_end_date',
    'uat_start_date',
    'uat_end_date',
    'deploy_start_date',
    'deploy_end_date',
    'pat_start_date',
    'pat_end_date',
    'golive_date',
    'total_mandays',
    'category',
    'bo',
    'business_pm',
    'assessment_file',
    'assessment_sa_file'];

    //untuk dashboard
    public function getITSRAssess(){
        $assess =  \App\ITSRAssessment::all();
        return $assess;
    }

    public function assessStore_first($data){
        $this->fill([
            'itsr_no' => $data['itsr_no']
        ]);
        $this->save();
    }
    public function assessStore_itba($data){
        if($data->file('assessment_file')){
            $file = $data->file('assessment_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->assessment_file->move('storage/assessment/',$filename);
        }
        $this->fill([
            'assessment_start_date' => $data['assessment_start_date'],
            'assessment_end_date' => $data['assessment_end_date'],
            'assessment_srname' => $data['project_name'],
            'project_description' => $data['project_description'],
            'scope_of_work' => $data['scope_of_work'],
            'user_requirement' => $data['user_requirement'],
            'assessment_file' => $filename
        ]);
        $this->save();
    }

    public function countImpactedSA($data){
        /*
        if($data->impacted_app3 == null && $data->impacted_app2!=null && $data->impacted_app1!=null){
            $this->fill(['total_impacted_app'=>"2"]);
        }elseif($data->impacted_app3==null && $data->impacted_app2==null){
            $this->fill(['total_impacted_app'=>"1"]);
        }elseif($data->impacted_app1!=null && $data->imapcted_app2!=null && $data->impacted_app3!=null){
            $this->fill(['total_impacted_app'=>"3"]);
        }else{
            $this->fill(['total_impacted_app'=>"0"]);
        }
        */
        if($data['impacted_app3'] == null && $data['impacted_app2']!=null && $data['impacted_app1']!=null){
            $total =2;
        }elseif($data['impacted_app3']==null && $data['impacted_app2']==null){
            $total = 1;
        }elseif($data['impacted_app1']!=null && $data['impacted_app2']!=null && $data['impacted_app3']!=null){
            $total = 3;
        }else{
            $total = 0;
        }
        $this->fill([
            'total_impacted_app' => $total
        ]);
        $this->save();
    }

    public function assessStore_itsa($data){
        if($data->file('assessment_sa_file')){
            $file = $data->file('assessment_sa_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->assessment_sa_file->move('storage/assessment/sa',$filename);
        }
        if($data['impacted_app3'] == null && $data['impacted_app2']!=null && $data['impacted_app1']!=null){
            $total =2;
        }elseif($data['impacted_app3']==null && $data['impacted_app2']==null){
            $total = 1;
        }elseif($data['impacted_app1']!=null && $data['impacted_app2']!=null && $data['impacted_app3']!=null){
            $total = 3;
        }else{
            $total = 0;
        }
        $this->fill([
            'impacted_app' => $data['impacted_app'],
            'impacted_app1' => $data['impacted_app1'],
            'impacted_app2' => $data['impacted_app2'],
            'impacted_app3' => $data['impacted_app3'],
            'pic_impacted_app1' => $data['pic_impacted_app1'],
            'pic_impacted_app2' => $data['pic_impacted_app2'],
            'pic_impacted_app3' => $data['pic_impacted_app3'],
            'assessment_sa_file' => $filename,
            'total_impacted_app' => $total,
        ]);

        /*
        if($data->impacted_app3 == null && $data->impacted_app2!=null && $data->impacted_app1!=null){
            $this->fill(['total_impacted_app'=>"2"]);
        }elseif($data->impacted_app3==null && $data->impacted_app2==null){
            $this->fill(['total_impacted_app'=>"1"]);
        }elseif($data->impacted_app1!=null && $data->imapcted_app2!=null && $data->impacted_app3!=null){
            $this->fill(['total_impacted_app'=>"3"]);
        }else{
            $this->fill(['total_impacted_app'=>"0"]);
        }
        */
      
        $this->save();
    }

    public function assessStore_itsaimpact($data){
        /*if($data['impacted_app3'] == null && $data['impacted_app2']!=null && $data['impacted_app1']!=null){
            $total =2;
        }elseif($data['impacted_app3']==null && $data['impacted_app2']==null){
            $total = 1;
        }elseif($data['impacted_app1']!=null && $data['impacted_app2']!=null && $data['impacted_app3']!=null){
            $total = 3;
        }else{
            $total = 0;
        }
        */
        
        $this->fill([
            'total_impacted_app' => $data-1,
        ]);
        
        $this->save();
    }

    public function assessStore_itsecurity($data){
        $this->fill([
            'security_testing' => $data['security_testing'],
            'penetration_test_internal' => $data['penetration_test_internal'],
            'penetration_test_vendor' => $data['penetration_test_vendor'],
            'user_matrix_doc' => $data['user_matrix_doc'],
            'assessment_security' => $data['assessment_security']
        ]);
        $this->save();
    }

    public function assessStore_skmr($data){
        $this->fill([
            'assessment_skmr' => $data['assessment_skmr'],
        ]);
        $this->save();
    }

    public function assessStore_skk($data){
        $this->fill([
            'assessment_skk' => $data['assessment_skk'],
            'report_ojk' => $data['report_ojk'],
            'reportregulator_approval' => $data['reportregulator_approval']
        ]);
        $this->save();
    }

    
    public function assessStore_itam($data){
        $this->fill([
            'implementation_development' => $data['implementation_development'],
            'dev_start_date' => $data['dev_start_date'],
            'dev_end_date' => $data['dev_end_date'],
            'sit_start_date' => $data['sit_start_date'],
            'sit_end_date' => $data['sit_end_date'],
            'sat_start_date' => $data['sat_start_date'],
            'sat_end_date' => $data['sat_end_date'],
            'uat_start_date' => $data['uat_start_date'],
            'uat_end_date' => $data['uat_end_date'],
            'deploy_start_date' => $data['deploy_start_date'],
            'deploy_end_date' => $data['deploy_end_date'],
            'pat_start_date' => $data['pat_start_date'],
            'pat_end_date' => $data['pat_end_date'],
            'golive_date' => $data['golive_date'],
        ]);
        $this->save();
    }

    public function assessStore_itpmo($data){
        $this->fill([
            'category' => $data['category'],
            'bo' => $data['bo'],
            'business_pm' => $data['business_pm']
        ]);
        $this->save();
    }
}
