@extends('layouts.applayout')
@section('content')
<div class="row col-sm-2 height20">
    <a href="/work/{{auth::user()->division}}" class="closebtn">Back</a>
</div>
<div class="section-title">
          <h2>TSD Form</h2>
</div>

<div class="borderline"> <br>
<div class="">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR')">ITSR</button>
  <button class="tablinks" onclick="openCity(event, 'Doc')">Document Attachment</button>
  <button class="tablinks" onclick="openCity(event, 'SubmissionFSD')">Submission</button>
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
        @if($data->tsd_file != null)
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="fsd_file">TSD File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/tsd/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif
        @if($data->tsd_review_sa_file != null)
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="fsd_file">TSD Review by SA File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/review-tsd-sa/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif
        @if($data->tsd_review_infra_file != null)
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="fsd_file">TSD Review by Infra File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/review-tsd-infra/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif
        @if($data->tsd_review_security_file != null)
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="fsd_file">TSD Review by Security File</label>
            <div class="custom-file custom-file col-sm-10">
                <a href="/files/review-tsd-security/{{$itsr->itsr_no}}" target="_blank"><button class="btn">view</button></a>
            </div>
        </div>
        @endif
      
</div>

<!--Submission-->
<form method="POST" action="{{url('/work-developer/design/create-tsd-store/'.$id->id)}}" enctype="multipart/form-data">
<div id="SubmissionFSD" class="tabcontent">
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
        
            @endif
            @endforeach
            <h3>Submission</h3>
            <div class="form-group row">
                    <label for="title_itsr" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title_itsr"class="form-control" required>
                    </div>
            </div>
            
            <div class="form-group row" >
                    <label for="title_itsr" class="col-sm-2 col-form-label">Assign To</label>
                    <div class="col-sm-10">
                        <select name="assign_to"  class="form-control">
                            @foreach($users as $user)
                                @if($user->division == "IT_SA")
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

            
            <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="tsd_file">Choose file</label>
            <div class="custom-file custom-file col-sm-10">
                <input type="file" class="custom-file-input" id="tsd_file" name="tsd_file" onchange="return fileValidation()" required>
                <label class="custom-file-label" for="tsd_file">Choose file</label>
                <i>File extention must be in .pdf format</i>
            </div>
        
        </div>

        <script>
            $('#tsd_file').on('change',function(){
                var fileName = $(this).val();
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                $(this).next('.custom-file-label').html(cleanFileName);
            })
            function fileValidation() { 
                var fileInput =  
                    document.getElementById('tsd_file'); 
                
                var filePath = fileInput.value; 
            
                // Allowing file type 
                var allowedExtensions =  
                        /(\.pdf)$/i; 
                
                if (!allowedExtensions.exec(filePath)) { 
                    alert('File must be in .pdf format'); 
                    fileInput.value = ''; 
                    return false; 
                }  
            }
        </script>
            
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
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

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
   