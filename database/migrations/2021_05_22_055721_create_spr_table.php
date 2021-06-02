<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr', function (Blueprint $table) {
            $table->bigIncrements('SPR_ID');
            $table->string('No_SPR', 30);
            $table->date('TanggalSPR');
            $table->bigInteger('UangMuka');
            $table->string('Keterangan');
            $table->string('StatusSPR', 30);
            $table->bigInteger('Konsumen_KonsumenID');
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
        Schema::dropIfExists('spr');
    }
}
