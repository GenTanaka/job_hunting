<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('summery');
            $table->string('image');
            $table->string('status');
            $table->unsignedBigInteger('prefecture_id');
            $table->unsignedBigInteger('salary_form_id');
            $table->integer('salary_min');
            $table->integer('salary_max');
            $table->text('description');
            $table->text('working_hour');
            $table->text('welfare');
            $table->text('qualification');
            $table->boolean('release');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('prefecture_id')->references('id')->on('prefectures');
            $table->foreign('salary_form_id')->references('id')->on('salary_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign('jobs_company_id_foreign');
            $table->dropForeign('jobs_category_id_foreign');
            $table->dropForeign('jobs_prefecture_id_foreign');
            $table->dropForeign('jobs_salary_form_id_foreign');
        });

        Schema::dropIfExists('jobs');
    }
}