<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nrp')->after('id')->unique();
            $table->string('major')->after('password')->default('Teknik Informatika');
            $table->year('class_year')->after('major');
            $table->boolean('vote_status')->after('class_year')->default(false);
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
            $table->dropColumn('nrp');
            $table->dropColumn('major');
            $table->dropColumn('class_year');
            $table->dropColumn('vote_status');
        });
    }
}
