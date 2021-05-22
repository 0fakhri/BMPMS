<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
            $table->bigIncrements('KonsumenID');
            $table->string('NamaLengkap', 50);
            $table->date('TanggalLahir');
            $table->enum('JenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->string('Alamat');
            $table->string('Email', 30)->unique();
            $table->string('Telepon', 15);
            $table->string('FotoKTP');
            $table->bigInteger('User_UserID');
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
        Schema::dropIfExists('konsumen');
    }
}
