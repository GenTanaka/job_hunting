<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_tag', function (Blueprint $table) {
            $table->dropForeign('job_tag_job_id_foreign');
            $table->dropForeign('job_tag_tag_id_foreign');
        });

        Schema::dropIfExists('job_tag');
    }
}