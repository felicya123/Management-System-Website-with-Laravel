<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItsrassessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itsrassessments', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->date('assessment_start_date')->nullable();
            $table->date('assessment_end_date')->nullable();
            $table->string('assessment_srname')->nullable();
            $table->string('project_description')->nullable();
            $table->string('scope_of_work')->nullable();
            $table->string('user_requirement')->nullable();
            $table->boolean('impacted_app')->nullable();
            $table->string('impacted_app1')->nullable();
            $table->string('impacted_app2')->nullable();
            $table->string('impacted_app3')->nullable();
            $table->string('pic_impacted_app1')->nullable();
            $table->string('pic_impacted_app2')->nullable();
            $table->string('pic_impacted_app3')->nullable();
            $table->integer('total_impacted_app')->nullable();
            $table->boolean('security_testing')->nullable();
            $table->boolean('penetration_test_internal')->nullable();
            $table->boolean('penetration_test_vendor')->nullable();
            $table->boolean('user_matrix_doc')->nullable();
            $table->string('assessment_security')->nullable();
            $table->string('assessment_skmr')->nullable();
            $table->boolean('report_ojk')->nullable();
            $table->boolean('reportregulator_approval')->nullable();
            $table->string('assessment_skk')->nullable();
            $table->string('implementation_development')->nullable();
            $table->date('dev_start_date')->nullable();
            $table->date('dev_end_date')->nullable();
            $table->date('sit_start_date')->nullable();
            $table->date('sit_end_date')->nullable();
            $table->date('sat_start_date')->nullable();
            $table->date('sat_end_date')->nullable();
            $table->date('uat_start_date')->nullable();
            $table->date('uat_end_date')->nullable();
            $table->date('deploy_start_date')->nullable();
            $table->date('deploy_end_date')->nullable();
            $table->date('pat_start_date')->nullable();
            $table->date('pat_end_date')->nullable();
            $table->date('golive_date')->nullable();
            $table->integer('total_mandays')->nullable();
            $table->string('category')->nullable();
            $table->string('bo')->nullable();
            $table->string('business_pm')->nullable();
            $table->string('assessment_file')->nullable();
            $table->string('assessment_sa_file')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itsrassessments');
    }
}
