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
        Schema::create('gss_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gss_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('score')->default(0);
            $table->unsignedInteger('level')->default(0);
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
        Schema::dropIfExists('gss_user');
    }
};
