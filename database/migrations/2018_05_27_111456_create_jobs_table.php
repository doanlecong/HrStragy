<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('job_type_id');
            $table->string('cate_job_id');
            $table->string('job_level_id');
            $table->string('job_name');
            $table->string('country_id');
            $table->string('province_id');
            $table->string('district_id');
            $table->string('career_info_id');
            $table->string('time_from');
            $table->string('time_to');
            $table->string('content');
            $table->string('status',1)->default('Y');

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
        Schema::dropIfExists('jobs');
    }
}
