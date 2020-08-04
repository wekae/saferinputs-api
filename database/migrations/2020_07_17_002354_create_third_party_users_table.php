<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_party_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('organization');
            $table->text('email');
            $table->text('phone');
//            $table->unsignedBigInteger('user_id')->nullable();
//            $table->foreign('user_id')
//                ->references("id")
//                ->on('users')
//                ->onDelete('cascade')
//                ->onupdate('no action');
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
        Schema::dropIfExists('third_party_users');
    }
}
