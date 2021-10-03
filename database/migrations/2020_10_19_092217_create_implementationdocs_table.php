<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplementationdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementationdocs', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->string('memodeploy_file')->nullable();
            $table->string('deploydoc_file')->nullable();
            $table->string('ccr_file')->nullable();
            $table->string('deploymentplan_file')->nullable();
            $table->string('rollbackplan_file')->nullable();
            $table->string('ccr_information')->nullable();

            //verification document value
            $table->boolean('itsr_status')->nullable();
            $table->boolean('itsr_assess_status')->nullable();
            $table->boolean('fsd_status')->nullable();
            $table->boolean('tsd_status')->nullable();
            $table->boolean('sit_tc_status')->nullable();
            $table->boolean('sit_tp_status')->nullable();
            $table->boolean('sit_tr_status')->nullable();
            $table->boolean('sat_tp_status')->nullable();
            $table->boolean('sat_tr_status')->nullable();
            $table->boolean('uat_tc_status')->nullable();
            $table->boolean('uat_tp_status')->nullable();
            $table->boolean('uat_tr_status')->nullable();
            $table->boolean('memodeploy_status')->nullable();

            $table->string('patscript_file')->nullable();
            $table->string('golive_file')->nullable();
            $table->string('rollback_file')->nullable();

            //untuk update ke dashboard
            $table->string('status_deployment')->nullable();
            $table->string('status_pat')->nullable();

            $table->string('reject_receiver')->nullable();
            //
            $table->string('email_sendto')->nullable();
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
        Schema::dropIfExists('implementationdocs');
    }
}
