@extends('layouts.applayout')
@section('content')
<div class="row col-sm-2 height20">
    <a href="/work/{{auth::user()->division}}" class="closebtn">Back</a>
</div>
<div class="section-title">
          <h2>ITSR Assessment Approval Form</h2>
</div>
<div class="borderline"> <br>
<div class="">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR')">ITSR</button>
  <button class="tablinks" onclick="openCity(event, 'ITSR_Assessment')">ITSR Assessment</button>
  <button class="tablinks" onclick="openCity(event, 'Submission')">Approval</button>
</div>


<div id="ITSR" class="tabcontent" style="display:block">
        <div class="form-group row">
            <label for="itsr_no" class="col-sm-2 col-form-label">Title No</label>
            <div class="col-sm-10">
            <input type="text" name="itsr_no" class="form-control" value="{{$itsr->itsr_no}}" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="request_type" class="col-sm-2 col-form-label" > Request Type</label>
            <div class="col-sm-10">
             <input type="text" name="request_type" class="form-control" value="{{$itsr->request_type}}" readonly>
           
            </div>
        </div>   
            
        <div class="form-group row">
            <label for="regulator_approval" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="regulator_approval" value="Yes"  <?=$itsr->regulator_approval=="Yes" ? "checked" : ""?> disabled >Yes
                </div>
                <div class="col-sm">
                    <input type="radio" name="regulator_approval" value="No" <?=$itsr->regulator_approval=="No" ? "checked" : ""?> disabled>No
                </div>
            </div>
        </div>             
            
        <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
            <div class="col-sm-10">
                <input type="text" name="project_name" class="form-control"  value="{{$itsr->project_name}}" readonly>
                
            </div>
        </div>

        <div class="form-group row">
            <label for="product_or_service_name" class="col-sm-2 col-form-label" >Product or Service Name</label>
            <div class="col-sm-10">
                <input type="text" name="product_or_service_name" class="form-control" value="{{$itsr->product_or_service_name}}" readonly>
            </div>
        </div>   
        
        <div class="form-group row">
            <label for="application_name" class="col-sm-2 col-form-label" >Application Name</label>
            <div class="col-sm-10">
                <input type="text" name="application_name" class="form-control" value="{{$itsr->application_name}}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="application_impacted" class="col-sm-2 col-form-label" >Application Impacted</label>
            <div class="col-sm-10">
                <input type="text" name="application_impacted" class="form-control" value="{{$itsr->application_impacted}}" readonly>
            </div>
        </div>
           
        <div class="form-group row">
            <label for="business_impact_benefit" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Regulator Requirement" <?=$itsr->business_impact_benefit=="Regulator Requirement" ? "checked" : ""?> disabled>Regulator Requirement
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Revenue Generation"<?=$itsr->business_impact_benefit=="Revenue Generation" ? "checked" : ""?> disabled>Revenue Generation
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Eficiency/Improvement" <?=$itsr->business_impact_benefit=="Eficiency/Improvement" ? "checked" : ""?> disabled>Eficiency/Improvement
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_budget" class="col-sm-2 col-form-label">Business Budget</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="less than USD 50K" <?=$itsr->business_budget=="less than USD 50K" ? "checked" : ""?> disabled>less than USD 50K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="USD 50-100K" <?=$itsr->business_budget=="USD 50-100K" ? "checked" : ""?> disabled>USD 50-100K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="more than USD 100K" <?=$itsr->business_budget=="more than USD 100K" ? "checked" : ""?> disabled>more than USD 100K
                </div>
            </div>
        </div>     
        
        <div class="form-group row">
            <label for="total_mandays" class="col-sm-2 col-form-label">Total Mandays</label>
            <div class="col-sm-10">
            <input type="text" name="total_mandays" class="form-control" value="{{$itsr->total_mandays}}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="development_choice" class="col-sm-2 col-form-label">Development choice</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="development_choice" value="Internal IT Developer" <?=$itsr->development_choice=="Internal IT Developer" ? "checked" : ""?> disabled>Internal IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice" value="External IT Developer" <?=$itsr->development_choice=="External IT Developer" ? "checked" : ""?> disabled>External IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice" value="Third Party (Vendor)" <?=$itsr->development_choice=="Third Party (Vendor)" ? "checked" : ""?> disabled>Third Party (Vendor)
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_goals" class="col-sm-2 col-form-label">Business Goals and Objective</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "business_goals" value="" readonly>{{$itsr->business_goals}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="scope" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "scope" value="" readonly>{{$itsr->scope}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="requirements" class="col-sm-2 col-form-label">Requrements / Functionalities</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "requirements" value="" readonly>{{$itsr->requirements}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="benefit_to_bank" class="col-sm-2 col-form-label">Benefit to the Bank</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "benefit_to_bank" value="" readonly>{{$itsr->benefit_to_bank}}</textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="system_impact_analyst" class="col-sm-2 col-form-label">System Impact Analysis (on critical process)</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="system_impact_analyst" value="Yes" <?=$itsr->system_impact_analyst=="Yes" ? "checked" : ""?> disabled>Yes
                </div>
                <div class="col-sm">
                    <input type="radio" name="system_impact_analyst" value="No"  <?=$itsr->system_impact_analyst=="No" ? "checked" : ""?> disabled>No
                </div>
            </div>
        </div>   
        
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="file_itsr">Choose file</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        
</div>
<form action="{{url('/work-bahead/itsr/approval-bahead-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
<div id="ITSR_Assessment" class="tabcontent">
@if(Auth::user()->division == "IT_BA")
    <div class="form-group row">
            <label for="assessment_start_date" class="col-sm-2 col-form-label">Assessment Start Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_start_date" class="form-control"required>
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_end_date" class="col-sm-2 col-form-label">Assessment End Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_end_date" class="form-control"required>
            </div>
     </div>
@else
    <div class="form-group row">
            <label for="assessment_start_date" class="col-sm-2 col-form-label">Assessment Start Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_start_date" class="form-control" value="{{$assess->assessment_start_date}}"readonly>
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_end_date" class="col-sm-2 col-form-label">Assessment End Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_end_date" class="form-control" value="{{$assess->assessment_end_date}}"readonly>
            </div>
     </div>
@endif

     <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">SR Name</label>
            <div class="col-sm-10">
                <input type="text" name="project_name" class="form-control"  value="{{$itsr->project_name}}" readonly>
                
            </div>
        </div>

@if(Auth::user()->division == "IT_BA")
     <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Project description</label>
            <div class="col-sm-10">
            <input type="text" name="project_description" class="form-control">
            </div>
     </div>
@else
    <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Project description</label>
            <div class="col-sm-10">
            <input type="text" name="project_description" class="form-control" value="{{$assess->project_description}}"readonly>
            </div>
     </div>
@endif
     
     <h4><b>Assessment by IT BA</b></h4>
    @if(Auth::user()->division == "IT_BA")
     <div class="form-group row">
            <label for="scope_of_work" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <input type="text" name="scope_of_work" class="form-control" required>
            </div>
     </div>
     <div class="form-group row">
            <label for="user_requirement" class="col-sm-2 col-form-label">User Requirement</label>
            <div class="col-sm-10">
            <input type="text" name="user_requirement" class="form-control" required>
            </div>
     </div>
     @else
     <div class="form-group row">
            <label for="scope_of_work" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <input type="text" name="scope_of_work" class="form-control" value="{{$assess->scope_of_work}}"readonly>
            </div>
     </div>
     <div class="form-group row">
            <label for="user_requirement" class="col-sm-2 col-form-label">User Requirement</label>
            <div class="col-sm-10">
            <input type="text" name="user_requirement" class="form-control" value="{{$assess->user_requirement}}"readonly>
            </div>
     </div>
     @endif

     <h4><b>Assessment by IT SA</b></h4>
     @if(Auth::user()->division == "IT_SA")
     <div class="form-group row">
            <label for="impacted_app" class="col-sm-2 col-form-label">Impacted App</label>
            <div class="col-sm-10">
                <input type="radio" onclick="javascript:approvereject();"name="impacted_app" value="1" id="yesCheck"required>Yes
                <input type="radio" onclick="javascript:approvereject();"name="impacted_app" value="0" id="noCheck"required>No
            </div>
     </div>

     <div id="ifYes" style="visibility:hidden" class="form-group row">
            <!--1-->
            <label for="impacted_app1" class="col-sm-2 col-form-label">Impacted App 1</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app1" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app1" class="col-form-label">IT SA 1</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app1" class="form-control" required>
            </div>
            <!--2-->
            <label for="impacted_app2" class="col-sm-2 col-form-label">Impacted App 2</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app2" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app2" class="col-form-label">IT SA 2</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app2" class="form-control" required>
            </div>
            <!--3-->
            <label for="impacted_app3" class="col-sm-2 col-form-label">Impacted App 3</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app3" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app3" class="col-form-label">IT SA 3</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app3" class="form-control" required>
            </div>
     </div>
    @else
    <div class="form-group row">
            <label for="impacted_app" class="col-sm-2 col-form-label">Impacted App</label>
            <div class="col-sm-10">
                <input type="radio" onclick="javascript:approvereject();"name="impacted_app" value="1" id="yesCheck"disabled>Yes
                <input type="radio" onclick="javascript:approvereject();"name="impacted_app" value="0" id="noCheck"disabled>No
            </div>
     </div>

     <div id="ifYes" style="visibility:hidden" class="form-group row">
            <!--1-->
            <label for="impacted_app1" class="col-sm-2 col-form-label">Impacted App 1</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app1" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app1" class="col-form-label">IT SA 1</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app1" class="form-control" readonly>
            </div>
            <!--2-->
            <label for="impacted_app2" class="col-sm-2 col-form-label">Impacted App 2</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app2" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app2" class="col-form-label">IT SA 2</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app2" class="form-control" readonly>
            </div>
            <!--3-->
            <label for="impacted_app3" class="col-sm-2 col-form-label">Impacted App 3</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app3" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app3" class="col-form-label">IT SA 3</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app3" class="form-control" readonly>
            </div>
     </div>
     @endif
     
     
     <h4><b>Assessment by IT Security</b></h4>
     @if(Auth::user()->division == "IT_Security")
     <b><label for="security_testing" class="col-form-label">Apakah Diperlukan?</label></b>
     <div class="form-group row">
            <label for="security_testing" class="col-sm-2 col-form-label">Security Testing</label>
            <div class="col-sm-10">
               
                    <input type="radio" name="security_testing"   value="1"required>Yes
                    <input type="radio" name="security_testing" value="0"required>No
                
            </div>
     </div>
     <div class="form-group row">
            <label for="penetration_test_internal" class="col-sm-2 col-form-label">Penetration Test (internal)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_internal"  value="1"required>Yes
                <input type="radio" name="penetration_test_internal"  value="0"required>No
            </div>
     </div>
     <div class="form-group row">
            <label for="penetration_test_vendor" class="col-sm-2 col-form-label">Penetration Test (vendor)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_vendor"  value="1" required>Yes
                <input type="radio" name="penetration_test_vendor"  value="0" required>No
            </div>
     </div>
     <div class="form-group row">
            <label for="user_matrix_doc" class="col-sm-2 col-form-label">User Matrix Document</label>
            <div class="col-sm-10">
                <input type="radio" name="user_matrix_doc"  value="1" required>Yes
                <input type="radio" name="user_matrix_doc" value="0" required>No
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_security" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_security"  required>
                
            </div>
     </div>
     @else
     <b><label for="security_testing" class="col-form-label">Apakah Diperlukan?</label></b>
     <div class="form-group row">
            <label for="security_testing" class="col-sm-2 col-form-label">Security Testing</label>
            <div class="col-sm-10">
               
                    <input type="radio" name="security_testing"   value="1"disabled>Yes
                    <input type="radio" name="security_testing" value="0"disabled>No
                
            </div>
     </div>
     <div class="form-group row">
            <label for="penetration_test_internal" class="col-sm-2 col-form-label">Penetration Test (internal)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_internal"  value="1"disabled>Yes
                <input type="radio" name="penetration_test_internal"  value="0"disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="penetration_test_vendor" class="col-sm-2 col-form-label">Penetration Test (vendor)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_vendor"  value="1" disabled>Yes
                <input type="radio" name="penetration_test_vendor"  value="0" disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="user_matrix_doc" class="col-sm-2 col-form-label">User Matrix Document</label>
            <div class="col-sm-10">
                <input type="radio" name="user_matrix_doc"  value="1" disabled>Yes
                <input type="radio" name="user_matrix_doc" value="0" disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_security" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_security"  readonly>
                
            </div>
     </div>
    @endif
   
    <h4><b>Assessment by Satuan Kerja Manajemen Resiko</b></h4>
    @if(Auth::user()->division == "IT_SKMR")
    <div class="form-group row">
            <label for="assessment_skmr" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_skmr"  required>
            </div>
     </div>
     @else
     <div class="form-group row">
            <label for="assessment_skmr" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_skmr"  readonly>
            </div>
     </div>
     @endif

     <h4><b>Assessment by Satuan Kerja Kepatuhan</b></h4>
    @if(Auth::user()->division == "IT_SKK")
     <div class="form-group row">
            <label for="report_ojk" class="col-sm-2 col-form-label">Report to OJK</label>
            <div class="col-sm-10">
                <input type="radio" name="report_ojk"  value="1" required>Yes
                <input type="radio" name="report_ojk" value="0" required>No
            </div>
     </div>
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Regulator's Approval</label>
            <div class="col-sm-10">
                <input type="radio" name="reportregulator_approval"  value="1" required>Yes
                <input type="radio" name="reportregulator_approval" value="0" required>No
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_skk" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_skk"  required>
            </div>
     </div>
     @else
     <div class="form-group row">
            <label for="report_ojk" class="col-sm-2 col-form-label">Report to OJK</label>
            <div class="col-sm-10">
                <input type="radio" name="report_ojk"  value="1" disabled>Yes
                <input type="radio" name="report_ojk" value="0" disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Regulator's Approval</label>
            <div class="col-sm-10">
                <input type="radio" name="reportregulator_approval"  value="1" disabled>Yes
                <input type="radio" name="reportregulator_approval" value="0" disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_skk" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <input type="text" name="assessment_skk"  readonly>
            </div>
     </div>
     @endif

     <h4><b>Assessment by IT Apps Manager</b></h4>
    @if(Auth::user()->division == "IT_AppsManager")
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Implementation will be done</label>
            <div class="col-sm-10">
                <input type="radio" name="implementation_development"  value="Internal IT Developer" required>Internal IT Developer
                <input type="radio" name="implementation_development" value="External IT Developer" required>External IT Developer (DIgital Banking Team)
                <input type="radio" name="implementation_development" value="Thrid Party" required>Thrid Party (Vendor)
            </div>
     </div>
     <b><label for="" class="col-form-label">Project timeline</label></b>
     <div class="form-group row">
            <!--Development-->
            <label for="dev_start_date" class="col-sm-2 col-form-label">Development</label>
            <div class="col-sm-4">
                 <input type="date" name="dev_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="dev_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="dev_end_date" class="form-control" required>
            </div>
            <!--SIT-->
            <label for="sit_start_date" class="col-sm-2 col-form-label">SIT</label>
            <div class="col-sm-4">
                 <input type="date" name="sit_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="sit_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sit_end_date" class="form-control" required>
            </div>
            <!--SAT-->
            <label for="sat_start_date" class="col-sm-2 col-form-label">SAT</label>
            <div class="col-sm-4">
                 <input type="date" name="sat_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="sat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sat_end_date" class="form-control" required>
            </div>
            <!--UAT-->
            <label for="uatt_start_date" class="col-sm-2 col-form-label">UAT</label>
            <div class="col-sm-4">
                 <input type="date" name="uat_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="uat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="uat_end_date" class="form-control" required>
            </div>
            <!--Deployment-->
            <label for="deploy_start_date" class="col-sm-2 col-form-label">Deployment</label>
            <div class="col-sm-4">
                 <input type="date" name="deploy_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="deploy_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="deploy_end_date" class="form-control" required>
            </div>
            <!--PAT-->
            <label for="pat_start_date" class="col-sm-2 col-form-label">PAT</label>
            <div class="col-sm-4">
                 <input type="date" name="pat_start_date" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="pat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="pats_end_date" class="form-control" required>
            </div>
            <!--Golive-->
            <label for="golive_date" class="col-sm-2 col-form-label">Golive</label>
            <div class="col-sm-4">
                 <input type="date" name="golive_date" class="form-control" required>
            </div>
     </div>
     @else
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Implementation will be done</label>
            <div class="col-sm-10">
                <input type="radio" name="implementation_development"  value="Internal IT Developer" disabled>Internal IT Developer
                <input type="radio" name="implementation_development" value="External IT Developer" disabled>External IT Developer (DIgital Banking Team)
                <input type="radio" name="implementation_development" value="Third Party" disabled>Third Party (Vendor)
            </div>
     </div>
     <b><label for="" class="col-form-label">Project timeline</label></b>
     <div class="form-group row">
            <!--Development-->
            <label for="dev_start_date" class="col-sm-2 col-form-label">Development</label>
            <div class="col-sm-4">
                 <input type="date" name="dev_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="dev_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="dev_end_date" class="form-control" readonly>
            </div>
            <!--SIT-->
            <label for="sit_start_date" class="col-sm-2 col-form-label">SIT</label>
            <div class="col-sm-4">
                 <input type="date" name="sit_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="sit_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sit_end_date" class="form-control" readonly>
            </div>
            <!--SAT-->
            <label for="sat_start_date" class="col-sm-2 col-form-label">SAT</label>
            <div class="col-sm-4">
                 <input type="date" name="sat_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="sat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sat_end_date" class="form-control" readonly>
            </div>
            <!--UAT-->
            <label for="uatt_start_date" class="col-sm-2 col-form-label">UAT</label>
            <div class="col-sm-4">
                 <input type="date" name="uat_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="uat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="uat_end_date" class="form-control" readonly>
            </div>
            <!--Deployment-->
            <label for="deploy_start_date" class="col-sm-2 col-form-label">Deployment</label>
            <div class="col-sm-4">
                 <input type="date" name="deploy_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="deploy_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="deploy_end_date" class="form-control" readonly>
            </div>
            <!--PAT-->
            <label for="pat_start_date" class="col-sm-2 col-form-label">PAT</label>
            <div class="col-sm-4">
                 <input type="date" name="pat_start_date" class="form-control" readonly>
            </div>
            <div class="col-sm-2">
            <label for="pat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="pats_end_date" class="form-control" readonly>
            </div>
            <!--Golive-->
            <label for="golive_date" class="col-sm-2 col-form-label">Golive</label>
            <div class="col-sm-4">
                 <input type="date" name="golive_date" class="form-control" readonly>
            </div>
     </div>
     @endif

     <h4><b>Assessment by IT PMO</b></h4>
    @if(Auth::user()->division == "IT_PMO")
     <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Report to OJK</label>
            <div class="col-sm-10">
                <input type="radio" name="category"  value="New Project (Besar)" required>New Project (Besar)
                <input type="radio" name="category" value="New Project (Kecil)" required>New Project (Kecil)
                <input type="radio" name="category" value="Enhancement (Besar)" required>Enhancement (Besar)
                <input type="radio" name="category" value="Enhancement (Kecil)" required>Enhancement (Kecil)
            </div>
     </div>
     <div>
        <b>Organization Structure</b>
        <div class="form-group row">
                <label for="bo" class="col-sm-2 col-form-label">Business Owner</label>
                <div class="col-sm-10">
                    <input type="text" name="bo"  required>
                </div>
        </div>
        <div class="form-group row">
                <label for="business_pm" class="col-sm-2 col-form-label">Business PM</label>
                <div class="col-sm-10">
                    <input type="text" name="business_pm" required>
                </div>
        </div>
     </div>
     @else
     <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Report to OJK</label>
            <div class="col-sm-10">
                <input type="radio" name="category"  value="New Project (Besar)" disabled>New Project (Besar)
                <input type="radio" name="category" value="New Project (Kecil)" disabled>New Project (Kecil)
                <input type="radio" name="category" value="Enhancement (Besar)" disabled>Enhancement (Besar)
                <input type="radio" name="category" value="Enhancement (Kecil)" disabled>Enhancement (Kecil)
            </div>
     </div>
     <div>
        <b>Organization Structure</b>
        <div class="form-group row">
                <label for="bo" class="col-sm-2 col-form-label">Business Owner</label>
                <div class="col-sm-10">
                    <input type="text" name="bo"  readonly>
                </div>
        </div>
        <div class="form-group row">
                <label for="business_pm" class="col-sm-2 col-form-label">Business PM</label>
                <div class="col-sm-10">
                    <input type="text" name="business_pm" readonly>
                </div>
        </div>
     </div>
     @endif

</div>

<div id="Submission" class="tabcontent">
    @csrf
    <div class="">
        @foreach($wb as $row)
        @if($row->itsr_no == $itsr->itsr_no)
        <div class="form-group row">
            <div class="col-sm-11"></div>
            <a href="/work/{{auth::user()->division}}" class="closebtn"></a>    
        </div>
        <h3>ITSR Information</h3>
             
            <div class="form-group row">
                <label for="itsr_no" class="col-sm-2 col-form-label">ITSR No</label>
                <div class="col-sm-10">
                   <input type="text" name="itsr_no" class="form-control" value="{{$row->itsr_no}}" style="pointer-events:none">
                </div>
            </div>

            <div class="form-group row">
                <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input type="text" name="project_name" class="form-control" value="{{$row->project_name}}" style="pointer-events:none">
                </div>
            </div>

            <div class="form-group row">
                <label for="request_type" class="col-sm-2 col-form-label">Project Type</label>
                <div class="col-sm-10">
                    <input type="text" name="request_type" class="form-control" value="{{$row->request_type}}" style="pointer-events:none">
                </div>
            </div>
        
        <h3>User Information</h3>
        <div class="form-group row">
            <label for="requestor_id" class="col-sm-2 col-form-label">User ID</label>
            <div class="col-sm-10">
                <input type="text" name="requestor_id" class="form-control" placeholder="" value="{{$row->create_by}}"  style="pointer-events:none">
            </div>
        </div>

        <div class="form-group row">
            <label for="requestor_name" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
            <input type="text" name="requestor_name" class="form-control" placeholder=""value="{{$row->fullname}}"  style="pointer-events:none">
            </div>
        </div>
        
        @endif
        @endforeach
    
        <h3>Approval</h3>
        <div class="form-group row">
            <label for="status_itsr" class="col-sm-2 col-form-label">Status Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" onclick="javascript:approvereject();"name="status_itsr" value="Approve" id="approveCheck" required>Approve
                </div>
                <div class="col-sm">
                    <input type="radio"  onclick="javascript:approvereject();"name="status_itsr" value="Reject" id="rejectCheck" required>Reject
                </div>
            </div>
        </div>

        <div class="form-group row" id="ifApproveLabel" style="display:none;">
                <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10" >
                    <select name="assign_to" class="form-control" id="ifApprove" style="display:none;"disabled>
                       @foreach($users as $user)
                       @if($user->division == "IT_SA")
                         <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                         @endif
                       @endforeach
                    </select>

                   
                    <!-- <select name="assign_to" class="form-control" id="ifReject" style="display:none;"disabled>
                    @foreach($users as $user)
                       @if($user->division == "IT_BA")
                         <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                         @endif
                       @endforeach
                    </select> -->
                    <div name="assign_to" style="display:none;"disabled>
                        @foreach($users as $user)
                        @if($user->division == "IT_BA")
                                <input type="text"  id="ifReject" name="assign_to" class="form-control" value="{{$user->fullname}}"  readonly>
                             @endif
                       @endforeach
                    </div>
                </div>
              
               

        </div>
        

        <div class="form-group row">
            <label for="comment_itsr" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
                <textarea  name="comment_itsr" class="form-control" placeholder="" required></textarea>
            </div>
        </div>
        
        <div>
            <button type="submit" class="btn">Submit</button>
        </div>
    </form>
</div>


</div>
<br></div>



@endsection
<script>



function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function approvereject() {
    if (document.getElementById('approveCheck').checked) {
        document.getElementById('ifApproveLabel').style.display = '';
        document.getElementById('ifApprove').style.display = '';
        document.getElementById('ifApprove').disabled = false;
        document.getElementById('ifReject').style.display = 'none';
        document.getElementById('ifReject').disabled = true;

    }
    else {
        document.getElementById('ifApproveLabel').style.display = '';
        document.getElementById('ifApprove').style.display = 'none';
        document.getElementById('ifApprove').disabled = true;
        document.getElementById('ifReject').style.display = '';
        document.getElementById('ifReject').disabled = false;

    }
    

}

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
   