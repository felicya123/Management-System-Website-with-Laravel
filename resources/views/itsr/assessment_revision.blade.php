@extends('layouts.applayout')
@section('content')
<div class="section-title">
          <h2>ITSR Assessment Form</h2>
</div>
<div class="borderline"> <br>
<div class="">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR')">ITSR</button>
  <button class="tablinks" onclick="openCity(event, 'ITSR_Assessment')">ITSR Assessment</button>
  <button class="tablinks" onclick="openCity(event, 'Submission')">Submission</button>
</div>


    <div id="ITSR" class="tabcontent">
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
            <label for="application_name" class="col-sm-2 col-form-label">Application Name</label>
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
                <a href="/files/{{$itsr->itsr_no}}"><button class="btn">view</button></a>
            </div>
        </div>
    </div>


<!--ITSR ASSESSMENT-->
@foreach($assess as $a)
@if(Auth::user()->division == "IT_BA")
    <form action="{{url('/work-ba/itsr/create-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "IT_SA" && ($a->impacted_app == null))
    <form action="{{url('/work-sa/itsr/sa-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "IT_SA" && $a->impacted_app == "1" )
    <form action="{{url('/work-sa/itsr/sa-impacted-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "IT_Security")
    <form action="{{url('/work-security/itsr/security-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "SKMR")
    <form action="{{url('/work-skmr/itsr/skmr-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "SKK")
    <form action="{{url('/work-skk/itsr/skk-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "IT_AppsManager")
    <form action="{{url('/work-am/itsr/am-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "IT_PMO")
    <form action="{{url('/work-pmo/itsr/pmo-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@elseif(Auth::user()->division == "User")
    <form action="{{url('/work-user/itsr/user-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@else
    <form action="{{url('/itsr/create-assessment-store/'.$id->id)}}" method="POST" enctype="multipart/form-data" >
@endif
@endforeach
<div id="ITSR_Assessment" class="tabcontent">

@foreach($assess as $row)
@if(Auth::user()->division == "IT_BA")

    <div class="form-group row">
            <label for="assessment_start_date" class="col-sm-2 col-form-label">Assessment Start Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_start_date" class="form-control" value="{{$row->assessment_start_date}}" required>
            </div>
     </div>
     <div class="form-group row">
            <label for="assessment_end_date" class="col-sm-2 col-form-label">Assessment End Date</label>
            <div class="col-sm-3">
            <input type="date" name="assessment_end_date" class="form-control" value="{{$row->assessment_end_date}}" required>
            </div>
     </div>
  
@else

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
            <input type="text" name="project_description" class="form-control" value="{{$row->project_description}}" required>
            </div>
     </div>
@else

    <div class="form-group row">
            <label for="project_description" class="col-sm-2 col-form-label">Project description</label>
            <div class="col-sm-10">
            <input type="text" name="project_description" class="form-control" value="{{$row->project_description}}"readonly>
            </div>
     </div>
     
@endif
     
     <h4><b>Assessment by IT BA</b></h4>
    @if(Auth::user()->division == "IT_BA")
     <div class="form-group row">
            <label for="scope_of_work" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <input type="text" name="scope_of_work" class="form-control" value="{{$row->scope_of_work}}"required>
            </div>
     </div>
     <div class="form-group row">
            <label for="user_requirement" class="col-sm-2 col-form-label">User Requirement</label>
            <div class="col-sm-10">
            <input type="text" name="user_requirement" class="form-control" value="{{$row->user_requirement}}"required>
            </div>
     </div>
     @else
     
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
     
     @endif
     @endforeach
     <h4><b>Assessment by IT SA</b></h4>
     @foreach($assess as $row)
     @if(Auth::user()->division == "IT_SA" && $row->impacted_app == null)
     <div class="form-group row">
            <label for="impacted_app" class="col-sm-2 col-form-label">Impacted App</label>
            <div class="col-sm-10">
                <input type="radio" onclick="myFunctiontyes();"name="impacted_app" value="1" id="yesCheck">Yes
                <input type="radio" onclick="myFunctionno();"name="impacted_app" value="0" id="noCheck">No
            </div>
     </div>

     <div id="impacted_apps" class="form-group row" name="Form">
            <!--1-->
            <label for="impacted_app1" class="col-sm-2 col-form-label">Impacted App 1</label>
            <div class="col-sm-4">
                 <input id="impacted_app1" type="input" name="impacted_app1" class="form-control" required>
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app1" class="col-form-label">IT SA 1</label>
            </div>
            <div class = "col-sm-4">
                <input id="pic_impacted_app1"type="input" name="pic_impacted_app1" class="form-control" required >
            </div>
            <!--2-->
            <label for="impacted_app2" class="col-sm-2 col-form-label">Impacted App 2</label>
            <div class="col-sm-4">
                 <input id="impacted_app2"type="input" name="impacted_app2" class="form-control" >
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app2" class="col-form-label">IT SA 2</label>
            </div>
            <div class = "col-sm-4">
                <input id="pic_impacted_app2"type="input" name="pic_impacted_app2" class="form-control" >
            </div>
            <!--3-->
            <label for="impacted_app3" class="col-sm-2 col-form-label">Impacted App 3</label>
            <div class="col-sm-4">
                 <input id="impacted_app3"type="input" name="impacted_app3" class="form-control" >
            </div>
            <div class="col-sm-2">
            <label for="pic_impacted_app3" class="col-form-label">IT SA 3</label>
            </div>
            <div class = "col-sm-4">
                <input id="pic_impacted_app3"type="input" name="pic_impacted_app3" class="form-control" >
            </div>
     </div>
    
    @else
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
     @endif
     @endforeach
     
     <h4><b>Assessment by IT Security</b></h4>
     @if(Auth::user()->division == "IT_Security" )
     <b><label for="security_testing" class="col-form-label">Apakah Diperlukan?</label></b>
     <div class="form-group row">
            <label for="security_testing" class="col-sm-2 col-form-label">Security Testing</label>
            <div class="col-sm-10">
               
                    <input type="radio" name="security_testing"   value="1" required>Yes
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
            <div class="col-sm-10 ">
            <textarea class="form-control" name="assessment_security" required></textarea>
                
            </div>
     </div>
     @else
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
    @endif
   
    <h4><b>Assessment by Satuan Kerja Manajemen Resiko</b></h4>
    @if(Auth::user()->division == "SKMR")
    <div class="form-group row">
            <label for="assessment_skmr" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
             <textarea name="assessment_skmr"class="form-control" required></textarea>
            </div>
     </div>
     @else
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="assessment_skmr" class="col-sm-2 col-form-label">Assessment</label>
            <div class="col-sm-10">
                
                <textarea name="assessment_skmr"class="form-control" readonly>{{$row->assessment_skmr}}</textarea>
            </div>
     </div>
     @endforeach
     @endif

     <h4><b>Assessment by Satuan Kerja Kepatuhan</b></h4>
    @if(Auth::user()->division == "SKK")
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
                <textarea   class="form-control"name="assessment_skk" required></textarea>
            </div>
     </div>
     @else
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
     @endif

     <h4><b>Assessment by IT Apps Manager</b></h4>
    @if(Auth::user()->division == "IT_AppsManager")
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Implementation will be done</label>
            <div class="col-sm-10">
                <input type="radio" name="implementation_development" value="Internal IT Developer" <?=$itsr->development_choice=="External IT Developer" ? "checked" : ""?>>Internal IT Developer
                <input type="radio" name="implementation_development" value="External IT Developer"  <?=$itsr->development_choice=="External IT Developer" ? "checked" : ""?>>External IT Developer (Digital Banking Team)
                <input type="radio" name="implementation_development" value="Third Party"  <?=$itsr->development_choice=="Third Party (Vendor)" ? "checked" : ""?>>Third Party (Vendor)
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
            <label for="uat_start_date" class="col-sm-2 col-form-label">UAT</label>
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
                <input type="date" name="pat_end_date" class="form-control" required>
            </div>
            <!--Golive-->
            <label for="golive_date" class="col-sm-2 col-form-label">Golive</label>
            <div class="col-sm-4">
                 <input type="date" name="golive_date" class="form-control" required>
            </div>
     </div>
     @else
     @foreach($assess as $row)
     <div class="form-group row">
            <label for="reportregulator_approval" class="col-sm-2 col-form-label">Implementation will be done</label>
            <div class="col-sm-10">
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="Internal IT Developer" ? "checked" : ""?> disabled>Internal IT Developer
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="External IT Developer" ? "checked" : ""?> disabled>External IT Developer (DIgital Banking Team)
                <input type="radio" name="implementation_development" <?=$row->implementation_development=="Third Party" ? "checked" : ""?> disabled>Third Party
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
     @endif

     <h4><b>Assessment by IT PMO</b></h4>
    @if(Auth::user()->division == "IT_PMO")
    
     <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
                <input type="radio" name="category" <?=$itsr->request_type=="New Project Besar" ? "checked" : ""?> value ="New Project Besar" disable>New Project (Besar)
                <input type="radio" name="category" <?=$itsr->request_type=="New Project Kecil" ? "checked" : ""?> value ="New Project Kecil" disable>New Project (Kecil)
                <input type="radio" name="category" <?=$itsr->request_type=="Enhancement Besar" ? "checked" : ""?> value ="Enhancement Besar" disable>Enhancement (Besar)
                <input type="radio" name="category" <?=$itsr->request_type=="Enhancement Kecil" ? "checked" : ""?> value ="Enhancement Kecil" disable>Enhancement (Kecil)
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
    
    <h3>Submission</h3>
        <div class="form-group row">
                <label for="title_itsr" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title_itsr"class="form-control" required>
                </div>
        </div>
        
        
        @foreach($assess as $a)
        @if(Auth::user()->division != "IT_BA")
        <div class="form-group row">
            <label for="approval" class="col-sm-2 col-form-label">Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" onclick="approvereject();"name="status_itsr" value="Approve" id="approveCheck">Approve
                </div>
                <div class="col-sm">
                    <input type="radio" onclick="approvereject();"name="status_itsr" value="Reject" id="rejectCheck">Reject
                </div>
            </div>
        </div>
        @endif

        @if(Auth::user()->division == "IT_BA")
        <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                       @if($user->division == "IT_BAHead")
                         <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                         @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "IT_SA")
        <div class="form-group row" id="itsa_assignto" style="visibility:hidden;" disabled>
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control" >
                       @foreach($users as $user)
                            @if($user->division == "IT_Security")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "IT_Security")
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "SKMR")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "SKMR")
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "SKK")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "SKK")
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "IT_AppsManager")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "IT_AppsManager")
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "IT_PMO")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "IT_PMO")
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "User")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        
        @elseif(Auth::user()->division == "User" && $a->implementation_development == "Third Party (Vendor)" )
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "IT_BA")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @elseif(Auth::user()->division == "User" && $a->implementation_development != "Third Party (Vendor)" )
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control">
                       @foreach($users as $user)
                            @if($user->division == "IT_Developer")
                            <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
        </div>
        @endif
        @endforeach
        
        

        <div class="form-group row">
            <label for="comment_itsr" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
                <textarea  name="comment_itsr" class="form-control" placeholder="" required></textarea>
            </div>
        </div>
    </div>

    <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="assessment_file">Choose file</label>
            <div class="custom-file custom-file col-sm-10">
                <input type="file" class="custom-file-input" id="assessment_file" name="assessment_file">
                <label class="custom-file-label" for="file_name">Choose file</label>
            </div>
        
        </div>
        <script>
            $('#assessment_file').on('change',function(){
                var fileName = $(this).val();
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                $(this).next('.custom-file-label').html(cleanFileName);
            })
            $('#assessment_sa_file').on('change',function(){
                var fileName = $(this).val();
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                $(this).next('.custom-file-label').html(cleanFileName);
            })
        </script>
    
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

function approvereject() {


    if (document.getElementById('approveCheck').checked && document.getElementById('noCheck').checked) {
        document.getElementById('itsa_assignto').style.visibility = 'visible';
        document.getElementById("itsa_assignto").disabled = false;
    }
    else {
        document.getElementById('itsa_assignto').style.visibility = 'hidden';
        document.getElementById("itsa_assignto").disabled = true;

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
   