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
        Schema::create('dpribadi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('jk');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telp');
            $table->string('agama');
            $table->string('status');
            $table->string('cv');
            $table->string('ktp');
            $table->string('surat_lamaran');
            $table->string('sertifikat_teofl');
            $table->string('foto');
            $table->string('link');
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
        Schema::dropIfExists('dpribadi');
    }
};
