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
            $table->string('nrp')->after('id')->unique()->nullable();
            $table->string('roles')->after('password')->default('User');
            $table->string('major')->after('roles')->nullable();
            $table->string('class_year')->after('major')->nullable();
            $table->boolean('vote_status')->after('class_year')->nullable();
            $table->string('photo', 2048)->after('vote_status')->nullable();
            $table->string('public_id')->after('photo')->nullable();
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
            $table->dropColumn('username');
            $table->dropColumn('major');
            $table->dropColumn('class_year');
            $table->dropColumn('vote_status');
            $table->dropColumn('photo');
        });
    }
}
