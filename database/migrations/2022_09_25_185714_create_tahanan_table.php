<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahanan', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->text('tkp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('name')->nullable();
            $table->text('foto')->nullable();
            $table->integer('umur')->nullable();
            $table->text('pasal')->nullable();
            $table->date('masuk')->nullable();
            $table->date('keluar')->nullable();
            $table->integer('penyidik')->nullable();
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
        Schema::dropIfExists('tahanan');
    }
}
