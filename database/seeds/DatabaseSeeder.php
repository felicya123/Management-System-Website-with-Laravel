<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\ITSR;
use App\Workbasket;
use App\ITSRDetails;
use App\TestingDoc;
use App\ITSRAssessment;
use App\ImplementationDoc;
use App\DevelopmentDoc;
use App\DevelopmentDev;
use App\DesignDoc;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "user_id" => "pms_itdeveloper",
            "fullname" => "IT Developer",
            "division" => "IT_Developer",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_developer@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);
        
        User::create([
            "user_id" => "pms_admin",
            "fullname" => "User Admin",
            "division" => "Admin",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "admin@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);
        
        User::create([
            "user_id" => "pms_user",
            "fullname" => "User",
            "division" => "User",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "user@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itba",
            "fullname" => "IT BA",
            "division" => "IT_BA",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_ba@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsa",
            "fullname" => "IT SA",
            "division" => "IT_SA",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_sa@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsa1",
            "fullname" => "IT SA 1",
            "division" => "IT_SA",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_sa1@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsa2",
            "fullname" => "IT SA 2",
            "division" => "IT_SA",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_sa2@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsa3",
            "fullname" => "IT SA 3",
            "division" => "IT_SA",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_sa3@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_sysadmin",
            "fullname" => "Sysadmin",
            "division" => "Sysadmin",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "sysadmin@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);
        User::create([
            "user_id" => "pms_itbahead",
            "fullname" => "IT BA Head",
            "division" => "IT_BAHead",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_bahead@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsecurity",
            "fullname" => "IT Security",
            "division" => "IT_Security",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_security@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_skmr",
            "fullname" => "SKMR",
            "division" => "SKMR",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "skmr@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_skk",
            "fullname" => "SKK",
            "division" => "SKK",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "skk@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itappsmanager",
            "fullname" => "IT Apps Manager",
            "division" => "IT_AppsManager",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_am@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itpmo",
            "fullname" => "IT PMO",
            "division" => "IT_PMO",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_pmo@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itowner",
            "fullname" => "IT Owner",
            "division" => "IT_Owner",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_owner@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_bo",
            "fullname" => "Business Owner",
            "division" => "BO",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "bo@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itinfra",
            "fullname" => "IT Infra",
            "division" => "IT_Infra",
            "dob" => "2019-11-25",
            "gender" => "Female",
            "email" => "it_infra@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        User::create([
            "user_id" => "pms_itsecurityhead",
            "fullname" => "IT Security Head",
            "division" => "IT_SecurityHead",
            "dob" => "2019-11-25",
            "gender" => "Male",
            "email" => "it_securityhead@mail.com",
            "password" => bcrypt("12345678"),
            "address" => "asd"
        ]);

        

        //langsung ke stage-4
        // ITSR::create([
        //     "itsr_no" => "ITSR-04",
        //     "request_type" => "New Project Besar",
        //     "regulator_approval" => "Yes",
        //     "project_name" => "asd",
        //     "product_or_service_name" => "asd",
        //     "application_name" => "asd",
        //     "application_impacted" => "asd",
        //     "business_impact_benefit" => "Revenue Generation" ,
        //     "business_budget" => "more than USD 100K",
        //     "total_mandays" => "100",
        //     "development_choice" => "External IT Developer" ,
        //     "business_goals" => "asd",
        //     "scope" => "asd",
        //     "requirements" => "asd",
        //     "benefit_to_bank" => "asd",
        //     "system_impact_analyst" => "No",
        //     "create_by" => "pms_user",
        //     "itsr_file" => "",
        //     "status_assignment" => "Active",
        //     "stage" => "Phase4",
        //     "created_at" => "2020-11-02 02:27:08",
        //     "updated_at" => "2020-11-02 02:27:08",
        // ]);

        // Workbasket::create([
        //     "itsr_no" => "ITSR-04",
        //     "description" => "Waiting for SIT Test Plan to be submitted by IT BA",
        //     "assign_to" => "IT BA",
        //     "division" => "IT_BA"
        // ]);

        // ITSRDetails::create([
        //     "itsr_no" => "ITSR-04",
        //     "description" => "Waiting for SIT Test Plan to be submitted by IT BA",
        //     "status_itsr" => "Approve",
        //     "comment_itsr" => "asd",
        //     "stage" => "Phase4"
        // ]);

        // TestingDoc::create([
        //     "itsr_no" => "ITSR-04",
        //     "email_sendto" => "pms_itba"
        // ]);

        // ITSRAssessment::create([
        //     "itsr_no" => "ITSR-04",
        //     "security_testing" => "1",
        //     "sit_start_date" => "2020-11-11",
        //     "sit_end_date" => "2020-11-15",
        //     "sat_start_date" => "2020-11-11",
        //     "sat_end_date" => "2020-11-15",
        //     "uat_start_date" => "2020-11-11",
        //     "uat_end_date" => "2020-11-15"
        // ]);

        //langsung ke stage-5
        // ITSR::create([
        //     "itsr_no" => "ITSR-05",
        //     "request_type" => "New Project Kecil",
        //     "regulator_approval" => "Yes",
        //     "project_name" => "asd",
        //     "product_or_service_name" => "asd",
        //     "application_name" => "asd",
        //     "application_impacted" => "asd",
        //     "business_impact_benefit" => "Revenue Generation" ,
        //     "business_budget" => "more than USD 100K",
        //     "total_mandays" => "100",
        //     "development_choice" => "External IT Developer" ,
        //     "business_goals" => "asd",
        //     "scope" => "asd",
        //     "requirements" => "asd",
        //     "benefit_to_bank" => "asd",
        //     "system_impact_analyst" => "No",
        //     "create_by" => "pms_user",
        //     "itsr_file" => "",
        //     "status_assignment" => "Active",
        //     "stage" => "Phase5",
        //     "created_at" => "2020-11-02 02:27:08",
        //     "updated_at" => "2020-11-02 02:27:08",
        // ]);

        // Workbasket::create([
        //     "itsr_no" => "ITSR-05",
        //     "description" => "Waiting for Memo Deploy to be submitted by User",
        //     "assign_to" => "User",
        //     "division" => "User"
        // ]);

        // ITSRDetails::create([
        //     "itsr_no" => "ITSR-05",
        //     "description" => "Waiting for Memo Deploy to be submitted by User",
        //     "status_itsr" => "Approve",
        //     "comment_itsr" => "asd",
        //     "stage" => "Phase5"
        // ]);

        // ImplementationDoc::create([
        //     "itsr_no" => "ITSR-05"
        // ]);

        // ITSRAssessment::create([
        //     "itsr_no" => "ITSR-05",
        //     "deploy_start_date" => "2020-11-11",
        //     "deploy_end_date" => "2020-11-15",
        //     "pat_start_date" => "2020-11-11",
        //     "pat_end_date" => "2020-11-15",
        //     "golive_date"=> "2020-11-11",
        // ]);

        // ITSR Approval BA (utk no pre-review)
        ITSR::create([
            "itsr_no" => "ITSR-100",
            "request_type" => "New Project Besar",
            "regulator_approval" => "Yes",
            "project_name" => "Tes No PreReview",
            "product_or_service_name" => "asd",
            "application_name" => "asd",
            "application_impacted" => "asd",
            "business_impact_benefit" => "Revenue Generation" ,
            "business_budget" => "more than USD 100K",
            "total_mandays" => "100",
            "development_choice" => "External IT Developer" ,
            "business_goals" => "asd",
            "scope" => "asd",
            "requirements" => "asd",
            "benefit_to_bank" => "asd",
            "system_impact_analyst" => "No",
            "create_by" => "pms_user",
            "itsr_file" => "",
            "status_assignment" => "Active",
            "stage" => "Phase1",
            "created_at" => "2020-11-02 02:27:08",
            "updated_at" => "2020-11-02 02:27:08",
        ]);

        Workbasket::create([
            "itsr_no" => "ITSR-100",
            "description" => "Waiting ITSR to be reviewed by IT BA",
            "assign_to" => "IT BA",
            "division" => "IT_BA"
        ]);

        ITSRDetails::create([
            "itsr_no" => "ITSR-100",
            "description" => "Waiting ITSR to be reviewed by IT BA",
            "status_itsr" => "ITSR Created",
            "comment_itsr" => "Tes No PreReview",
            "stage" => "Phase1"
        ]);

        // Waiting for Assessment to be reviewed by IT_SA (utk Impacted App: No)
        ITSR::create([
            "itsr_no" => "ITSR-200",
            "request_type" => "New Project Besar",
            "regulator_approval" => "Yes",
            "project_name" => "Tes No Impacted App",
            "product_or_service_name" => "asd",
            "application_name" => "asd",
            "application_impacted" => "asd",
            "business_impact_benefit" => "Revenue Generation" ,
            "business_budget" => "more than USD 100K",
            "total_mandays" => "100",
            "development_choice" => "External IT Developer" ,
            "business_goals" => "asd",
            "scope" => "asd",
            "requirements" => "asd",
            "benefit_to_bank" => "asd",
            "system_impact_analyst" => "No",
            "create_by" => "pms_user",
            "itsr_file" => "",
            "status_assignment" => "Active",
            "stage" => "Phase1",
            "created_at" => "2020-11-02 02:27:08",
            "updated_at" => "2020-11-02 02:27:08",
        ]);

        ITSRAssessment::create([
            "itsr_no" => "ITSR-200",
            "security_testing" => "1",
            "sit_start_date" => "2020-11-11",
            "sit_end_date" => "2020-11-15",
            "sat_start_date" => "2020-11-11",
            "sat_end_date" => "2020-11-15",
            "uat_start_date" => "2020-11-11",
            "uat_end_date" => "2020-11-15"
        ]);

        Workbasket::create([
            "itsr_no" => "ITSR-200",
            "description" => "Waiting for Assessment to be reviewed by IT_SA",
            "assign_to" => "IT SA",
            "division" => "IT_SA"
        ]);

        ITSRDetails::create([
            "itsr_no" => "ITSR-200",
            "description" => "Waiting for Assessment to be reviewed by IT_SA",
            "status_itsr" => "ITSR Created",
            "comment_itsr" => "Tes No Impacted App",
            "stage" => "Phase1"
        ]);

        // Waiting for SIT Test Result to be approved by IT Owner (Saat security testing: No)
        ITSR::create([
            "itsr_no" => "ITSR-300",
            "request_type" => "New Project Besar",
            "regulator_approval" => "Yes",
            "project_name" => "Tes No SAT",
            "product_or_service_name" => "asd",
            "application_name" => "asd",
            "application_impacted" => "asd",
            "business_impact_benefit" => "Revenue Generation" ,
            "business_budget" => "more than USD 100K",
            "total_mandays" => "100",
            "development_choice" => "External IT Developer" ,
            "business_goals" => "asd",
            "scope" => "asd",
            "requirements" => "asd",
            "benefit_to_bank" => "asd",
            "system_impact_analyst" => "No",
            "create_by" => "pms_user",
            "itsr_file" => "",
            "status_assignment" => "Active",
            "stage" => "Phase4",
            "created_at" => "2020-11-02 02:27:08",
            "updated_at" => "2020-11-02 02:27:08",
        ]);

        ITSRAssessment::create([
            "itsr_no" => "ITSR-300",
            "security_testing" => "0",
            "sit_start_date" => "2020-11-11",
            "sit_end_date" => "2020-11-15",
            "sat_start_date" => "2020-11-11",
            "sat_end_date" => "2020-11-15",
            "uat_start_date" => "2020-11-11",
            "uat_end_date" => "2020-11-15"
        ]);

        Workbasket::create([
            "itsr_no" => "ITSR-300",
            "description" => "Waiting for SIT Test Result to be approved by IT Owner",
            "assign_to" => "IT Owner",
            "division" => "IT_Owner"
        ]);

        ITSRDetails::create([
            "itsr_no" => "ITSR-300",
            "description" => "Waiting for SIT Test Result to be approved by IT Owner",
            "status_itsr" => "ITSR Created",
            "comment_itsr" => "Tes No SAT",
            "stage" => "Phase4"
        ]);

        TestingDoc::create([
            "itsr_no" => "ITSR-300",
            "email_sendto" => "pms_itba"
        ]);

        // Akhir fase 5 (enhancement) + GoLive
        ITSR::create([
            "itsr_no" => "ITSR-400",
            "request_type" => "Enhancement Kecil",
            "regulator_approval" => "Yes",
            "project_name" => "Tes Enhancement",
            "product_or_service_name" => "asd",
            "application_name" => "asd",
            "application_impacted" => "asd",
            "business_impact_benefit" => "Revenue Generation" ,
            "business_budget" => "more than USD 100K",
            "total_mandays" => "100",
            "development_choice" => "External IT Developer" ,
            "business_goals" => "asd",
            "scope" => "asd",
            "requirements" => "asd",
            "benefit_to_bank" => "asd",
            "system_impact_analyst" => "No",
            "create_by" => "pms_user",
            "itsr_file" => "",
            "status_assignment" => "Active",
            "stage" => "Phase5",
            "created_at" => "2020-11-02 02:27:08",
            "updated_at" => "2020-11-02 02:27:08",
        ]);

        Workbasket::create([
            "itsr_no" => "ITSR-400",
            "description" => "Waiting for PAT to be approve by Business Owner",
            "assign_to" => "Business Owner",
            "division" => "BO"
        ]);

        ITSRDetails::create([
            "itsr_no" => "ITSR-400",
            "description" => "Waiting for PAT to be approve by Business Owner",
            "status_itsr" => "Approve",
            "comment_itsr" => "Tes Enhancement",
            "stage" => "Phase5"
        ]);

        ImplementationDoc::create([
            "itsr_no" => "ITSR-400"
        ]);

        ITSRAssessment::create([
            "itsr_no" => "ITSR-400",
            "deploy_start_date" => "2020-11-11",
            "deploy_end_date" => "2020-11-15",
            "pat_start_date" => "2020-11-11",
            "pat_end_date" => "2020-11-15",
            "golive_date"=> "2020-11-11",
        ]);

        //No Phase 2
        ITSR::create([
            "itsr_no" => "ITSR-500",
            "request_type" => "Enhancement Kecil",
            "regulator_approval" => "Yes",
            "project_name" => "Tes No Phase 2",
            "product_or_service_name" => "asd",
            "application_name" => "asd",
            "application_impacted" => "asd",
            "business_impact_benefit" => "Revenue Generation" ,
            "business_budget" => "more than USD 100K",
            "total_mandays" => "100",
            "development_choice" => "External IT Developer" ,
            "business_goals" => "asd",
            "scope" => "asd",
            "requirements" => "asd",
            "benefit_to_bank" => "asd",
            "system_impact_analyst" => "No",
            "create_by" => "pms_user",
            "itsr_file" => "",
            "status_assignment" => "Active",
            "stage" => "Phase1",
            "created_at" => "2020-11-02 02:27:08",
            "updated_at" => "2020-11-02 02:27:08",
        ]);

        ITSRAssessment::create([
            "itsr_no" => "ITSR-500",
            "deploy_start_date" => "2020-11-11",
            "deploy_end_date" => "2020-11-15",
            "pat_start_date" => "2020-11-11",
            "pat_end_date" => "2020-11-15",
            "golive_date"=> "2020-11-11",
        ]);

        Workbasket::create([
            "itsr_no" => "ITSR-500",
            "description" => "Waiting for Assessment to be reviewed by User",
            "assign_to" => "User",
            "division" => "User"
        ]);

        ITSRDetails::create([
            "itsr_no" => "ITSR-500",
            "description" => "Waiting for Assessment to be reviewed by User",
            "status_itsr" => "Approve",
            "comment_itsr" => "Tes No Phase 2",
            "stage" => "Phase1"
        ]);
    }
}
