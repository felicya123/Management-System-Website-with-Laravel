@extends('layouts.applayout')
@section('content')
<div class="row col-sm-2 height20">
    <a href="/dashboard" class="closebtn">Back</a>
</div>
<div class="section-title">
          <h2>ITSR Form</h2>
</div>

<div  id=""class="borderline"> <br>
    <form  method="POST" action="{{route('itsr.store')}}" enctype="multipart/form-data">
    @csrf
    <div id="border">
    <div class="form-group row">
            <label for="itsr_no" class="col-sm-2 col-form-label">ITSR No</label>
            <div class="col-sm-10">
            <input type="text" id="itsr_no" name="itsr_no" class="form-control @error('itsr_no') is-invalid @enderror"  value="{{ old('itsr_no') }}"required  autocomplete="itsr_no" autofocus>
                @error('itsr_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="request_type" class="col-sm-2 col-form-label"> Request Type</label>
            <div class="col-sm-10">
            <select name="request_type" id="" class="form-control" required>
                    <option value="New Project Besar" {{ old('request_type') == 'New Project Besar' ? 'selected' : '' }}>New Project Besar</option>
                    <option value="New Project Kecil" {{ old('request_type') == 'New Project Kecil' ? 'selected' : '' }}>New Project Kecil</option>
                    <option value="Enhancement Besar" {{ old('request_type') == 'Enhancement Besar' ? 'selected' : '' }}>Enhancement Besar</option>
                    <option value="Enhancement Kecil" {{ old('request_type') == 'Enhancement Kecil' ? 'selected' : '' }}>Enhancement Kecil</option>
                </select>
            </div>
        </div>   
            
        <div class="form-group row">
            <label for="regulator_approval" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="regulator_approval" value="Yes" @if(old('regulator_approval')) checked @endif required>Yes
                    <input type="radio" name="regulator_approval" value="No" @if(old('regulator_approval')) checked @endif>No
                </div>
                
            </div>
        </div>             
            
        <div class="form-group row">
            <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
            <div class="col-sm-10">
                <input type="text" name="project_name" class="form-control" value="{{ old('project_name') }}"required>
            </div>
        </div>

        <div class="form-group row">
            <label for="product_or_service_name" class="col-sm-2 col-form-label">Product or Service Name</label>
            <div class="col-sm-10">
                <input type="text" name="product_or_service_name" class="form-control" value="{{ old('product_or_service_name') }}"required>
            </div>
        </div>   
        
        <div class="form-group row">
            <label for="application_name" class="col-sm-2 col-form-label">Application Name</label>
            <div class="col-sm-10">
                <input type="text" name="application_name" class="form-control" value="{{ old('application_name') }}"required>
            </div>
        </div>

        <div class="form-group row">
            <label for="application_impacted" class="col-sm-2 col-form-label">Application Impacted</label>
            <div class="col-sm-10">
                <input type="text" name="application_impacted" class="form-control" value="{{ old('application_impacted') }}" required>
            </div>
        </div>
           
        <div class="form-group row">
            <label for="business_impact_benefit" class="col-sm-2 col-form-label">Regulator Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Regulator Requirement" @if(old('business_impact_benefit')) checked @endif required>Regulator Requirement
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Revenue Generation" @if(old('business_impact_benefit')) checked @endif>Revenue Generation
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_impact_benefit" value="Eficiency/Improvement" @if(old('business_impact_benefit')) checked @endif>Eficiency/Improvement
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_budget" class="col-sm-2 col-form-label">Business Budget</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="less than USD 50K" @if(old('business_budget')) checked @endif required>less than USD 50K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="USD 50-100K" @if(old('business_budget')) checked @endif>USD 50-100K
                </div>
                <div class="col-sm">
                    <input type="radio" name="business_budget" value="more than USD 100K" @if(old('business_budget')) checked @endif>more than USD 100K
                </div>
            </div>
        </div>     
        
        <div class="form-group row">
            <label for="total_mandays" class="col-sm-2 col-form-label">Total Mandays</label>
            <div class="col-sm-9">
                <input type="number" name="total_mandays" class="form-control"  min = "1" value="{{ old('total_mandays') }}"required>
            </div>
            <div class="col-sm-1">
                <label for="">Days</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="development_choice" class="col-sm-2 col-form-label">Development choice</label>
            <div class="col-sm-10">
            <div class="col-sm">
                    <input type="radio" name="development_choice" value="Internal IT Developer" @if(old('development_choice')) checked @endif required>Internal IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice" value="External IT Developer"  @if(old('development_choice')) checked @endif>External IT Developer
                </div>
                <div class="col-sm">
                    <input type="radio" name="development_choice" value="Third Party (Vendor)"  @if(old('development_choice')) checked @endif>Third Party (Vendor)
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="business_goals" class="col-sm-2 col-form-label">Business Goals and Objective</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "business_goals" value="" required>{{ old('business_goals') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="scope" class="col-sm-2 col-form-label">Scope of Work</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "scope"  value="" required>{{ old('scope') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="requirements" class="col-sm-2 col-form-label">Requirements / Functionalities</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "requirements" value="" required>{{ old('requirements') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="benefit_to_bank" class="col-sm-2 col-form-label">Benefit to the Bank</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "benefit_to_bank" value="" required>{{ old('benefit_to_bank') }}</textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="system_impact_analyst" class="col-sm-2 col-form-label">System Impact Analysis (on critical process)</label>
            <div class="col-sm-10">
                <div class="col-sm-2">
                    <input type="radio" name="system_impact_analyst" value="Yes" @if(old('development_choice')) checked @endif required>Yes
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="system_impact_analyst" value="No" @if(old('development_choice')) checked @endif>No
                </div>
            </div>
        </div>  

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="itsr_file">Choose file</label>
            <div class="custom-file custom-file col-sm-10" >
                <input type="file" class="custom-file-input" id="itsr_file" name="itsr_file"  onchange="return fileValidation()"required>
                <label class="custom-file-label" for="filename">Choose file</label>
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
        <div>
            <button type="submit" class="btn">Submit</button>
        </div>
    </div>
    </div>
        
    </form>
        
  
    @endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

