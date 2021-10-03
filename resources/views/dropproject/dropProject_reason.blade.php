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
    <a href="/dropProject" class="closebtn">Back</a>
</div>
<div class="section-title">
          <h2>Drop Project</h2>
</div>


<div class="">
<form action="{{url('/dropProject-reason-store/'.$itsr_no->itsr_no)}}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <div class="col-sm-12" id="border">
        
        @foreach($data as $row)
        <div class="form-group row">
                <div class="col-sm-11"></div>
                <a href="/dropProject" class="closebtn"></a>    
            </div>
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
        @break
        @endforeach
        
        
        
        

        <h3>Drop Project</h3>
       

            <div class="form-group row"  id="assignto_label_approve ">
                <label for="title_itsr"  class="col-sm-2 col-form-label">Assign To</label>
                <div class="col-sm-10">
                    <select name="assign_to" class="form-control" >
                       @foreach($users as $user)
                            @if($user->division == "BO")
                                <option value="{{$user->fullname}}">{{$user->fullname}}</option>
                            @endif
                       @endforeach
                </select>
                </div>
            </div>
            


            
        

        <div class="form-group row">
            <label for="comment_itsr" class="col-sm-2 col-form-label">Reason</label>
            <div class="col-sm-10">
                <textarea  name="comment_itsr" class="form-control" placeholder="" required ></textarea>
            </div>
        </div>
    
        <div>
            <button type="submit" class="btn"><a href=""></a>
            Submit</button>
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

function approvereject() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
        document.getElementById('assignto_label_approve').style.visibility= 'visible';
        document.getElementById('assignto_label_reject').style.visibility= 'hidden';
        document.getElementById('assignto_approve').style.visibility = 'visible';
        document.getElementById('assignto_approve').disabled= false;
        document.getElementById('assignto_reject').style.visibility = 'hidden';
        document.getElementById('assignto_reject').disabled= true;
        
    }
    else {
        document.getElementById('ifYes').style.visibility = 'hidden';
        document.getElementById('ifYes').disabled = true;
        document.getElementById('assignto_approve').style.visibility = 'hidden';
        document.getElementById('assignto_approve').disabled = true;
        document.getElementById('assignto_approve').disabled= true;
        document.getElementById('assignto_label_reject').style.visibility= 'visible';
        document.getElementById('assignto_label_approve').style.visibility= 'hidden';
        document.getElementById('assignto_reject').style.visibility = 'visible';
        document.getElementById('assignto_reject').disabled= false;
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
   