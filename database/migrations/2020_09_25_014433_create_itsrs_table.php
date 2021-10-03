    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItsrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itsrs', function (Blueprint $table) {
            $table->string('itsr_no')->primary();
            $table->string('request_type');
            $table->string('regulator_approval');
            $table->string('project_name');
            $table->string('product_or_service_name');
            $table->string('application_name');
            $table->string('application_impacted');
            $table->string('business_impact_benefit');
            $table->string('business_budget');
            $table->integer('total_mandays');
            $table->string('development_choice');
            $table->longText('business_goals');
            $table->longText('scope');
            $table->longText('requirements');
            $table->longText('benefit_to_bank');
            $table->string('system_impact_analyst');
            $table->string('create_by');
            $table->string('itsr_file');
            $table->string('status_assignment');
            $table->string('stage');
            $table->string('pre_review_file')->nullable();
            $table->boolean('pre_review_status')->nullable();
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
        Schema::dropIfExists('itsrs');
    }
}
