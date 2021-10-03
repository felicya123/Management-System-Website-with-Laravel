@extends('layouts.applayout')
@section('content')
<div class="section-title">
          <h2>Search Project</h2>
</div>

<div class="body"> <br>

<div class="" style="min-width:100%">
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, '1')">All Projects</button>
  <button class="tablinks" onclick="openCity(event, '2')">Active Projects</button>
  <button class="tablinks" onclick="openCity(event, '3')">Closed Projects</button>
</div>

 
<div id="1" class="tabcontent" style="display:block">
{{$itsr->links("pagination::pagination")}}
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
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsr as $row)
        <tbody>
            
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->status_assignment}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td>
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase1")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 2</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase2")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 3</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase3")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 4</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase4")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 5</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase5")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 6</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase6")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
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
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalall1-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModalall1-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
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
                        <h3>Phase 2</h3>
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
                        <h3>Phase 3</h3>
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
                        <h3>Phase 4</h3>
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
                        <h3>Phase 5</h3>@foreach($imp as $row2)
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
                        <h3>Phase 6</h3>
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
<div style="text-align:center;">   
</div>
</div>


<div id="2" class="tabcontent">
{{$itsrA->links("pagination::pagination")}} 

<!-- Active Project -->
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
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrA as $row)
        <tbody>
        @if ($row->status_assignment == "Active")
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->status_assignment}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td><button type="button" class="btn" data-toggle="modal" data-target="#exampleModal2-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModal2-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase1")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 2</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase2")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 3</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase3")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 4</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase4")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 5</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase5")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 6</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase6")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
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
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalactive1-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModalactive1-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
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
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04" >ITSR Assessment Form</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/work/itsr/itsr-assessment/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @break
                        @endif
                        @endforeach
                        <h3>Phase 2</h3>
                        @foreach($design as $d)
                        @if($d->itsr_no ==$row->itsr_no && $d->fsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/fsd/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->fsd_review_user_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD User Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-user/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->fsd_review_bahead_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">FSD BA Head Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-fsd-bahead/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->tsd_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/tsd/{{$row2->itsr_no}}" target="_blank"><button class="btn"> view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->tsd_review_sa_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD SA Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-sa/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->tsd_review_infra_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Infra Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-infra/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @if($d->itsr_no ==$row->itsr_no && $d->tsd_review_security_file!=null)
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="inputGroupFile04">TSD Security Review File</label>
                            <div class="custom-file custom-file col-sm-10">
                                <a href="/files/review-tsd-security/{{$row2->itsr_no}}" target="_blank"><button class="btn">view</button></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <h3>Phase 3</h3>
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
                        <h3>Phase 4</h3>
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
                        <h3>Phase 5</h3>@foreach($imp as $row2)
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
                        <h3>Phase 6</h3>
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
        @endif
        </tbody>
        @endforeach
        </table>
    </div>
</div> 

</div>

<div id="3" class="tabcontent">
{{$itsrC->links("pagination::pagination")}} 

<!-- Closed Project -->
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
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach($itsrC as $row)
        <tbody>
        @if ($row->status_assignment == "Closed")
            <tr>
            <td>{{$row->itsr_no}}</td>
            <td>{{$row->project_name}}</td>
            <td>{{$row->status_assignment}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->create_by}}</td>
            <td><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalcl-{{$row->itsr_no}}">View Status</button>
            
            <div class="modal fade" id="exampleModalcl-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase1")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 2</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase2")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 3</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase3")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 4</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase4")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 5</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase5")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        </table>

                        <h3>Phase 6</h3>
                        <table class="table">
                            <thead>
                            <tr>
                            <td scope="col"><b>ITSR No</b></td>
                            <td scope="col"><b>Operator Name</b></td>
                            <td scope="col"><b>Status ITSR</b></td>
                            <td scope="col"><b>Comment</b></td>                                
                            <td scope="col"><b>Created At</b></td>                             
                            </tr>
                            </thead>
                            @foreach($itsrd as $row2)
                                @if($row2->itsr_no ==$row->itsr_no && $row2->stage == "Phase6")
                                <tbody>
                                    <tr>
                                        <td>{{$row2->itsr_no}}</td>
                                        <td>{{$row2->operator_name}}</td>
                                        <td>{{$row2->status_itsr}}</td>
                                        <td>{{$row2->comment_itsr}}</td>
                                        <td>{{$row2->created_at}}</td>
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
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalclosed1-{{$row->itsr_no}}">View Attachment</button>
            
            <div class="modal fade" id="exampleModalclosed1-{{$row->itsr_no}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">History Attachments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h3>Phase 1</h3>
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
                        <h3>Phase 2</h3>
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
                        <h3>Phase 3</h3>
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
                        <h3>Phase 4</h3>
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
                                <a href="/files/uat-report/{{$row2->itsr_no}}" target="_blank" class="btn"><button>view</button></a>
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
                        <h3>Phase 5</h3>@foreach($imp as $row2)
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
                        <h3>Phase 6</h3>
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
        @endif
        </tbody>
        @endforeach
        </table>
    </div>
</div> 
</div>
<br>
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

$('pagination_c').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.get(url, function (data) {
        $('html').html(data.replace(/<html>(.*)<\/html>/, "$1"));
    });
//     var i, tabcontent, tablinks;
//   tabcontent = document.getElementsByClassName("tabcontent");
//   for (i = 0; i < tabcontent.length; i++) {
//     tabcontent[i].style.display = "none";
//   }
//   tablinks = document.getElementsByClassName("tablinks");
//   for (i = 0; i < tablinks.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }
});
</script>

   