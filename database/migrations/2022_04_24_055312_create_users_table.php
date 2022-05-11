<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('USER');
            $table->string('name');
            $table->string('npm');
            $table->string('avatar');
            $table->BigInteger('year');
            $table->string('faculty');
            $table->BigInteger('phone_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
