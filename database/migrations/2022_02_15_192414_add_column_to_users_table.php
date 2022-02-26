<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday');
            $table->unsignedBigInteger('gender_id');
            $table->bigInteger('postalcode');
            $table->string('address');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_gender_id_foreign');
            $table->dropForeign('users_company_id_foreign');
            $table->dropColumn('birthday');
            $table->dropColumn('gender_id');
            $table->dropColumn('postalcode');
            $table->dropColumn('address');
            $table->dropColumn('company_id');
        });
    }
}