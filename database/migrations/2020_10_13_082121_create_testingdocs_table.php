<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testingdocs', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->string('sit_tp_file')->nullable();
            $table->string('sit_tp_review_sa_file')->nullable();
            $table->string('sit_tp_review_bahead_file')->nullable();
            $table->string('sit_report_file')->nullable();
            $table->string('sit_tr_file')->nullable();
            $table->string('sit_tr_review_sa_file')->nullable();
            $table->string('sit_tr_review_bahead_file')->nullable();

            $table->string('sat_tp_file')->nullable();
            $table->string('sat_report_file')->nullable();
            $table->string('sat_tr_file')->nullable();

            $table->string('uat_tp_file')->nullable();
            $table->string('uat_report_file')->nullable();
            $table->string('uat_tr_file')->nullable();

            //untuk update ke dashboard
            $table->string('status_sit')->nullable();
            $table->string('status_sat')->nullable();
            $table->string('status_uat')->nullable();

            $table->string('reject_receiver')->nullable();
            
            //id pic yg menerima email
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
        Schema::dropIfExists('testingdocs');
    }
}
