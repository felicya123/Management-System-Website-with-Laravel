@extends('layouts.applayout')

@section('content')
<div class="section-title">
          <h2>My Work</h2>
</div>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<div class="borderline"> <br>

<div class="">
    <div class="row">
        <div class="col-12">
             <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">ITSR No</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Create At</th>
                </tr>
            </thead>    
            @if(Auth::user()->division == 'IT_AppsManager')
            @foreach($wb as $am)
            <tbody>  
                <tr> 
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $am->itsr_no)
                            @if(Auth::user()->fullname == $am->assign_to && $am->description == "Waiting for Assessment to be reviewed by IT Apps Manager")
                                <td><a href="{{action('req_gatheringController@am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to &&$am->description == "Waiting for FSD to be approved by IT Apps Manager")
                                <td><a href="{{action('designController@approveFSD_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to &&$am->description == "Waiting for TSD to be approved by IT Apps Manager")
                                <td><a href="{{action('designController@approveTSD_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to &&$am->description == "Waiting for Development to be approved by IT Apps Manager")
                                <td><a href="{{action('developmentController@approveDev',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to && $am->description == "Waiting for SIT Test Plan to be approved by IT Apps Manager")
                                <td><a href="{{action('testingController@approveSIT_tp_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to && $am->description == "Waiting for SIT Test Result to be approved by IT Apps Manager")
                                <td><a href="{{action('testingController@approveSIT_tr_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to && $am->description == "Waiting for Deployment Doc to be viewed by IT Apps Manager")
                                <td><a href="{{action('implementationController@view_deploydoc_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $am->assign_to && $am->description == "Waiting for PIR Document to be approved by IT Apps Manager")
                                <td><a href="{{action('postimplementationController@approve_pir_am',$am['itsr_no'])}}">{{$am->itsr_no}}</a></td>
                                <td>{{$am->description}}</td>
                                <td>{{$am->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_BAHead')
            @foreach($wb as $row)
            <tbody>
                <tr>
                @if(Auth::user()->fullname == $row->assign_to && $row->description == "Waiting IT BA Assessment to be approved by IT BA Head")
                    <td><a href="{{action('req_gatheringController@approval_bahead',$row['itsr_no'])}}">{{$row->itsr_no}}</a>  </td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->created_at}}</td>
                
                @elseif(Auth::user()->fullname == $row->assign_to && $row->description == "Waiting for FSD to be reviewed by IT BA Head")
                    <td><a href="{{action('designController@reviewFSD_bahead',$row['itsr_no'])}}">{{$row->itsr_no}}</a></td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->created_at}}</td>
                    @break  
                @elseif(Auth::user()->fullname == $row->assign_to && $row->description == "Waiting for SIT Test Plan to be reviewed by IT BA Head")
                    <td><a href="{{action('testingController@reviewSIT_tp_bahead',$row['itsr_no'])}}">{{$row->itsr_no}}</a></td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->created_at}}</td>
                    
                @elseif(Auth::user()->fullname == $row->assign_to && $row->description == "Waiting for SIT Test Result to be reviewed by IT BA Head")
                    <td><a href="{{action('testingController@reviewSIT_tr_bahead',$row['itsr_no'])}}">{{$row->itsr_no}}</a></td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->created_at}}</td> 
                    
                @endif
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_BA')
            @foreach($wb as $ba)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $ba->itsr_no)
                            @if(Auth::user()->fullname==$ba->assign_to && $ba->description == "Waiting for ITSR Assessment to be uploaded by IT BA")
                                <td><a href="{{action('req_gatheringController@createAssessment',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to && $ba->description == "Waiting for Assessment to be revised by IT BA")
                                <td> <a href="{{action('req_gatheringController@editAssessment',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to &&$ba->description == "Waiting for pre-review to be uploaded by IT BA")
                                <td> <a href="{{action('req_gatheringController@createPrereview',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break 
                            @elseif($ba->description == "Waiting ITSR to be reviewed by IT BA")
                                <td> <a href="{{action('req_gatheringController@reviewRequest',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to &&$ba->description == "Waiting for FSD to be submitted by IT BA")
                                <td> <a href="{{action('designController@createFSD',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to &&$ba->description == "Waiting for FSD to be revised by IT BA")
                                <td> <a href="{{action('designController@createFSD',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to && ($ba->description == "Waiting for SIT Test Plan to be submitted by IT BA" || $ba->description == "Waiting for SIT Test Plan to be revised by IT BA"))
                                <td>  <a href="{{action('testingController@create_sit_tp',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to &&$ba->description == "Waiting for SIT Execution Status to be updated by IT BA")
                                <td>  <a href="{{action('testingController@update_sit',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname==$ba->assign_to &&($ba->description == "Waiting for SIT Test Result to be submitted by IT BA" || $ba->description == "Waiting for SIT Test Result to be revised by IT BA"))
                                <td>  <a href="{{action('testingController@create_sit_tr',$ba['itsr_no'])}}">{{$ba->itsr_no}}</a></td>
                                <td>{{$ba->description}}</td>
                                <td>{{$ba->created_at}}</td>
                            @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'BO')
            @foreach($wb as $bo)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $bo->itsr_no)
                            @if(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for FSD to be approved by Business Owner")
                                <td><a href="{{action('designController@approveFSD_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for UAT Test Plan to be approved by Business Owner")
                                <td><a href="{{action('testingController@approveUAT_tp_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for UAT Test Result to be approved by Business Owner")
                                <td><a href="{{action('testingController@approveUAT_tr_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for Memo Deploy to be approved by Business Owner")
                                <td><a href="{{action('implementationController@approveMemodeploy_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for PAT to be approve by Business Owner")
                                <td><a href="{{action('implementationController@approvePat_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for No Go-Live to be upload by Business Owner")
                                <td><a href="{{action('implementationController@upload_no_golive',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for Go-Live to be upload by Business Owner")
                                <td><a href="{{action('implementationController@upload_golive',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for PIR Document to be approved by Business Owner")
                                <td><a href="{{action('postimplementationController@approve_pir_bo',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                
                                @break
                            @elseif(Auth::user()->fullname == $bo->assign_to && $bo->description == "Waiting for Project to be reviewed by Business Owner")
                                <td><a href="{{action('req_gatheringController@approve_dropProject',$bo['itsr_no'])}}">{{$bo->itsr_no}}</a></td>
                                <td>{{$bo->description}}</td>
                                <td>{{$bo->created_at}}</td>
                                
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_Developer')
            @foreach($wb as $dev)
            <tbody>  
                <tr>
                     @if(Auth::user()->fullname == $dev->assign_to && $dev->description == "Waiting for TSD to be created by IT Developer")
                        <td><a href="{{action('designController@createTSD',$dev['itsr_no'])}}">{{$dev->itsr_no}}</a></td>
                        <td>{{$dev->description}}</td>
                        <td>{{$dev->created_at}}</td>
                    @elseif(Auth::user()->fullname == $dev->assign_to && $dev->description == "Waiting for Development Progress to be submitted by IT Developer")
                        <td><a href="{{action('developmentController@createDev',$dev['itsr_no'])}}">{{$dev->itsr_no}}</a></td>
                        <td>{{$dev->description}}</td>
                        <td>{{$dev->created_at}}</td>
                    @elseif(Auth::user()->fullname == $dev->assign_to && ($dev->description == "Waiting for Development Execution to be updated by IT Developer" || $dev->description == "Waiting for Development to be revised by IT Developer"))
                        <td><a href="{{action('developmentController@createDev',$dev['itsr_no'])}}">{{$dev->itsr_no}}</a></td>
                        <td>{{$dev->description}}</td>
                        <td>{{$dev->created_at}}</td>
                     @elseif(Auth::user()->fullname == $dev->assign_to && $dev->description == "Waiting for CCR, Deploy Plan and Rollback Plan to be upload by IT Developer")
                        <td><a href="{{action('implementationController@create_ccr_dev',$dev['itsr_no'])}}">{{$dev->itsr_no}}</a></td>
                        <td>{{$dev->description}}</td>
                        <td>{{$dev->created_at}}</td>
                    @else($dev->description == "Waiting for TSD to be revised by IT Developer")
                        <td><a href="{{action('designController@createTSD',$dev['itsr_no'])}}">{{$dev->itsr_no}}</a></td>
                        <td>{{$dev->description}}</td>
                        <td>{{$dev->created_at}}</td>
                    @endif
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division=='IT_Infra')
            @foreach($wb as $infra)
            <tbody>  
                <tr>
                
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $infra->itsr_no)
                            @if(Auth::user()->fullname == $infra->assign_to &&$infra->description == "Waiting for TSD to be reviewed by IT Infra")
                                <td><a href="{{action('designController@reviewTSD_infra',$infra['itsr_no'])}}">{{$infra->itsr_no}}</a></td>
                                <td>{{$infra->description}}</td>
                                <td>{{$infra->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division=='IT_Owner')
            @foreach($wb as $owner)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $owner->itsr_no)
                            @if(Auth::user()->fullname == $owner->assign_to && $owner->description == "Waiting for FSD to be approved by IT Owner")
                                <td><a href="{{action('designController@approveFSD_owner',$owner['itsr_no'])}}">{{$owner->itsr_no}}</a></td>
                                <td>{{$owner->description}}</td>
                                <td>{{$owner->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $owner->assign_to && $owner->description == "Waiting for TSD to be approved by IT Owner")
                                <td><a href="{{action('designController@approveTSD_IT_Owner',$owner['itsr_no'])}}">{{$owner->itsr_no}}</a></td>
                                <td>{{$owner->description}}</td>
                                <td>{{$owner->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $owner->assign_to && $owner->description == "Waiting for SIT Test Plan to be approved by IT Owner")
                                <td><a href="{{action('testingController@approveSIT_tp_owner',$owner['itsr_no'])}}">{{$owner->itsr_no}}</a></td>
                                <td>{{$owner->description}}</td>
                                <td>{{$owner->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $owner->assign_to && $owner->description == "Waiting for SIT Test Result to be approved by IT Owner")
                                <td><a href="{{action('testingController@approveSIT_tr_owner',$owner['itsr_no'])}}">{{$owner->itsr_no}}</a></td>
                                <td>{{$owner->description}}</td>
                                <td>{{$owner->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $owner->assign_to && $owner->description == "Waiting for PIR Document to be approved by IT Owner")
                                <td><a href="{{action('postimplementationController@approve_pir_owner',$owner['itsr_no'])}}">{{$owner->itsr_no}}</a></td>
                                <td>{{$owner->description}}</td>
                                <td>{{$owner->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_PMO')
            @foreach($wb as $pmo)
            <tbody>  
                <tr>
                
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $pmo->itsr_no)
                            @if(Auth::user()->fullname == $pmo->assign_to && $pmo->description == "Waiting for Assessment to be reviewed by IT PMO")
                                <td><a href="{{action('req_gatheringController@pmo',$pmo['itsr_no'])}}">{{$pmo->itsr_no}}</a></td>
                                <td>{{$pmo->description}}</td>
                                <td>{{$pmo->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $pmo->assign_to && $pmo->description == "Waiting for Deployment Doc to be verification by IT PMO")
                                <td><a href="{{action('implementationController@verif_deploydoc',$pmo['itsr_no'])}}">{{$pmo->itsr_no}}</a></td>
                                <td>{{$pmo->description}}</td>
                                <td>{{$pmo->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_SA')
            @foreach($wb as $sa)
            <tbody>
                <tr>
                @foreach($itsrd as $row)
                        @if($row->itsr_no == $sa->itsr_no)
                            @if(Auth::user()->fullname == $sa->assign_to && $sa->description == "Waiting for Assessment to be reviewed by IT SA(Impacted)")
                                @foreach($assess as $a)
                                    @if($a->itsr_no == $sa->itsr_no && (Auth::user()->fullname == $a->pic_impacted_app1 || Auth::user()->fullname == $a->pic_impacted_app2 ||Auth::user()->fullname == $a->pic_impacted_app3 ))
                                            <td><a href="{{action('req_gatheringController@sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                            <td>{{$sa->description}}</td>
                                            <td>{{$sa->created_at}}</td>
                                    @endif
                                @endforeach
                            @break
                            @elseif(Auth::user()->fullname == $sa->assign_to && $sa->description == "Waiting for TSD to be reviewed by Impacted IT SA" )
                                @foreach($assess as $a)
                                    @if($a->itsr_no == $sa->itsr_no && (Auth::user()->fullname == $a->pic_impacted_app1 || Auth::user()->fullname == $a->pic_impacted_app2 ||Auth::user()->fullname == $a->pic_impacted_app3 ))
                                        <td><a href="{{action('designController@reviewTSD_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                        <td>{{$sa->description}}</td>
                                        <td>{{$sa->created_at}}</td>
                                    @endif
                                @endforeach
                                @break
                            @elseif($sa->description == "Waiting for TSD to be reviewed by IT_SA")
                                    <td><a href="{{action('designController@reviewTSD_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                    <td>{{$sa->description}}</td>
                                    <td>{{$sa->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sa->assign_to && $sa->description == "Waiting for Assessment to be reviewed by IT_SA")
                                    <td><a href="{{action('req_gatheringController@sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                    <td>{{$sa->description}}</td>
                                    <td>{{$sa->created_at}}</td>
                                @break
                            @elseif($sa->description == "Waiting for Development to be updated by IT SA")
                                    <td><a href="{{action('developmentController@updateDev_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                    <td>{{$sa->description}}</td>
                                    <td>{{$sa->created_at}}</td>
                                @break
                            @elseif($sa->description == "Waiting for Development to be submitted by IT SA")
                                    <td><a href="{{action('developmentController@submitDev_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                    <td>{{$sa->description}}</td>
                                    <td>{{$sa->created_at}}</td>
                                @break
                           
                           @elseif(Auth::user()->fullname == $sa->assign_to && $sa->description == "Waiting for SIT Test Plan to be reviewed by IT SA")
                                   <td><a href="{{action('testingController@reviewSIT_tp_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                   <td>{{$sa->description}}</td>
                                   <td>{{$sa->created_at}}</td>
                            @break
                           @elseif(Auth::user()->fullname == $sa->assign_to && $sa->description == "Waiting for SIT Test Result to be reviewed by IT SA")
                                   <td><a href="{{action('testingController@reviewSIT_tr_sa',$sa['itsr_no'])}}">{{$sa->itsr_no}}</a></td>
                                   <td>{{$sa->description}}</td>
                                   <td>{{$sa->created_at}}</td> 
                            @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'IT_SecurityHead')
            @foreach($wb as $sechead)
            <tbody>  
                <tr>
                
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $sechead->itsr_no)
                            @if(Auth::user()->fullname == $sechead->assign_to && $sechead->description == "Waiting for SAT Test Plan to be approved by IT Security Head")
                                <td><a href="{{action('testingController@approveSAT_tp_securityhead',$sechead['itsr_no'])}}">{{$sechead->itsr_no}}</a></td>
                                <td>{{$sechead->description}}</td>
                                <td>{{$sechead->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sechead->assign_to && $sechead->description == "Waiting for SAT Test Result to be approved by IT Security Head")
                                <td><a href="{{action('testingController@approveSAT_tr_securityhead',$sechead['itsr_no'])}}">{{$sechead->itsr_no}}</a></td>
                                <td>{{$sechead->description}}</td>
                                <td>{{$sechead->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division=='IT_Security')
            @foreach($wb as $sec)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $sec->itsr_no)
                            @if(Auth::user()->fullname == $sec->assign_to && $sec->description == "Waiting for Assessment to be reviewed by IT Security")
                            <td><a href="{{action('req_gatheringController@security',$sec['itsr_no'])}}">{{$sec->itsr_no}}</a></td>
                                <td>{{$sec->description}}</td>
                                <td>{{$sec->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sec->assign_to &&$sec->description == "Waiting for TSD to be reviewed by IT Security")
                            <td><a href="{{action('designController@reviewTSD_security',$sec['itsr_no'])}}">{{$sec->itsr_no}}</a></td>
                                <td>{{$sec->description}}</td>
                                <td>{{$sec->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sec->assign_to && ($sec->description == "Waiting for SAT Test Plan to be submitted by IT Security" || $sec->description == "Waiting for SAT Test Plan to be revised by IT Security"))
                            <td><a href="{{action('testingController@create_sat_tp',$sec['itsr_no'])}}">{{$sec->itsr_no}}</a></td>
                                <td>{{$sec->description}}</td>
                                <td>{{$sec->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sec->assign_to && $sec->description == "Waiting for SAT Execution Status to be updated by IT Security")
                            <td><a href="{{action('testingController@update_sat',$sec['itsr_no'])}}">{{$sec->itsr_no}}</a></td>
                                <td>{{$sec->description}}</td>
                                <td>{{$sec->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $sec->assign_to && ($sec->description == "Waiting for SAT Test Result to be submitted by IT Security" || $sec->description == "Waiting for SAT Test Result to be revised by IT Security"))
                            <td><a href="{{action('testingController@create_sat_tr',$sec['itsr_no'])}}">{{$sec->itsr_no}}</a></td>
                                <td>{{$sec->description}}</td>
                                <td>{{$sec->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'SKK')
            @foreach($wb as $skk)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $skk->itsr_no)
                            @if(Auth::user()->fullname == $skk->assign_to && $skk->description == "Waiting for Assessment to be reviewed by SKK")
                                <td><a href="{{action('req_gatheringController@skk',$skk['itsr_no'])}}">{{$skk->itsr_no}}</a></td>
                                <td>{{$skk->description}}</td>
                                <td>{{$skk->created_at}}</td>
                                @break
                                @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division == 'SKMR')
                @foreach($wb as $skmr)
                <tbody>  
                    <tr>
                        @foreach($itsrd as $row)
                            @if($row->itsr_no == $skmr->itsr_no)
                                @if(Auth::user()->fullname == $skmr->assign_to && $skmr->description == "Waiting for Assessment to be reviewed by SKMR")
                                    <td><a href="{{action('req_gatheringController@skmr',$skmr['itsr_no'])}}">{{$skmr->itsr_no}}</a></td>
                                    <td>{{$skmr->description}}</td>
                                    <td>{{$skmr->created_at}}</td>
                                    @break
                                    @endif
                            @endif 
                        @endforeach
                    </tr>
                </tbody>
                @endforeach
            @endif

            @if(Auth::user()->division == 'Sysadmin')
            @foreach($wb as $admin)
            <tbody>  
                <tr>
                    @foreach($itsrd as $row)
                        @if($row->itsr_no == $admin->itsr_no)
                            @if(Auth::user()->fullname == $admin->assign_to && $admin->description == "Waiting for CCR, Deploy Plan and Rollback to be viewed by Sysadmin")
                                <td><a href="{{action('implementationController@view_ccr_sysadmin',$admin['itsr_no'])}}">{{$admin->itsr_no}}</a></td>
                                <td>{{$admin->description}}</td>
                                <td>{{$admin->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $admin->assign_to && $admin->description == "Waiting for Deployment Status to be updated by Sysadmin")
                                <td><a href="{{action('implementationController@update_deploy_sysadmin',$admin['itsr_no'])}}">{{$admin->itsr_no}}</a></td>
                                <td>{{$admin->description}}</td>
                                <td>{{$admin->created_at}}</td>
                                @break
                            @elseif(Auth::user()->fullname == $admin->assign_to && $admin->description == "Waiting for Rollback PAT Doc to be upload by Sysadmin")
                                <td><a href="{{action('implementationController@upload_rollback',$admin['itsr_no'])}}">{{$admin->itsr_no}}</a></td>
                                <td>{{$admin->description}}</td>
                                <td>{{$admin->created_at}}</td>
                                @break
                            @endif
                        @endif 
                    @endforeach
                </tr>
            </tbody>
            @endforeach
            @endif

            @if(Auth::user()->division=='User')
            @foreach($wb as $userwb)
            <tbody>  
                <tr>
                @foreach($itsrd as $row)
                     @if($row->itsr_no == $userwb->itsr_no)
                        @if(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for ITSR to be revised by User")
                            <td><a href="{{action('req_gatheringController@editITSR',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a> </td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for Pre-Review to be submitted by User")
                            <td><a href="{{action('req_gatheringController@reviewPrereview',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                            @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for Assessment to be reviewed by User")
                            <td><a href="{{action('req_gatheringController@user',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for FSD to be reviewed by User")
                            <td><a href="{{action('designController@reviewFSD_user',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>  
                            @break  
                        @elseif(Auth::user()->fullname == $userwb->assign_to && ($userwb->description == "Waiting for UAT Test Plan to be submitted by User" || $userwb->description == "Waiting for UAT Test Plan to be revised by User"))
                            <td><a href="{{action('testingController@create_uat_tp',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>  
                            @break 
                        @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for UAT Execution Status to be updated by User")
                            <td><a href="{{action('testingController@update_uat',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td> 
                            @break  
                        @elseif(Auth::user()->fullname == $userwb->assign_to && ($userwb->description == "Waiting for UAT Test Result to be submitted by User" || $userwb->description == "Waiting for UAT Test Result to be revised by User"))
                            <td><a href="{{action('testingController@create_uat_tr',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && ($userwb->description == "Waiting for Memo Deploy to be submitted by User" || $userwb->description == "Waiting for Memo Deploy to be revised by User"))
                            <td><a href="{{action('implementationController@create_memodeploy',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for Deploy Doc to be created by User")
                            <td><a href="{{action('implementationController@create_deploydoc',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for PAT Script to be upload by User")
                            <td><a href="{{action('implementationController@create_pat',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && $userwb->description == "Waiting for PAT Status to be updated by User")
                            <td><a href="{{action('implementationController@update_pat_status',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td> 
                            @break
                        @elseif(Auth::user()->fullname == $userwb->assign_to && ($userwb->description == "Waiting for PIR Doc to be upload by User" || $userwb->description == "Waiting for PIR Document to be revised by User"))
                            <td><a href="{{action('postimplementationController@create_pir',$userwb['itsr_no'])}}">{{$userwb->itsr_no}}</a></td>
                            <td>{{$userwb->description}}</td>
                            <td>{{$userwb->created_at}}</td>  
                            @break                   
                        @endif  
                    @endif
                @endforeach  
                </tr>
            </tbody>
            @endforeach
            @endif
            </table>
        </div>
    </div>
</div>
<br></div>
@endsection