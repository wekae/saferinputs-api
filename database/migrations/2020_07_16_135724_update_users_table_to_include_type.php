<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableToIncludeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('type')->after('remember_token')->default(-1);
            $table->integer('access_level')->after('type')->nullable();
            $table->string('koan_users_id')->after('access_level')->nullable();
            $table->string('third_party_users_id')->after('koan_users_id')->nullable();
            $table->boolean('active')->default(false);
            $table->string('activation_token');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('users');
    }
}
