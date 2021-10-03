@extends('layouts.viewlayout')
<head>
    <style>
        .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
</head>
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="section-title">
          <h2>ITSR Assessment Form</h2>
</div>
<div class="borderline">
<div class="container">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR_Assessment')"></button>
</div>

<!--ITSR ASSESSMENT-->

<div id="ITSR_Assessment" class="tabcontent" style="display:block">


@foreach($assess as $row)
    <div class="form-group row">
            <label for="assessment_start_date" class="col-sm-2 col-form-label">Assessment Start Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_start_date" class="form-control" value="{{$row->assessment_start_date}}"readonly>
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_end_date" class="col-sm-2 col-form-label">Assessment End Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_end_date" class="form-control" value="{{$row->assessment_end_date}}"readonly>
            </div>
     </div>
     @endforeach


     <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">SR Name</label>
            <div class="col-sm-10">
                <input type="text" name="project_name" class="form-control"  value="{{$itsr->project_name}}" readonly>
                
            </div>
        </div>
        

@foreach($assess as $row)
    <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Project description</label>
            <div class="col-sm-10">
            <input type="text" name="project_description" class="form-control" value="{{$row->project_description}}"readonly>
            </div>
     </div>
     @endforeach
     
     <h4><b>Assessment by IT BA</b></h4>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="scope_of_work" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <input type="text" name="scope_of_work" class="form-control" value="{{$row->scope_of_work}}"readonly>
            </div>
     </div>
     <div class="form-group row">
            <label for="user_requirement" class="col-sm-2 col-form-label">User Requirement</label>
            <div class="col-sm-10">
            <input type="text" name="user_requirement" class="form-control"  value="{{$row->user_requirement}}"readonly>
            </div>
     </div>
     @endforeach

     <h4><b>Assessment by IT SA</b></h4>
     @foreach($assess as $row)
    @foreach($assess as $row)
    <div class="form-group row">
            <label for="impacted_app" class="col-sm-2 col-form-label">Impacted App</label>
            <div class="col-sm-10">
                <input type="radio"name="impacted_app"  <?=$row->impacted_app=="1" ? "checked" : ""?> value="1"disabled >Yes
                <input type="radio" name="impacted_app" <?=$row->impacted_app=="0" ? "checked" : ""?> value="0"disabled >No
            </div>
     </div>

     <div  class="form-group row">
            <!--1-->
            <label for="impacted_app1" class="col-sm-2 col-form-label">Impacted App 1</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app1" class="form-control" value="{{$row->impacted_app1}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app1" class="col-form-label">IT SA 1</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app1" class="form-control" value="{{$row->pic_impacted_app1}}" readonly>
            </div>
            <!--2-->
            <label for="impacted_app2" class="col-sm-2 col-form-label">Impacted App 2</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app2" class="form-control" value="{{$row->impacted_app2}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app2" class="col-form-label">IT SA 2</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app2" class="form-control" value="{{$row->pic_impacted_app2}}" readonly>
            </div>
            <!--3-->
            <label for="impacted_app3" class="col-sm-2 col-form-label">Impacted App 3</label>
            <div class="col-sm-4">
                 <input type="input" name="impacted_app3" class="form-control" value="{{$row->impacted_app3}}" readonly>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app3" class="col-form-label">IT SA 3</label>
            </div>
            <div class = "col-sm-4">
                <input type="input" name="pic_impacted_app3" class="form-control"   value="{{$row->pic_impacted_app3}}"readonly>
            </div>
     </div>
     @endforeach
     @endforeach
     
     <h4><b>Assessment by IT Security</b></h4>
     <b><label for="security_testing" class="col-form-label">Apakah Diperlukan?</label></b>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="security_testing" class="col-sm-2 col-form-label">Security Testing</label>
            <div class="col-sm-10">
                    <input type="radio" name="security_testing" <?=$row->security_testing=="1" ? "checked" : ""?> disabled>Yes
                    <input type="radio" name="security_testing" <?=$row->security_testing=="0" ? "checked" : ""?> disabled>No
            </div>
     </div>
     
     <div class="form-group row">
            <label for="penetration_test_internal" class="col-sm-2 col-form-label">Penetration Test (internal)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_internal" <?=$row->penetration_test_internal=="1" ? "checked" : ""?> disabled>Yes                
                <input type="radio" name="penetration_test_internal" <?=$row->penetration_test_internal=="0" ? "checked" : ""?> disabled>No
                
            </div>
     </div>
     <div class="form-group row">
            <label for="penetration_test_vendor" class="col-sm-2 col-form-label">Penetration Test (vendor)</label>
            <div class="col-sm-10">
                <input type="radio" name="penetration_test_vendor" <?=$row->penetration_test_vendor=="1" ? "checked" : ""?> disabled>Yes              
                <input type="radio" name="penetration_test_vendor" <?=$row->penetration_test_vendor=="0" ? "checked" : ""?> disabled>No

            </div>
     </div>
     <div class="form-group row">
            <label for="user_matrix_doc" class="col-sm-2 col-form-label">User Matrix Document</label>
            <div class="col-sm-10">
                <input type="radio" name="user_matrix_doc" <?=$row->user_matrix_doc=="1" ? "checked" : ""?> disabled>Yes              
                <input type="radio" name="user_matrix_doc" <?=$row->user_matrix_doc=="0" ? "checked" : ""?> disabled>No            
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_security" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <textarea readonly  class="form-control"name="assessment_security" >{{$row->assessment_security}}</textarea>
            </div>
     </div>
     @endforeach
   
    <h4><b>Assessment by Satuan Kerja Manajemen Resiko</b></h4>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="assessment_skmr" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                
                <textarea name="assessment_skmr"class="form-control" readonly>{{$row->assessment_skmr}}</textarea>
            </div>
     </div>
     @endforeach

     <h4><b>Assessment by Satuan Kerja Kepatuhan</b></h4>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="report_ojk" class="col-sm-2 col-form-label">Report to OJK</label>
            <div class="col-sm-10">
                <input type="radio" name="report_ojk" <?=$row->report_ojk=="1" ? "checked" : ""?> disabled>Yes
                <input type="radio" name="report_ojk" <?=$row->report_ojk=="0" ? "checked" : ""?> disabled>No
            </div>
     </div>
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Regulator's Approval</label>
            <div class="col-sm-10">
                <input type="radio" name="reportregulator_approval" <?=$row->reportregulator_approval=="1" ? "checked" : ""?> disabled>Yes
                <input type="radio" name="reportregulator_approval" <?=$row->reportregulator_approval=="0" ? "checked" : ""?> disabled>No

            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_skk" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                <textarea readonly  class="form-control"name="assessment_skk" >{{$row->assessment_skk}}</textarea>
            </div>
     </div>
     @endforeach

     <h4><b>Assessment by IT Apps Manager</b></h4>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Implementation will be done</label>
            <div class="col-sm-10">
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="Internal IT Developer" ? "checked" : ""?> disabled>Internal IT Developer
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="External IT Developer" ? "checked" : ""?> disabled>External IT Developer (DIgital Banking Team)
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="Third Party (Vendor)" ? "checked" : ""?> disabled>Third Party
            </div>
     </div>
     <b><label for="" class="col-form-label">Project timeline</label></b>
     <div class="form-group row">
            <!--Development-->
            <label for="dev_start_date" class="col-sm-2 col-form-label">Development</label>
            <div class="col-sm-4">
                 <input type="date" name="dev_start_date" class="form-control" value="{{$row->dev_start_date}}" readonly>
            </div>
            <div class="col-sm-2">
            <label for="dev_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="dev_end_date" class="form-control" value="{{$row->dev_end_date}}" readonly>
            </div>
            <!--SIT-->
            <label for="sit_start_date" class="col-sm-2 col-form-label">SIT</label>
            <div class="col-sm-4">
                 <input type="date" name="sit_start_date" class="form-control" value="{{$row->sit_start_date}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="sit_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sit_end_date" class="form-control" value="{{$row->sit_end_date}}"readonly>
            </div>
            <!--SAT-->
            <label for="sat_start_date" class="col-sm-2 col-form-label">SAT</label>
            <div class="col-sm-4">
                 <input type="date" name="sat_start_date" class="form-control" value="{{$row->sat_start_date}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="sat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="sat_end_date" class="form-control" value="{{$row->sat_end_date}}"readonly>
            </div>
            <!--UAT-->
            <label for="uatt_start_date" class="col-sm-2 col-form-label">UAT</label>
            <div class="col-sm-4">
                 <input type="date" name="uat_start_date" class="form-control"value="{{$row->uat_start_date}}" readonly>
            </div>
            <div class="col-sm-2">
            <label for="uat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="uat_end_date" class="form-control" value="{{$row->uat_end_date}}"readonly>
            </div>
            <!--Deployment-->
            <label for="deploy_start_date" class="col-sm-2 col-form-label">Deployment</label>
            <div class="col-sm-4">
                 <input type="date" name="deploy_start_date" class="form-control" value="{{$row->deploy_start_date}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="deploy_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="deploy_end_date" class="form-control" value="{{$row->deploy_start_date}}"readonly>
            </div>
            <!--PAT-->
            <label for="pat_start_date" class="col-sm-2 col-form-label">PAT</label>
            <div class="col-sm-4">
                 <input type="date" name="pat_start_date" class="form-control" value="{{$row->pat_start_date}}"readonly>
            </div>
            <div class="col-sm-2">
            <label for="pat_end_date" class="col-form-label">s/d</label>
            </div>
            <div class = "col-sm-4">
                <input type="date" name="pat_end_date" class="form-control" value="{{$row->pat_end_date}}"readonly>
            </div>
            <!--Golive-->
            <label for="golive_date" class="col-sm-2 col-form-label">Golive</label>
            <div class="col-sm-4">
                 <input type="date" name="golive_date" class="form-control"  value="{{$row->golive_date}}"readonly>
            </div>
     </div>
     @endforeach

     <h4><b>Assessment by IT PMO</b></h4>
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Categorys</label>
            <div class="col-sm-10">
            <input type="radio" name="category" <?=$row->category=="New Project Besar" ? "checked" : ""?> disabled>New Project (Besar)
            <input type="radio" name="category" <?=$row->category=="New Project Kecil" ? "checked" : ""?> disabled>New Project (kecil)
            <input type="radio" name="category" <?=$row->category=="Enhancement Besar" ? "checked" : ""?> disabled>Enhancement (Besar)
            <input type="radio" name="category" <?=$row->category=="Enhancement Kecil" ? "checked" : ""?> disabled>Enhancement (Kecil)
            </div>
     </div>
     <div>
        <b>Organization Structure</b>
        <div class="form-group row">
                <label for="bo" class="col-sm-2 col-form-label">Business Owner</label>
                <div class="col-sm-10">
                    <input type="text" name="bo" class="form-control" value="{{$row->bo}}"readonly>
                </div>
        </div>
        <div class="form-group row">
                <label for="business_pm" class="col-sm-2 col-form-label">Business PM</label>
                <div class="col-sm-10">
                    <input type="text" name="business_pm" class="form-control" value="{{$row->business_pm}}"readonly>
                </div>
        </div>
     </div>
     @endforeach

</div>
</div>


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
function validateForm() {
    var a = document.forms["Form"]["pic_impacted_app1"].value;
    var b = document.forms["Form"]["pic_impacted_app2"].value;
    var c = document.forms["Form"]["pic_impacted_app3"].value;
    if (a == null && b == null && c == null) {
        document.getElementById("noimpactedAssignTo").disabled = false;
        document.getElementById("noimpactedAssignTo").style.visibility = visible;
        
    }
  }


function myFunctionno() {
  document.getElementById("impacted_app1").disabled = true;
  document.getElementById("impacted_app2").disabled = true;
  document.getElementById("impacted_app3").disabled = true;
  document.getElementById("pic_impacted_app1").disabled = true;
  document.getElementById("pic_impacted_app2").disabled = true;
  document.getElementById("pic_impacted_app3").disabled = true;
  document.getElementById("impacted_app1").value = null;
  document.getElementById("impacted_app2").value = null;
  document.getElementById("impacted_app3").value = null;
  document.getElementById("pic_impacted_app1").value = null;
  document.getElementById("pic_impacted_app2").vaue = null;
  document.getElementById("pic_impacted_app3").value = null;

}

function myFunctiontyes() {
  document.getElementById("impacted_app1").disabled = false;
  document.getElementById("impacted_app2").disabled = false;
  document.getElementById("impacted_app3").disabled = false;
  document.getElementById("pic_impacted_app1").disabled = false;
  document.getElementById("pic_impacted_app2").disabled = false;
  document.getElementById("pic_impacted_app3").disabled = false;
}

function userApproval(){
    if(document.getElementById('approveCheck').checked){
        document.getElementById('itdev_assignto').style.visibility = 'visible';
        document.getElementById("itdev_assignto").disabled = false;
        document.getElementById('bo_assignto').style.visibility = 'hidden';
        document.getElementById("bo_assignto").disabled = true;
    }else{
        document.getElementById('itdev_assignto').style.visibility = 'hidden';
        document.getElementById("itdev_assignto").disabled = true;
        document.getElementById('bo_assignto').style.visibility = 'visible';
        document.getElementById("bo_assignto").disabled = false;
    }
}

function approvereject() {


    if (document.getElementById('approveCheck').checked && document.getElementById('noCheck').checked) {
        document.getElementById('itsa_assignto').style.visibility = 'visible';
        document.getElementById("itsa_assignto").disabled = false;
        document.getElementById('itdev_assignto').style.visibility = 'visible';
        document.getElementById("itdev_assignto").disabled = false;
        document.getElementById('bo_assignto').style.visibility = 'visible';
        document.getElementById("bo_assignto").disabled = true;
    }
    else {
        document.getElementById('itsa_assignto').style.visibility = 'visible';
        document.getElementById("itsa_assignto").disabled = true;
        document.getElementById('itdev_assignto').style.visibility = 'visible';
        document.getElementById("itdev_assignto").disabled = true;
        document.getElementById('bo_assignto').style.visibility = 'visible';
        document.getElementById("bo_assignto").disabled = false;

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
   