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
        Schema::create('ukms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('short_name', 10);
            $table->text('desc');
            $table->string('category', 15);
            $table->string('avatar');
            $table->string('date');
            $table->string('member');
            $table->string('location');
            $table->string('contact');
            $table->boolean('regist_status')->default(false);
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
        Schema::dropIfExists('ukms');
    }
};
