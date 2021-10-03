<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesigndocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designdocs', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->string('fsd_file')->nullable();
            $table->string('fsd_review_user_file')->nullable();
            $table->string('fsd_review_bahead_file')->nullable();
            $table->string('tsd_file')->nullable();
            $table->string('tsd_review_sa_file')->nullable();
            $table->string('tsd_review_security_file')->nullable();
            $table->string('tsd_review_infra_file')->nullable();
            $table->string('reject_receiver')->nullable();
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
        Schema::dropIfExists('designdocs');
    }
}
