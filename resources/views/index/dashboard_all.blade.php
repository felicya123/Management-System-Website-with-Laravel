@if(Auth::user()->division=="Admin")
@else
@extends('layouts.applayout')
@section('content')
<div class="section-title">
          <h2>Dashboard</h2>
</div>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if(Auth::user()->division == 'Admin')
@else
<div class="tab">
  <button class="tablinks col-md-2 active" onclick="openCity(event, '1');" >Phase 1</button>
  <button class="tablinks col-md-2" onclick="openCity(event, '2')">Phase 2</button>
  <button class="tablinks col-md-2" onclick="openCity(event, '3')">Phase 3</button>
  <button class="tablinks col-md-2" onclick="openCity(event, '4')">Phase 4</button>
  <button class="tablinks col-md-2" onclick="openCity(event, '5')">Phase 5</button>
  <button class="tablinks col-md-2" onclick="openCity(event, '6')">Phase 6</button>
</div>


<div id="1" class="tabcontent" style="display:block">

{{ $itsrD1->links("pagination::pagination") }}
<h3><b>Phase 1 On Progress</b><h3>
    <div class="col-md-12">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col-md-1">ID</th>
                        <th scope="col-md-1">Project Name</th>
                        <th scope="col-md-1">Development Choice</th>
                        <th scope="col-md-1">Total Mandays</th>
                        <th scope="col-md-3">Status Progression</th>
                        <th scope="col-md-1">Create At</th>
                        <th scope="col-md-1">Create By</th>
                        <th scope="col-md-1">Action</th>
                        <th scope="col-md-2">Action</th>
                    </tr>
                </thead>
                
            @foreach($itsrD1 as $row)
                <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal0-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal0-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <table class="table">
                            
                                <thead>
                                <tr>
                                <td scope="col">ITSR No</td>
                                <td scope="col">Operator Name</td>
                                <td scope="col">Status</td>
                                <td scope="col">Comment</td>                                
                                <td scope="col">Created At</td>                                
                                <td scope="col">Phase</td>                                
                                </tr>
                                </thead>
                                @foreach($itsrd as $row2)
                                    @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase1")
                                    <tbody>
                                        <tr>
                                            <td>{{$row2->itsr_no}}</td>
                                            <td>{{$row2->operator_name}}</td>
                                            <td>{{$row2->status_itsr}}</td>
                                            <td>{{$row2->comment_itsr}}</td>
                                            <td>{{$row2->created_at}}</td>
                                            <td>{{$row2->stage}}</td>
                                        </tr>
                                    </tbody>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal1-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal1-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 1 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($itsrd as $row2)
                        @if($row2->itsr_no ==$row->itsr_no)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @if($row2->itsr_no ==$row->itsr_no && $row->pre_review_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR Pre Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/prereview/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @foreach($assess as $a)
                        @if($a->itsr_no == $row->itsr_no && $a->assessment_file != null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">BA ITSR Assessment File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/assessment/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @foreach($assess as $as)
                        @if($as->itsr_no ==$row->itsr_no && $as->business_pm !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR Assessment Form</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/work/itsr/itsr-assessment/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @break
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>

{{ $itsrD1a->links("pagination::pagination") }}
<h3><b>Phase 1 Completed</b><h3>
<div class="row">
    <div class="col-md-12">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col-md-1">ID</th>
                    <th scope="col-md-1">Project Name</th>
                    <th scope="col-md-1">Development Choice</th>
                    <th scope="col-md-1">Total Mandays</th>
                    <th scope="col-md-3">Status Progression</th>
                    <th scope="col-md-1">Create At</th>
                    <th scope="col-md-1">Create By</th>
                    <th scope="col-md-1">Action</th>
                        <th scope="col-md-2">Action</th>
                </tr>
            </thead>
        @foreach($itsrD1a as $row)
            <tbody>
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal1a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal1a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase1")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal1b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal1b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 1 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($itsrd as $row2)
                        @if($row2->itsr_no ==$row->itsr_no)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @foreach($assess as $as)
                        @if($as->itsr_no ==$row->itsr_no && $as->business_pm !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR Assessment Form</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/work/itsr/itsr-assessment/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if($row2->itsr_no ==$row->itsr_no && $row->pre_review_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">ITSR Pre Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/prereview/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @foreach($assess as $a)
                        @if($a->itsr_no == $row->itsr_no && $a->assessment_file != null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">BA ITSR Assessment File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/assessment/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @break
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>
</div>

<div id="2" class="tabcontent">
{{ $itsrD2->links("pagination::pagination") }}

<h3><b>Phase 2 On Progress</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD2 as $row)
        <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal2a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase2")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal2b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 2 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($design as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/fsd/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_review_user_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD User Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-user/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_review_bahead_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no == $row->itsr_no && $row2->tsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/tsd/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no == $row->itsr_no && $row2->tsd_review_sa_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no == $row->itsr_no && $row2->tsd_review_infra_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Infra Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-infra/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no == $row->itsr_no && $row2->tsd_review_security_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Security Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-security/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif

                        
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>


{{ $itsrD2a->links("pagination::pagination") }}
<h3><b>Phase 2 Completed</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD2a as $row)
      <tbody>
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2c-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal2c-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase2") 
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2d-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal2d-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 2 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($design as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/fsd/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_review_user_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD User Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-user/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->fsd_review_bahead_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->tsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/tsd/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->tsd_review_sa_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->tsd_review_infra_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Infra Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-infra/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->tsd_review_security_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Security Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-security/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div> 
</div>


<div id="3" class="tabcontent">
{{ $itsrD3->links("pagination::pagination") }}
<h3><b>Phase 3 On Progress</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD3 as $row)
            <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal3a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase3")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal3b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 3 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($dev as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->dev_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Development File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/dev/developer/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->dev_file_sa !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Development by SA File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/dev/sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>


{{ $itsrD3a->links("pagination::pagination") }}  
<h3><b>Phase 3 Completed</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD3a as $row)
            <tbody>
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3c-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal3c-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase3")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3d-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal3d-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 3 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($dev as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->dev_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Development File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/dev/developer/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->dev_file_sa !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Development by SA File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/dev/sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>
</div>

<div id="4" class="tabcontent">
{{ $itsrD4->links("pagination::pagination") }}
<h3><b>Phase 4 On Progress</b><h3>
<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD4 as $row)
            <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal4a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal4a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase4" )
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal4b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal4b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 4 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($testing as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_review_sa_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp-review-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_review_bahead_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp-review-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_review_sa_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr-review-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_review_bahead_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr-review-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>
 
 
{{ $itsrD4a->links("pagination::pagination") }}
<h3><b>Phase 4 Completed</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD4a as $row)
           <tbody>
             <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal4c-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal4c-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase4")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal4d-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal4d-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 4 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($testing as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_review_sa_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp-review-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tp_review_bahead_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Plan BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tp-review-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_review_sa_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr-review-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sit_tr_review_bahead_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SIT Test Result BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sit-tr-review-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->sat_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">SAT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/sat-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_tp_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-tp/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_report_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Execution Report File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-report/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->uat_tr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">UAT Test Result File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/uat-tr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>
</div>

<div id="5" class="tabcontent">
{{ $itsrD5->links("pagination::pagination") }}
<h3><b>Phase 5 On Progress</b><h3>

<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD5 as $row)
            <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal5a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase5")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal5b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 5 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($imp as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->memodeploy_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Memo Deploy File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/memodeploy/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->deploydoc_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deployment Docs File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/deploydoc/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->ccr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">CCR File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/ccr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->ccr_information !=null)
                        <div class="form-group row">
                            <label for="request_type" class="col-sm-2 col-form-label" >CCR Information</label>
                            <div class="col-sm-10">
                            <input type="text" name="ccr_information" class="form-control" value="{{$row2->ccr_information}}" readonly>
                            </div>
                        </div> 
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->deploymentplan_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deployment Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/deployplan/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->rollbackplan_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Rollback Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/rollbackplan/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->patscript_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">PAT Script File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/pat/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->golive_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">GoLive/NoGoLive File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/golive/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->rollback_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Rollback Execution by SysAdmin File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/rollback/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>


{{ $itsrD5a->links("pagination::pagination") }}
<h3><b>Phase 5 Completed</b><h3>
<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD5a as $row)
        <tbody>
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5c-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal5c-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase5")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5d-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal5d-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 5 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($imp as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->memodeploy_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Memo Deploy File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/memodeploy/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->deploydoc_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deployment Docs File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/deploydoc/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->ccr_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">CCR File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/ccr/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->ccr_information !=null)
                        <div class="form-group row">
                            <label for="request_type" class="col-sm-2 col-form-label" >CCR Information</label>
                            <div class="col-sm-10">
                            <input type="text" name="ccr_information" class="form-control" value="{{$row2->ccr_information}}" readonly>
                            </div>
                        </div> 
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->deploymentplan_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Deployment Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/deployplan/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->rollbackplan_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Rollback Plan File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/rollbackplan/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->patscript_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">PAT Script File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/pat/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->golive_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">GoLive/NoGoLive File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/golive/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($row2->itsr_no ==$row->itsr_no && $row2->rollback_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">Rollback Execution by SysAdmin File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/rollback/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div>
</div>  

<div id="6" class="tabcontent">
{{ $itsrD6->links("pagination::pagination") }}
<h3><b>Phase 6 On Progress</b><h3>
<div class="row">
    <div class="col-12">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Project Name</th>
            <th scope="col">Development Choice</th>
            <th scope="col">Total Mandays</th>
            <th scope="col">Status Progression</th>
            <th scope="col">Create At</th>
            <th scope="col">Create By</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrD6 as $row)
            <tbody>
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->development_choice}}</td>
            <td>{{$row->total_mandays}}</td>
              @foreach($wb as $w)
                @if($w->itsr_no == $row->itsr_no)
                <td>{{$w->description}}</td>
                @endif
              @endforeach
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal6a-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal6a-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <table class="table">
                        
                            <thead>
                            <tr>
                            <td scope="col">ITSR No</td>
                            <td scope="col">Operator Name</td>
                            <td scope="col">Status</td>
                            <td scope="col">Comment</td>                                
                            <td scope="col">Created At</td>                                
                            <td scope="col">Phase</td>                                
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage=="Phase6")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                        <td>{{$row2->stage}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal6b-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModal6b-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Phase 6 Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        @foreach($post_imp as $row2)
                        @if($row2->itsr_no ==$row->itsr_no && $row2->pir_file !=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">PIR File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/pir/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
</div> 
</div>


@endif
@endsection
@endif
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

var size = [window.width,window.height];  //public variable

$(window).resize(function(){
  window.resizeTo(size[0],size[1]);
});


</script>
   