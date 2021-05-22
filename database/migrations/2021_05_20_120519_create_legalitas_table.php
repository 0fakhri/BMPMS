<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalitas', function (Blueprint $table) {
            $table->bigIncrements('LegalitasID');
            $table->string('No_Legalitas', 30);
            $table->date('TanggalTerbit');
            $table->bigInteger('No_Unit');
            $table->string('StatusLegalitas', 30);
            $table->bigInteger('TipePerumahan_TipeID');
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
        Schema::dropIfExists('legalitas');
    }
}
