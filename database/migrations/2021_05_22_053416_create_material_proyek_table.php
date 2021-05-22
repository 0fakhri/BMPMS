<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_proyek', function (Blueprint $table) {
            $table->bigIncrements('MP_ID');
            $table->date('TanggalPengiriman');
            $table->string('Doc_MP');
            $table->string('StatusVerifikasi', 30);
            $table->bigInteger('KebutuhanProyek_KP_ID');
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
        Schema::dropIfExists('material_proyek');
    }
}
