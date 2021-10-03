<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItsrdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itsrdetails', function (Blueprint $table) {
            $table->id();
            $table->string('itsr_no');
            $table->string('description');
            $table->string('status_itsr');
            $table->string('comment_itsr');
            $table->string('title_itsr')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('operator_id')->nullable();
            $table->string('operator_name')->nullable();
            $table->string('stage');
            $table->string('stage_temp')->nullable();
            $table->string('description_temp')->nullable();
            $table->string('assign_to_temp')->nullable();
            $table->string('division_temp')->nullable();

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
        Schema::dropIfExists('itsrdetails');
    }
}
