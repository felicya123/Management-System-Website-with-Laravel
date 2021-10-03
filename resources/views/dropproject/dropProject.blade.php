@extends('layouts.applayout')
@section('content')



<div class="section-title">
          <h2>Request Drop Project</h2>
</div>
<div class="borderline"> <br>
<div class="">
<div class="row">
    <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ITSR No</th>
            <th scope="col">Project Name</th>
            <th scope="col">Status Project</th>
            <th scope="col">Create Date Time</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsr as $row)
        @if(Auth::user()->user_id == $row->create_by && $row->status_assignment == "Active")
        <form action="{{url('/dropProject-reason/'.$row->itsr_no)}}">
        <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->status_assignment}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Drop
            </button>
            
            
            </td>
            </tr>
        </tbody>
        </form>
        @endif
        @endforeach
        </table>
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
</script>
   