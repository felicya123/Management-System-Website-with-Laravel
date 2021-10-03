@extends('layouts.applayout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row col-sm-2 height20">
    <a href="/work/{{auth::user()->division}}" class="closebtn">Back</a>
</div>
<div class="section-title">
@foreach($wb as $a)
@if(Auth::user()->division == "IT_AppsManager" && $a->description == "Waiting for Deployment Doc to be viewed by IT Apps Manager")
          <h2>Deployment Verification View Form</h2>
@elseif(Auth::user()->division == "Sysadmin" && $a->description == "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin")
          <h2>CCR - Deployment and Rollback Plan View Form</h2>
@endif
@endforeach
</div>
<div class="borderline"> <br>
<div class="">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR')">ITSR</button>
  <button class="tablinks" onclick="openCity(event, 'Doc')">Document Attachment</button>
  <button class="tablinks" onclick="openCity(event, 'Approval')">Review</button>
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
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Choose file</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view </button></a>
            </div>
        </div>  
</div>

<div id="Doc" class="tabcontent">
<h3>Document Attachment</h3>
@foreach($wb as $a)
@if(Auth::user()->division == "IT_AppsManager" && $a->description == "Waiting for Deployment Doc to be viewed by IT Apps Manager")
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR Assessment File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/work-am/itsr/assessment/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        @if($data->implementation_development == "Third Party")
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/fsd/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/tsd/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/sit-tp/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/sit-tr/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        @if($data->security_testing=="1")
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Plan File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/sat-tp/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Result File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/sat-tr/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Plan File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/uat-tp/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Result File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/uat-tr/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Memo Deploy File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/memodeploy/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

       <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deploy Doc File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/deploydoc/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

@elseif(Auth::user()->division == "Sysadmin" && $a->description == "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin")
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Memo Deploy File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/memodeploy/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deploy Doc File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/deploydoc/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">CCR File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/ccr/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deploy Plan File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/deployplan/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Rollback Plan File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/rollbackplan/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
@endif
@endforeach
</div>

@foreach($wb as $a)
@if(Auth::user()->division == "IT_AppsManager" && $a->description == "Waiting for Deployment Doc to be viewed by IT Apps Manager")
<form method="POST" action="{{url('/work-am/implementation/view-deploy-doc-am-store/'.$id->id)}}" enctype="multipart/form-data">
@elseif(Auth::user()->division == "Sysadmin" && $a->description == "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin")
<form method="POST" action="{{url('/work-sysadmin/implementation/view-ccr-store/'.$id->id)}}" enctype="multipart/form-data">
@endif
@endforeach
<div id="Approval" class="tabcontent">
 @csrf
    
    <div class="">
        @foreach($wb as $row)
        @if($row->itsr_no == $itsr->itsr_no)
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
        @break
        @endif
        
        @endforeach

        @foreach($wb as $a)
        @if(Auth::user()->division == "IT_AppsManager" && $a->description == "Waiting for Deployment Doc to be viewed by IT Apps Manager")
        @foreach($verif as $v)
        <div class="form-group row">
                <div class="col-sm-12">
                    <b><label for="comment_itsr" >SDLC Documents</label></b>
                </div>
                @if($v->itsr_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> ITSR
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> ITSR
                </div>
                @endif
                @if($v->itsr_assess_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> ITSR Assessment
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> ITSR Assessment
                </div>
                @endif
                @if($v->fsd_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> FSD
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> FSD
                </div>
                @endif
            </div>
            <div class="form-group row">
                @if($v->tsd_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> TSD
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> TSD
                </div>
                @endif
                @if($v->sit_tc_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> SIT Test Script/Case/Scenario
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> SIT Test Script/Case/Scenario
                </div>
                @endif
                @if($v->sit_tp_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> SIT Test Plan
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> SIT Test Plan
                </div>
                @endif
            </div>
            <div class="form-group row">
                @if($v->sit_tr_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> SIT Test Result
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> SIT Test Result
                </div>
                @endif
                @if($v->sat_tp_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> SAT Test Plan
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> SAT Test Plan
                </div>
                @endif
                @if($v->sat_tr_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> SAT Test Result
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> SAT Test Result
                </div>
                @endif
            </div>
            <div class="form-group row">
                @if($v->uat_tc_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> UAT Test Script/Case/Scenario
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> UAT Test Script/Case/Scenario
                </div>
                @endif
                @if($v->uat_tp_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> UAT Test Plan
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> UAT Test Plan
                </div>
                @endif
                @if($v->uat_tr_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> UAT Test Result
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> UAT Test Result
                </div>
                @endif
                
            </div>
            <div class="form-group row">
                @if($v->memodeploy_status == "1")
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" checked disabled> Memo Deploy
                </div>
                @else
                <div class="col-sm-4">
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled> Memo Deploy
                </div>
                @endif
            </div>
        @endforeach
        <h3>Action</h3>
        <div class="form-group row" >
                    <label for="title_itsr" class="col-sm-2 col-form-label">Assign To</label>
                    <div class="col-sm-10">
                        <select name="assign_to"  class="form-control">
                            @foreach($users as $user)
                                @if($user->division == "IT_Developer")
                                    <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
            </div>


            <div class="form-group row">
                <label for="comment_itsr" class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-10">
                    <textarea  name="comment_itsr" class="form-control" placeholder="" required></textarea>
                </div>
            </div>

        <div>
            <button type="submit" class="btn">Done</button>
        </div>   

        @elseif(Auth::user()->division == "Sysadmin" && $a->description == "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin")
        <h3>Submission</h3>
        <div class="form-group row">
            <label for="ccr_information" class="col-sm-2 col-form-label">CCR Information</label>
            <div class="col-sm-10">
                <input type="text" name="ccr_information" class="form-control"  value="{{$data->ccr_information}}" readonly>
                
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
        @endif
        @endforeach
        
    </div>
    
        
    </form>
</div>


</div>
<br></div>



</body>
    

 </html>
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
   