<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->nullable()->unsigned();
            
            $table->boolean('is_active')->nullable()->default(true);
            $table->boolean('is_completed')->nullable()->default(false);
            $table->boolean('is_unlocked')->nullable()->default(false);
            
            $table->string('slug', 128)->nullable();
            $table->string('title', 128)->nullable();
            $table->text('description', 500)->nullable();
            $table->string('image_url')->nullable();

            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
