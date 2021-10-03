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
          <h2>Drop Project Approval Form</h2>
</div>
<div class="borderline">

<div class="col-sm-12">
<form action="{{url('/dropProject-approve-store/'.$itsr_no->itsr_no)}}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <div id="border">
    <div class="">
        
        @foreach($data as $row)
        
        <h3>ITSR Information</h3>
            <div class="form-group row">
                <label for="itsr_no" class="col-sm-2 col-form-label">ITSR No</label>
                <div class="col-sm-10">
                   <input type="text" name="itsr_no" class="form-control" value="{{$row->itsr_no}}" style="pointer-events:none" >
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

        <h3>Last Assignment</h3>
        <div class="form-group row">
            <label for="requestor_id" class="col-sm-2 col-form-label">Stage</label>
            <div class="col-sm-10">
                <input type="text" name="stage_temp" class="form-control" placeholder="" value="{{$row->stage}}"  style="pointer-events:none" readonly >
            </div>
        </div>

        <div class="form-group row">
            <label for="requestor_id" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" name="description_temp" class="form-control" placeholder="" value="{{$row->description_temp}}"  style="pointer-events:none" readonly >
            </div>
        </div>

        <div class="form-group row">
            <label for="requestor_id" class="col-sm-2 col-form-label">Assign to</label>
            <div class="col-sm-10">
                <input type="text" name="assign_to_temp" class="form-control" placeholder="" value="{{$row->assign_to_temp}}"  style="pointer-events:none"readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="requestor_id" class="col-sm-2 col-form-label">Division</label>
            <div class="col-sm-10">
                <input type="text" name="division_temp" class="form-control" placeholder="" value="{{$row->division_temp}}"  style="pointer-events:none" readonly>
            </div>
        </div>
        @break
        @endforeach
        

        
        
        
        

        <h3>Approval Drop Project</h3>
       

           
            


            
        
        <div class="form-group row">
            <label for="status_itsr_ba" class="col-sm-2 col-form-label">Status Approval</label>
            <div class="col-sm-10">
                <div class="col-sm">
                    <div class="btn-group">
                        <input type="radio" name="status_itsr" value="Dropped" id="yesCheck"required>Approve
                        <input type="radio" name="status_itsr" value="Cancel Drop" id="noCheck"required>Reject
                    </div>                    
                </div>
            </div>
        </div>   

            <div class="form-group row">
            <label for="comment_itsr" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
                <textarea  name="comment_itsr" class="form-control" placeholder=""></textarea>
            </div>
        </div>
    
        <div>
            <button type="submit" class="btn"><a href=""></a>
            Submit</button>
        </div>

        
        
    </div>
</div>
    
</div>
</div>
</form>

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
   