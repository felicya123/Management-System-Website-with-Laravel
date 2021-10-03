<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ITSR extends Model
{
    public $primaryKey = 'itsr_no';
    public $fillable = 
    ['itsr_no',
    'request_type',
    'regulator_approval',
    'project_name',
    'product_or_service_name',
    'application_name',
    'application_impacted',
    'business_impact_benefit',
    'business_budget',
    'total_mandays',
    'development_choice',
    'business_goals',
    'scope',
    'requirements',
    'benefit_to_bank',
    'system_impact_analyst',
    'create_by',
    'status_assignment',
    'stage',
    'itsr_file',
    'pre_review_file',
    'pre_review_status'];

    public $incrementing = false;
    public $table = 'itsrs';
    public $keyType = 'string';

    public function getITSR(){
        $itsr =  \App\ITSR::orderBy('created_at')->paginate(10, ['*'], 'pagination_a');
        return $itsr;
    }

    public function getITSRActive(){
        $itsr =  \App\ITSR::orderBy('created_at')->where('status_assignment','=','Active')->paginate(10, ['*'], 'pagination_b');
        return $itsr;
    }

    public function getITSRClosed(){
        $itsr =  \App\ITSR::orderBy('created_at')->where('status_assignment','=','Closed')->paginate(10, ['*'], 'pagination_c');;
        return $itsr;
    }

    public function  itsrStore($data){
        if($data->file('itsr_file')){
            $file = $data->file('itsr_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->itsr_file->move('storage/itsr/',$filename);
        }
        $current_user = Auth::user();
        $this->fill([
            'itsr_no' => $data['itsr_no'],
            'request_type' => $data['request_type'],
            'regulator_approval' => $data['regulator_approval'],
            'project_name' => $data['project_name'],
            'product_or_service_name' => $data['product_or_service_name'],
            'application_name' => $data['application_name'],
            'application_impacted' => $data['application_impacted'],
            'business_impact_benefit' => $data['business_impact_benefit'],
            'business_budget' => $data['business_budget'],
            'total_mandays' => $data['total_mandays'],
            'development_choice' => $data['development_choice'],
            'business_goals' => $data['business_goals'],
            'scope' => $data['scope'],
            'requirements' => $data['requirements'],
            'benefit_to_bank' => $data['benefit_to_bank'],
            'system_impact_analyst' => $data['system_impact_analyst'],
            'create_by' => $current_user->user_id,
            'status_assignment' => "Active",
            'stage' => "Phase1",
            'itsr_file' => $filename
        ]);
        $this->save();
    }

    public function itsrUpdatePreReview($data){
        $this->fill([
            'pre_review_status' => $data['pre_review_status']
        ]);
        $this->save();
    }

    public function itsrUpdate_Devchoice($data){
        $this->fill([
            'development_choice' => $data['implementation_development']
        ]);
        $this->save();
    }

    public function itsrUpdate_requestType($data){
        $this->fill([
            'request_type' => $data['category']
        ]);
        $this->save();
    }

    public function itsrUpdate_statusAssignment($data){
        $this->fill([
            'status_assignment' => $data
        ]);
        $this->save();
    }

    public function itsrUpdate_phase($phase){
        $this->fill([
            'stage' => $phase
        ]);
        $this->save();
    }

    public function itsrUpdate_regApproval($reg_approval){
        $this->fill([
            'regulator_approval' => $reg_approval
        ]);
        $this->save();
    }

    public function itsrUpdatePreReviewFile($data){
        if($data->file('file_pre_review')){
            $file = $data->file('file_pre_review');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $data->file_pre_review->move('storage/prereview',$filename);
        }
        $this->fill([
            'pre_review_file' => $filename
        ]);
        
        $this->save();
    }

    public function itsrUpdate_Phase2(){
        $this->fill([
            'stage' => "Phase2"
        ]);
        $this->save();
    }

    public function itsrUpdate_Phase3(){
        $this->fill([
            'stage' => "Phase3"
        ]);
        $this->save();
    }

    public function itsrUpdate_Phase4(){
        $this->fill([
            'stage' => "Phase4"
        ]);
        $this->save();
    }

    public function itsrUpdate_Phase5(){
        $this->fill([
            'stage' => "Phase5"
        ]);
        $this->save();
    }

    public function itsrUpdate_Phase6(){
        $this->fill([
            'stage' => "Phase6"
        ]);
        $this->save();
    }

    public function itsrUpdate_Closed(){
        $this->fill([
            'status_assignment' => "Closed"
        ]);
        $this->save();
    }
}
