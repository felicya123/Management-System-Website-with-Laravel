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
          <h2>ITSR Form</h2>
</div>
<div class="borderline"> <br>
    <form  method="POST" action="{{url('/itsr-revise-store/'.$itsr->itsr_no)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="">
    <div class="form-group row">
            <label for="itsr_no" class="col-sm-2 col-form-label">Title No</label>
            <div class="col-sm-10">
            <input type="text" name="itsr_no" class="form-control" value="{{$itsr->itsr_no}}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="request_type" class="col-sm-2 col-form-label"> Request Type</label>
            <div class="col-sm-10">
            <select name="request_type" id="" class="form-control">
                    <option value="New Project Besar" <?=$itsr->request_type=="New Project Besar" ? "selected" : ""?>>New Project Besar</option>
                    <option value="New Project Kecil" <?=$itsr->request_type=="New Project Kecil" ? "selected" : ""?>>New Project Kecil</option>
                    <option value="Enhancement Besar" <?=$itsr->request_type=="Enhancement Besar" ? "selected" : ""?>>Enhancement Besar</option>
                    <option value="Enhancement Kecil" <?=$itsr->request_type=="Enhancement Kecil" ? "selected" : ""?>>Enhancement Kecil</option>
                </select>
            </div>
        </div>   
            
        <div class="form-group row">
            <label for="regulator_approval" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="regulator_approval" value="Yes" {{$itsr->regulator_approval=="Yes" ? "checked" : ""}}>Yes
                </div>
                <div class="col-sm">
                    <input type="radio" name="regulator_approval" value="No" {{$itsr->regulator_approval=="No" ? "checked" : ""}}>No
                </div>
            </div>
        </div>             
            
        <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
            <div class="col-sm-10">
                <input type="text" name="project_name" class="form-control" value="{{$itsr->project_name}}">
                
            </div>
        </div>

        <div class="form-group row">
            <label for="product_or_service_name" class="col-sm-2 col-form-label">Product or Service Name</label>
            <div class="col-sm-10">
                <input type="text" name="product_or_service_name" class="form-control" value="{{$itsr->product_or_service_name}}">
            </div>
        </div>   
        
        <div class="form-group row">
            <label for="application_name" class="col-sm-2 col-form-label">Application Name</label>
            <div class="col-sm-10">
                <input type="text" name="application_name" class="form-control" value="{{$itsr->application_name}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="application_impacted" class="col-sm-2 col-form-label">Application Impacted</label>
            <div class="col-sm-10">
                <input type="text" name="application_impacted" class="form-control" value="{{$itsr->application_impacted}}">
            </div>
        </div>
           
        <div class="form-group row">
            <label for="business_impact_benefit" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Regulator Requirement" {{$itsr->business_impact_benefit=="Regulator Requirement" ? "checked" : ""}}>Regulator Requirement
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Revenue Generation" {{$itsr->business_impact_benefit=="Revenue Generation" ? "checked" : ""}}>Revenue Generation
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Eficiency/Improvement" {{$itsr->business_impact_benefit=="Eficiency/Improvement" ? "checked" : ""}}>Eficiency/Improvement
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_budget" class="col-sm-2 col-form-label">Business Budget</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="less than USD 50K" {{$itsr->business_budget=="less than USD 50K" ? "checked" : ""}}>less than USD 50K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="USD 50-100K" {{$itsr->business_budget=="USD 50-100K" ? "checked" : ""}}>USD 50-100K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="more than USD 100K" {{$itsr->business_budget=="more than USD 100K" ? "checked" : ""}}>more than USD 100K
                </div>
            </div>
        </div>     
        
        <div class="form-group row">
            <label for="total_mandays" class="col-sm-2 col-form-label">Total Mandays</label>
            <div class="col-sm-10">
            <input type="text" name="total_mandays" class="form-control" value="{{$itsr->total_mandays}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="development_choice" class="col-sm-2 col-form-label">Development choice</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="development_choice"  value = "Internal IT Developer" {{$itsr->development_choice=="Internal IT Developer" ? "checked" : ""}}>Internal IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice" value = "External IT Developer" {{$itsr->development_choice=="External IT Developer" ? "checked" : ""}}>External IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice"  value="Third Party (Vendor)" {{$itsr->development_choice=="Third Party (Vendor)" ? "checked" : ""}}>Third Party (Vendor)
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_goals" class="col-sm-2 col-form-label">Business Goals and Objective</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "business_goals" >{{$itsr->business_goals}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="scope" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "scope">{{$itsr->scope}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="requirements" class="col-sm-2 col-form-label">Requrements / Functionalities</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "requirements">{{$itsr->requirements}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="benefit_to_bank" class="col-sm-2 col-form-label">Benefit to the Bank</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "benefit_to_bank">{{$itsr->benefit_to_bank}}</textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="system_impact_analyst" class="col-sm-2 col-form-label">System Impact Analysis (on critical process)</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="system_impact_analyst" value="Yes" {{$itsr->system_impact_analyst=="Yes" ? "checked" : ""}}>Yes
                </div>
                <div class="col-sm">
                    <input type="radio" name="system_impact_analyst" value="No" {{$itsr->system_impact_analyst=="No" ? "checked" : ""}} >No
                </div>
            </div>
        </div>   
        
        <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="itsr_file">Choose file</label>
            <div class="custom-file custom-file col-sm-10">
                <input type="file" class="custom-file-input" id="itsr_file" name="itsr_file" value="{{ old('itsr_file') }}" onchange="return fileValidation()"required>
                <label class="custom-file-label" for="itsr_file">Choose file</label>
                <i>File extention must be in .pdf format</i>
            </div>
        
        </div>

        <script>
            $('#itsr_file').on('change',function(){
                var fileName = $(this).val();
                var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
                $(this).next('.custom-file-label').html(cleanFileName);
            })
            function fileValidation() { 
                var fileInput =  
                    document.getElementById('itsr_file'); 
                
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

        <div class="form-group row">
            <button type="submit" class="btn">Submit</button>
        </div>
    </div>
        
    </form>
    <br></div>
        
    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
