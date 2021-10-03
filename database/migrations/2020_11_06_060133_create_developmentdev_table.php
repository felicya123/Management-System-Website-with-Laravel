<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentdevTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developmentdev', function (Blueprint $table) {
            $table->id();
            $table->biginteger('dev_id')->nullable();
            $table->string('dev_file')->nullable();
            $table->integer('week')->nullable();
            $table->string('comment')->nullable();

            //untuk update ke dashboard
            $table->string('status_dev')->nullable();
            $table->string('onprogress_detail')->nullable();
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
        Schema::dropIfExists('developmentdev');
    }
}
