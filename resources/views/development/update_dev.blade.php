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
          <h2>Development Execution Form</h2>
</div>
<div class="borderline"> <br>
<div class="">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'ITSR')">ITSR</button>
  <button class="tablinks" onclick="openCity(event, 'Doc')">Document Attachment</button>
  <button class="tablinks" onclick="openCity(event, 'SubmissionDev')">Update</button>
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
           @foreach($dev as $d)
            @if($d->dev_file != null)
            <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="fsd_file">Development File (Week-{{$d->week}})</label>
                <div class="custom-file custom-file col-sm-9" >
                    <a href="/files/dev/developer/{{$d->id}}" target="_blank"><button data-target="#exampleModal-{{$d->id}}" class="btn">view</button></a>
                </div>
            </div>
            @endif
           @endforeach      
</div>


<!--Submission-->

<form method="POST" action="{{url('/work-sa/dev/update-dev-sa-store/'.$id->id)}}" enctype="multipart/form-data">

<div id="SubmissionDev" class="tabcontent">

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
            <h3>Development History</h3>
            <div  class="form-group row" >
            <table class="table table-bordered css-serial">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Week</th>
                    <th scope="col">Status Development</th>
                    <th scope="col">On Progress Status</th>
                    <th scope="col">Comment</th>
                    </tr>
                </thead>
                @foreach($dev as $row)
                <tbody>
                    <tr>
                    <td></td>
                    <td>{{$row->week}}</td>
                    <td>{{$row->status_dev}}</td>
                    <td>{{$row->onprogress_detail}}</td>
                    <td>{{$row->comment}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
              
            </div>
            <h3>Submission</h3>
            <div  class="form-group row" >
                <label for="onprogress_detail" class="col-sm-2 col-form-label">Week</label>
                <div class="col-sm-10">
                    <div class="col-sm">
                        <div class="btn-group">
                            @foreach($dev2 as $week)
                            <input type="number" name="week" value="{{$week->week}}"min="1" max="100" required>
                            @break
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->division=="IT_SA")
            
            <div class="form-group row">
            <label for="status_itsr_ba" class="col-sm-2 col-form-label">Status Development</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <div class="btn-group">
                        <input type="radio" onclick="javascript:approvereject_sa();"name="status_itsr" value="Development Pending" id="pendingCheck_sa"required>Pending
                        <input type="radio" onclick="javascript:approvereject_sa();"name="status_itsr" value="Development On Progress" id="onprogressCheck_sa"required>On Progress
                        <input type="radio" onclick="javascript:approvereject_sa();"name="status_itsr" value="Development Done" id="doneCheck_sa"required>Done
                    </div>                    
                </div>
            </div>
            </div> 
            <div  class="form-group row" id="ifOnprogress" style="display:none;">
                <label for="onprogress_detail" class="col-sm-2 col-form-label">On Progress Detail</label>
                <div class="col-sm-10">
                    <div class="col-sm">
                        <div class="btn-group">
                            <input type="radio" name="onprogress_detail" value="Development" id="ifOnprogress-dev" style="display:none;" required disabled>Development
                            <input type="radio" name="onprogress_detail" value="Testing" id="ifOnprogress-test"style="display:none;"  disabled>Testing    
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="form-group row" id="assignto_developerLabel" style="display:none;">
                <label for="title_itsr" class="col-sm-2 col-form-label">Assign To</label>
                    <div class="col-sm-10" >
                            @foreach($reject as $a)
                                <input type="input" class="form-control" name="assign_to" id="assignto_developer" style="display:none;" value="{{$a->fullname}}" readonly>
                            @break
                            @endforeach
                    </div>
            </div>
            


            <div class="form-group row">
                <label for="comment_itsr" class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-10">
                    <textarea  name="comment_itsr" class="form-control" placeholder="" required></textarea>
                </div>
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

var cars = ["BMW", "Volvo", "Saab", "Ford", "Fiat", "Audi"];
var text = "";
var i;
for (i = 0; i < cars.length; i++) {
  text += cars[i] + "<br>";
}
document.getElementById("demo").innerHTML = text;

function approvereject_sa() {
    if (document.getElementById('doneCheck_sa').checked) {
        document.getElementById('ifOnprogress').style.display = 'none';
        document.getElementById('ifOnprogress-test').style.display = 'none';
        document.getElementById('ifOnprogress-test').disabled = true;
        document.getElementById('ifOnprogress-dev').style.display = 'none';
        document.getElementById('ifOnprogress-dev').disabled = true;
        document.getElementById('assignto_developerLabel').style.display = 'none';
        document.getElementById('assignto_developer').style.display = 'none';
        document.getElementById('assignto_developer').disabled = true;
        
        
    }
    else if(document.getElementById('onprogressCheck_sa').checked){
        document.getElementById('ifOnprogress').style.display = '';
        document.getElementById('ifOnprogress-test').style.display = '';
        document.getElementById('ifOnprogress-test').disabled = false;
        document.getElementById('ifOnprogress-dev').style.display = '';
        document.getElementById('ifOnprogress-dev').disabled = false;
        document.getElementById('assignto_developerLabel').style.display = '';
        document.getElementById('assignto_developer').style.display = '';
        document.getElementById('assignto_developer').disabled = false;
        
        
    }
    else if(document.getElementById('pendingCheck_sa').checked){
        document.getElementById('ifOnprogress').style.display = 'none';
        document.getElementById('ifOnprogress-test').style.display = 'none';
        document.getElementById('ifOnprogress-test').disabled = true;
        document.getElementById('ifOnprogress-dev').style.display = 'none';
        document.getElementById('ifOnprogress-dev').disabled = true;
        document.getElementById('assignto_developerLabel').style.display = '';
        document.getElementById('assignto_developer').style.display = '';
        document.getElementById('assignto_developer').disabled = false;
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
   