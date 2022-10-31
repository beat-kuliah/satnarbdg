<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('nrp')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('role')->default(0);
            $table->string('password')->nullable();
            $table->integer('penyidik')->nullable();
            $table->string('telp')->nullable();
            $table->string('pangkat')->nullable();
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
        Schema::dropIfExists('users');
    }
}
