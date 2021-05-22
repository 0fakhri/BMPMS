<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipePerumahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_perumahan', function (Blueprint $table) {
            $table->bigIncrements('TipeID');
            $table->bigInteger('LuasTanah');
            $table->bigInteger('LuasBangunan');
            $table->bigInteger('Harga');
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
        Schema::dropIfExists('tipe_perumahan');
    }
}
