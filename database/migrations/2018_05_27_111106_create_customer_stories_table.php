<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_stories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_thumb');
            $table->string('title');
            $table->mediumText('description');
            $table->longText('content');
            $table->string('writer');
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
        Schema::dropIfExists('customer_stories');
    }
}
