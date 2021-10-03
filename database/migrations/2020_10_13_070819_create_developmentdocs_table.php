<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developmentdocs', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->string('developer_id')->nullable();
            $table->string('dev_file_sa')->nullable();
            $table->integer('week')->nullable();

            //untuk update ke dashboard
            $table->string('status_dev')->nullable();
            $table->string('onprogress_detail')->nullable();

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
        Schema::dropIfExists('developmentdocs');
    }
}
