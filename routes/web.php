<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/work/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/itsr/approval-ba/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/itsr-revise/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/itsr/create-pre-reviews/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/itsr/review-pre-review/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/itsr/create-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bahead/itsr/approval-bahead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/itsr/rev-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/itsr/sa-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/dropProject-reason/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/dropProject-approve/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-security/itsr/security-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-skmr/itsr/skmr-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-skk/itsr/skk-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/itsr/am-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-pmo/itsr/pmo-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/itsr/user-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-developer/dev/create-dev/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/dev/update-dev-sa/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/dev/submit-dev-sa/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/dev/approve-dev-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/testing/create-sit-tp/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/testing/create-sit-tr/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/testing/review-sit-tp-sa/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/testing/review-sit-tr-sa/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bahead/testing/review-sit-tp-bahead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bahead/testing/review-sit-tr-bahead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/testing/approve-sit-tp-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/testing/approve-sit-tr-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-owner/testing/approve-sit-tp-owner/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-owner/testing/approve-sit-tr-owner/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/testing/update-sit/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-security/testing/create-sat-tp/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-security/testing/create-sat-tr/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-securityhead/testing/approve-sat-tp-securityhead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-securityhead/testing/approve-sat-tr-securityhead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-security/testing/update-sat/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/testing/create-uat-tp/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/testing/create-uat-tr/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/testing/approve-uat-tp-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/testing/approve-uat-tr-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/testing/update-uat/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/implementation/create-memodeploy/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/implementation/approve-memodeploy-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/implementation/create-deploydoc/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-pmo/implementation/verif-deploydoc-pmo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/itsr/assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/implementation/view-deploy-doc-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-developer/implementation/create-ccr/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sysadmin/implementation/view-ccr/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sysadmin/implementation/update-deployment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/implementation/create-pat/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/implementation/update-pat-status/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/implementation/approve-pat-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/implementation/upload-no-golive/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/implementation/upload-golive/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sysadmin/implementation/upload-rollback/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/postimplementation/create-pir/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/postimplementation/approve-pir-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/postimplementation/approve-pir-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-owner/postimplementation/approve-pir-owner/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-ba/design/create-fsd/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-user/design/review-fsd-user/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bahead/design/review-fsd-bahead/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-bo/design/approve-fsd-bo/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/design/approve-fsd-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-owner/design/approve-fsd-owner/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-developer/design/create-tsd/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-sa/design/review-tsd-sa/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-developer/design/revised-tsd/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-security/design/review-tsd-security/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-infra/design/review-tsd-infra/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-am/design/approve-tsd-am/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work-owner/design/approve-tsd-owner/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});
Route::get('/work/itsr/itsr-assessment/assets/img/pp.png', function(){
    return redirect('/assets/img/pp.png');
});

//mywork
Route::get('/work/{division}','req_gatheringController@indexAll')->name('index');

//email
Route::get('/email',function(){
    Mail::to('developer@mail.com')->send(new NotificationMail());
    return new NotificationMail();
});

//Requirement Gathering
Route::get('/files/{itsr_no}','req_gatheringController@show_itsr_file');
Route::get('/files/prereview/{itsr_no}','req_gatheringController@show_prereview_file');
Route::get('/files/assessment/{itsr_no}','req_gatheringController@show_assessment_file');

//FSD
Route::get('/files/fsd/{itsr_no}','designController@show_file_fsd');
Route::get('/files/review-fsd-user/{itsr_no}','designController@show_file_review_fsd_user');
Route::get('/files/review-fsd-bahead/{itsr_no}','designController@show_file_review_fsd_bahead');


//TSD
Route::get('/files/tsd/{itsr_no}','designController@show_file_tsd');
Route::get('/files/review-tsd-sa/{itsr_no}','designController@show_file_review_tsd_sa');
Route::get('/files/review-tsd-infra/{itsr_no}','designController@show_file_review_tsd_infra');
Route::get('/files/review-tsd-security/{itsr_no}','designController@show_file_review_tsd_security');

//Dev
Route::get('/files/dev/developer/{itsr_no}','developmentController@show_file_dev');
Route::get('/files/dev/sa/{itsr_no}','developmentController@show_file_dev_sa');

//SIT
Route::get('/files/sit-tp/{itsr_no}','testingController@show_file_sit_tp');
Route::get('/files/sit-tp-review-sa/{itsr_no}','testingController@show_file_sit_tp_sa');
Route::get('/files/sit-tp-review-bahead/{itsr_no}','testingController@show_file_sit_tp_bahead');
Route::get('/files/sit-report/{itsr_no}','testingController@show_file_sit_report');
Route::get('/files/sit-tr/{itsr_no}','testingController@show_file_sit_tr');
Route::get('/files/sit-tr-review-sa/{itsr_no}','testingController@show_file_sit_tr_sa');
Route::get('/files/sit-tr-review-bahead/{itsr_no}','testingController@show_file_sit_tr_bahead');

//SAT
Route::get('/files/sat-tp/{itsr_no}','testingController@show_file_sat_tp');
Route::get('/files/sat-report/{itsr_no}','testingController@show_file_sat_report');
Route::get('/files/sat-tr/{itsr_no}','testingController@show_file_sat_tr');

//UAT
Route::get('/files/uat-tp/{itsr_no}','testingController@show_file_uat_tp');
Route::get('/files/uat-report/{itsr_no}','testingController@show_file_uat_report');
Route::get('/files/uat-tr/{itsr_no}','testingController@show_file_uat_tr');

//Implementation Phase
Route::get('/files/itsrassessment/{itsr_no}','implementationController@show_file_itsrassess');
Route::get('/files/memodeploy/{itsr_no}','implementationController@show_file_memodeploy');
Route::get('/files/deploydoc/{itsr_no}','implementationController@show_file_deploydoc');
Route::get('/files/ccr/{itsr_no}','implementationController@show_file_ccr');
Route::get('/files/deployplan/{itsr_no}','implementationController@show_file_deployplan');
Route::get('/files/rollbackplan/{itsr_no}','implementationController@show_file_rollbackplan');
Route::get('/files/pat/{itsr_no}','implementationController@show_file_pat');
Route::get('/files/golive/{itsr_no}','implementationController@show_file_golive');
Route::get('/files/rollback/{itsr_no}','implementationController@show_file_rollback');

//PIR
Route::get('/files/pir/{itsr_no}','postimplementationController@show_file_pir');

//search project
Route::get('/searchProject','req_gatheringController@searchProject');

//view itsr assessment
Route::get('/work-am/itsr/assessment/{itsr_no}','req_gatheringController@view_itsr_assess');

//drop project
Route::get('/dropProject','req_gatheringController@dropProject');
Route::get('/dropProject-reason/{itsr_no}','req_gatheringController@dropProject_reason');
Route::post('/dropProject-reason-store/{itsr_no}','req_gatheringController@dropProject_reason_store');
Route::get('/dropProject-approve/{itsr_no}','req_gatheringController@approve_dropProject');
Route::post('/dropProject-approve-store/{itsr_no}','req_gatheringController@approve_dropProject_store');


//create new itsr
Route::get('/dashboard','req_gatheringController@viewdashboard');
Route::get('/itsr-create', 'req_gatheringController@create');
Route::post('/itsr-store', 'req_gatheringController@store')->name('itsr.store');
Route::get('/dashboard/{itsr_no}','req_gatheringController@show');

//revisi itsr
Route::get('/itsr-revise/{itsr_no}', 'req_gatheringController@editITSR');
Route::post('/itsr-revise-store/{itsr_no}', 'req_gatheringController@editITSR_store')->name('itsr.editITSR_store');


Route::get('/work/itsr/itsr-assessment/{itsr_no}','req_gatheringController@view_itsr_assess');
//user
Route::group(['middleware' => 'checkUser'], function(){
    //Route::get('/work-user','req_gatheringController@userIndex');
    Route::get('/work-user/itsr/user-assessment/{itsr_no}','req_gatheringController@user');
    Route::post('/work-user/itsr/user-assessment-store/{itsr_no}','req_gatheringController@approval_user_store');
    Route::get('/work-user/itsr/review-pre-review/{itsr_no}','req_gatheringController@reviewPrereview');
    Route::post('/work-user/itsr/review-pre-review-store','req_gatheringController@reviewPrereview_store')->name('itsr.reviewPrereview_store');
    Route::get('/work-user/design/review-fsd-user/{itsr_no}','designController@reviewFSD_user');
    Route::post('/work-user/design/review-fsd-user-store/{id}','designController@reviewFSD_user_store')->name('fsd.reviewUser_store');
    Route::get('/work-user/testing/create-uat-tp/{itsr_no}','testingController@create_uat_tp');
    Route::post('/work-user/testing/create-uat-tp-store/{id}','testingController@create_uat_tp_store')->name('testing.createUAT_tp_store');
    Route::get('/work-user/testing/update-uat/{itsr_no}','testingController@update_uat');
    Route::post('/work-user/testing/update-uat-store/{id}','testingController@update_uat_store')->name('testing.updateUAT_store');
    Route::get('/work-user/testing/create-uat-tr/{itsr_no}','testingController@create_uat_tr');
    Route::post('/work-user/testing/create-uat-tr-store/{id}','testingController@create_uat_tr_store')->name('testing.createUAT_tr_store');
    Route::get('/work-user/implementation/create-memodeploy/{itsr_no}','implementationController@create_memodeploy');
    Route::post('/work-user/implementation/create-memodeploy-store/{id}','implementationController@create_memodeploy_store');
    Route::get('/work-user/implementation/create-deploydoc/{itsr_no}','implementationController@create_deploydoc');
    Route::post('/work-user/implementation/create-deploydoc-store/{id}','implementationController@create_deploydoc_store');
    Route::get('/work-user/implementation/create-pat/{itsr_no}','implementationController@create_pat');
    Route::post('/work-user/implementation/create-pat-store/{id}','implementationController@create_pat_store');
    Route::get('/work-user/implementation/update-pat-status/{itsr_no}','implementationController@update_pat_status');
    Route::post('/work-user/implementation/update-pat-status-store/{id}','implementationController@update_pat_status_store');
    Route::get('/work-user/postimplementation/create-pir/{itsr_no}','postimplementationController@create_pir');
    Route::post('/work-user/postimplementation/create-pir-store/{id}','postimplementationController@create_pir_store');

});

//ba
Route::group(['middleware' => 'checkBA'], function(){
    Route::get('/work-ba/itsr/approval-ba/{itsr_no}','req_gatheringController@reviewRequest');
    Route::post('/work-ba/itsr/approval-ba-store','req_gatheringController@reviewRequest_store')->name('itsr.reviewRequest_store');
    Route::get('/work-ba/itsr/create-pre-reviews/{itsr_no}','req_gatheringController@createPrereview');
    Route::post('/work-ba/itsr/create-pre-review-store/{id}','req_gatheringController@createPrereview_store')->name('itsr.createPrereview_store');
    Route::get('/work-ba/itsr/create-assessment/{itsr_no}','req_gatheringController@createAssessment');
    Route::post('/work-ba/itsr/create-assessment-store/{id}','req_gatheringController@createAssessment_store')->name('itsr.createAssessment_store');
    Route::get('/work-ba/itsr/rev-assessment/{itsr_no}','req_gatheringController@editAssessment');
    Route::post('/work-ba/itsr/edit-assessment-store/{id}','req_gatheringController@editAssessment_store');
    Route::get('/work-ba/design/create-fsd/{itsr_no}','designController@createFSD');
    Route::post('/work-ba/design/create-fsd-store/{id}','designController@createFSD_store')->name('design.createFSD_store');
    Route::get('/work-ba/testing/create-sit-tp/{itsr_no}','testingController@create_sit_tp');
    Route::post('/work-ba/testing/create-sit-tp-store/{id}','testingController@create_sit_tp_store')->name('testing.createSIT_tp_store');
    Route::get('/work-ba/testing/update-sit/{itsr_no}','testingController@update_sit');
    Route::post('/work-ba/testing/update-sit-store/{id}','testingController@update_sit_store')->name('testing.updateSIT_store');
    Route::get('/work-ba/testing/create-sit-tr/{itsr_no}','testingController@create_sit_tr');
    Route::post('/work-ba/testing/create-sit-tr-store/{id}','testingController@create_sit_tr_store')->name('testing.createSIT_tr_store');
});


//bahead
Route::group(['middleware' => 'checkBAHead'], function(){
    //Route::get('/work-bahead','req_gatheringController@baheadIndex');
    Route::get('/work-bahead/itsr/approval-bahead/{itsr_no}','req_gatheringController@approval_bahead');
    Route::post('/work-bahead/itsr/approval-bahead-store/{id}','req_gatheringController@approval_bahead_store')->name('itsr.approval_bahead_store');
    Route::get('/work-bahead/design/review-fsd-bahead/{itsr_no}','designController@reviewFSD_bahead');
    Route::post('/work-bahead/design/review-fsd-bahead-store/{id}','designController@reviewFSD_bahead_store')->name('fsd.reviewBahead_store');
    Route::get('/work-bahead/testing/review-sit-tp-bahead/{itsr_no}','testingController@reviewSIT_tp_bahead');
    Route::post('/work-bahead/testing/review-sit-tp-bahead-store/{id}','testingController@reviewSIT_tp_bahead_store')->name('sit.reviewBahead_tp_store');
    Route::get('/work-bahead/testing/review-sit-tr-bahead/{itsr_no}','testingController@reviewSIT_tr_bahead');
    Route::post('/work-bahead/testing/review-sit-tr-bahead-store/{id}','testingController@reviewSIT_tr_bahead_store')->name('sit.reviewBahead_tr_store');

});

//sa
Route::group(['middleware' => 'checkSA'], function(){
    //Route::get('/work-sa','req_gatheringController@saIndex');
    Route::get('/work-sa/itsr/sa-assessment/{itsr_no}','req_gatheringController@sa');
    Route::post('/work-sa/itsr/sa-assessment-store/{id}','req_gatheringController@approval_sa_store')->name('itsr.saAssessment_store');
    Route::post('/work-sa/itsr/sa-impacted-assessment-store/{id}','req_gatheringController@approval_sa_impacted_store');
    Route::get('/work-sa/design/review-tsd-sa/{itsr_no}','designController@reviewTSD_sa');
    Route::post('/work-sa/design/review-tsd-sa-store/{id}','designController@reviewTSD_sa_store')->name('tsd.reviewSA_store');
    Route::post('/work-sa/design/review-tsd-sa-impacted-store/{id}','designController@reviewTSD_sa_impacted_store')->name('tsd.reviewSA_store');
    Route::get('/work-sa/dev/update-dev-sa/{itsr_no}','developmentController@updateDev_sa');
    Route::post('/work-sa/dev/update-dev-sa-store/{id}','developmentController@updateDev_sa_store')->name('dev.updateDevSA_store');
    Route::get('/work-sa/dev/submit-dev-sa/{itsr_no}','developmentController@submitDev_sa');
    Route::post('/work-sa/dev/submit-dev-sa-store/{id}','developmentController@submitDev_sa_store')->name('dev.submitDevSA_store');
    Route::get('/work-sa/testing/review-sit-tp-sa/{itsr_no}','testingController@reviewSIT_tp_sa');
    Route::post('/work-sa/testing/review-sit-tp-sa-store/{id}','testingController@reviewSIT_tp_sa_store')->name('sit.reviewSA_tp_store');
    Route::get('/work-sa/testing/review-sit-tr-sa/{itsr_no}','testingController@reviewSIT_tr_sa');
    Route::post('/work-sa/testing/review-sit-tr-sa-store/{id}','testingController@reviewSIT_tr_sa_store')->name('sit.reviewSA_tr_store');
});

//bo
Route::group(['middleware' => 'checkBO'], function(){
    //Route::get('/work-bo','req_gatheringController@boIndex');
    Route::get('/work-bo/design/approve-fsd-bo/{itsr_no}','designController@approveFSD_bo');
    Route::post('/work-bo/design/approve-fsd-bo-store/{id}','designController@approveFSD_BO_store')->name('fsd.approveBO_store');
    Route::get('/work-bo/testing/approve-uat-tp-bo/{itsr_no}','testingController@approveUAT_tp_bo');
    Route::post('/work-bo/testing/approve-uat-tp-bo-store/{id}','testingController@approveUAT_tp_bo_store')->name('uat.approveBO_tp_store');
    Route::get('/work-bo/testing/approve-uat-tr-bo/{itsr_no}','testingController@approveUAT_tr_bo');
    Route::post('/work-bo/testing/approve-uat-tr-bo-store/{id}','testingController@approveUAT_tr_bo_store')->name('uat.approveBO_tr_store');
    Route::get('/work-bo/implementation/approve-memodeploy-bo/{itsr_no}','implementationController@approveMemodeploy_bo');
    Route::post('/work-bo/implementation/approve-memodeploy-bo-store/{id}','implementationController@approveMemodeploy_bo_store');
    Route::get('/work-bo/implementation/approve-pat-bo/{itsr_no}','implementationController@approvePat_bo');
    Route::post('/work-bo/implementation/approve-pat-bo-store/{id}','implementationController@approvePat_bo_store');
    Route::get('/work-bo/implementation/upload-golive/{itsr_no}','implementationController@upload_golive');
    Route::post('/work-bo/implementation/upload-golive-store/{id}','implementationController@upload_golive_store')->name('upload_golive_store');
    Route::get('/work-bo/implementation/upload-no-golive/{itsr_no}','implementationController@upload_no_golive');
    Route::post('/work-bo/implementation/upload-no-golive-store/{id}','implementationController@upload_no_golive_store');
    Route::get('/work-bo/postimplementation/approve-pir-bo/{itsr_no}','postimplementationController@approve_pir_bo');
    Route::post('/work-bo/postimplementation/approve-pir-bo-store/{id}','postimplementationController@approve_pir_bo_store');
});

//security
Route::group(['middleware' => 'checkSecurity'], function(){
    //Route::get('/work-security','req_gatheringController@securityIndex');
    Route::get('/work-security/itsr/security-assessment/{itsr_no}','req_gatheringController@security');
    Route::post('/work-security/itsr/security-assessment-store/{id}','req_gatheringController@approval_security_store');
    Route::get('/work-security/design/review-tsd-security/{itsr_no}','designController@reviewTSD_security');
    Route::post('/work-security/design/review-tsd-security-store/{id}','designController@reviewTSD_security_store')->name('tsd.reviewSecurity_store');
    Route::get('/work-security/testing/create-sat-tp/{itsr_no}','testingController@create_sat_tp');
    Route::post('/work-security/testing/create-sat-tp-store/{id}','testingController@create_sat_tp_store')->name('testing.createSAT_tp_store');
    Route::get('/work-security/testing/update-sat/{itsr_no}','testingController@update_sat');
    Route::post('/work-security/testing/update-sat-store/{id}','testingController@update_sat_store')->name('testing.updateSAT_store');
    Route::get('/work-security/testing/create-sat-tr/{itsr_no}','testingController@create_sat_tr');
    Route::post('/work-security/testing/create-sat-tr-store/{id}','testingController@create_sat_tr_store')->name('testing.createSAT_tr_store');
});

//security head
Route::group(['middleware' => 'checkSecurityHead'], function(){
    //Route::get('/work-securityhead','req_gatheringController@securityHeadIndex');
    Route::get('/work-securityhead/testing/approve-sat-tp-securityhead/{itsr_no}','testingController@approveSAT_tp_securityhead');
    Route::post('/work-securityhead/testing/approve-sat-tp-securityhead-store/{id}','testingController@approveSAT_tp_securityhead_store')->name('sat.approveSecurityHead_tp_store');
    Route::get('/work-securityhead/testing/approve-sat-tr-securityhead/{itsr_no}','testingController@approveSAT_tr_securityhead');
    Route::post('/work-securityhead/testing/approve-sat-tr-securityhead-store/{id}','testingController@approveSAT_tr_securityhead_store')->name('sat.approveSecurityHead_tr_store');
});

//infra
Route::group(['middleware' => 'checkInfra'], function(){
    //Route::get('/work-infra','req_gatheringController@infraIndex');
    Route::get('/work-infra/design/review-tsd-infra/{itsr_no}','designController@reviewTSD_infra');
    Route::post('/work-infra/design/review-tsd-infra-store/{id}','designController@reviewTSD_infra_store')->name('tsd.reviewInfra_store');
});

//skmr
Route::group(['middleware' => 'checkSKMR'], function(){
    //Route::get('/work-skmr','req_gatheringController@skmrIndex');
    Route::get('/work-skmr/itsr/skmr-assessment/{itsr_no}','req_gatheringController@skmr');
    Route::post('/work-skmr/itsr/skmr-assessment-store/{id}','req_gatheringController@approval_skmr_store');
});

//skk
Route::group(['middleware' => 'checkSKK'], function(){
    //Route::get('/work-skk','req_gatheringController@skkIndex');
    Route::get('/work-skk/itsr/skk-assessment/{itsr_no}','req_gatheringController@skk');
    Route::post('/work-skk/itsr/skk-assessment-store/{id}','req_gatheringController@approval_skk_store');
});


Route::get('/work-am/itsr/am-assessment/{itsr_no}','req_gatheringController@am');
Route::post('/work-am/itsr/am-assessment-store/{id}','req_gatheringController@approval_am_store');
//am
Route::group(['middleware' => 'checkAM'], function(){
    //Route::get('/work-am','req_gatheringController@amIndex');
    Route::get('/work-am/design/approve-fsd-am/{itsr_no}','designController@approveFSD_am');
    Route::post('/work-am/design/approve-fsd-am-store/{id}','designController@approveFSD_IT_AM_store')->name('fsd.approveAM_store');
    Route::get('/work-am/design/approve-tsd-am/{itsr_no}','designController@approveTSD_am');
    Route::post('/work-am/design/approve-tsd-am-store/{id}','designController@approveTSD_IT_AM_store')->name('tsd.approveAM_store');
    Route::get('/work-am/dev/approve-dev-am/{itsr_no}','developmentController@approveDev');
    Route::post('/work-am/dev/approve-dev-am-store/{id}','developmentController@approveDev_store')->name('dev.approveAM_store');
    Route::get('/work-am/testing/approve-sit-tp-am/{itsr_no}','testingController@approveSIT_tp_am');
    Route::post('/work-am/testing/approve-sit-tp-am-store/{id}','testingController@approveSIT_tp_am_store')->name('sit.approveAM_tp_store');
    Route::get('/work-am/testing/approve-sit-tr-am/{itsr_no}','testingController@approveSIT_tr_am');
    Route::post('/work-am/testing/approve-sit-tr-am-store/{id}','testingController@approveSIT_tr_am_store')->name('sit.approveAM_tr_store');
    Route::get('/work-am/implementation/view-deploy-doc-am/{itsr_no}','implementationController@view_deploydoc_am');
    Route::post('/work-am/implementation/view-deploy-doc-am-store/{id}','implementationController@view_deploydoc_am_store');
    Route::get('/work-am/postimplementation/approve-pir-am/{itsr_no}','postimplementationController@approve_pir_am');
    Route::post('/work-am/postimplementation/approve-pir-am-store/{id}','postimplementationController@approve_pir_am_store');
});

//owner
Route::group(['middleware' => 'checkOwner'], function(){
    //Route::get('/work-owner','req_gatheringController@ownerIndex');
    Route::get('/work-owner/design/approve-fsd-owner/{itsr_no}','designController@approveFSD_owner');
    Route::post('/work-owner/design/approve-fsd-owner-store/{id}','designController@approveFSD_IT_Owner_store')->name('fsd.approveOwner_store');
    Route::get('/work-owner/design/approve-tsd-owner/{itsr_no}','designController@approveTSD_IT_Owner');
    Route::post('/work-owner/design/approve-tsd-owner-store/{id}','designController@approveTSD_IT_Owner_store')->name('tsd.approveOwner_store');
    Route::get('/work-owner/testing/approve-sit-tp-owner/{itsr_no}','testingController@approveSIT_tp_owner');
    Route::post('/work-owner/testing/approve-sit-tp-owner-store/{id}','testingController@approveSIT_tp_owner_store')->name('sit.approveOwner_tp_store');
    Route::get('/work-owner/testing/approve-sit-tr-owner/{itsr_no}','testingController@approveSIT_tr_owner');
    Route::post('/work-owner/testing/approve-sit-tr-owner-store/{id}','testingController@approveSIT_tr_owner_store')->name('sit.approveOwner_tr_store');
    Route::get('/work-owner/postimplementation/approve-pir-owner/{itsr_no}','postimplementationController@approve_pir_owner');
    Route::post('/work-owner/postimplementation/approve-pir-owner-store/{id}','postimplementationController@approve_pir_owner_store');
});

//pmo
Route::group(['middleware' => 'checkPMO'], function(){
    //Route::get('/work-pmo','req_gatheringController@pmoIndex');
    Route::get('/work-pmo/itsr/pmo-assessment/{itsr_no}','req_gatheringController@pmo');
    Route::post('/work-pmo/itsr/pmo-assessment-store/{id}','req_gatheringController@approval_pmo_store');
    Route::get('/work-pmo/implementation/verif-deploydoc-pmo/{itsr_no}','implementationController@verif_deploydoc');
    Route::post('/work-pmo/implementation/verif-deploydoc-pmo-store/{id}','implementationController@verif_deploydoc_store');
});

//developer
Route::group(['middleware' => 'checkDeveloper'], function(){
    //Route::get('/work-developer','req_gatheringController@developerIndex');
    Route::get('/work-developer/design/create-tsd/{itsr_no}','designController@createTSD');
    Route::post('/work-developer/design/create-tsd-store/{id}','designController@createTSD_store');
    Route::get('/work-developer/dev/create-dev/{itsr_no}','developmentController@createDev');
    Route::post('/work-developer/dev/create-dev-store/{id}','developmentController@createDev_store')->name('dev.createDev_store');
    Route::get('/work-developer/implementation/create-ccr/{itsr_no}','implementationController@create_ccr_dev');
    Route::post('/work-developer/implementation/create-ccr/{id}','implementationController@create_ccr_dev_store');
});

//sysadmin
Route::group(['middleware' => 'checkDeveloper'], function(){
    //Route::get('/work-sysadmin','req_gatheringController@sysadminIndex');
    Route::get('/work-sysadmin/implementation/view-ccr/{itsr_no}','implementationController@view_ccr_sysadmin');
    Route::post('/work-sysadmin/implementation/view-ccr-store/{id}','implementationController@view_ccr_sysadmin_store');
    Route::get('/work-sysadmin/implementation/update-deployment/{itsr_no}','implementationController@update_deploy_sysadmin');
    Route::post('/work-sysadmin/implementation/update-deployment-store/{id}','implementationController@update_deploy_sysadmin_store');
    Route::get('/work-sysadmin/implementation/upload-rollback/{itsr_no}','implementationController@upload_rollback');
    Route::post('/work-sysadmin/implementation/upload-rollback-store/{id}','implementationController@upload_rollback_store');
});






Auth::routes();




