<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('TransaksiID');
            $table->date('TanggalTransaksi');
            $table->bigInteger('NominalTransaksi');
            $table->bigInteger('SisaPembayaran');
            $table->string('BuktiTransaksi');
            $table->string('Keterangan');
            $table->string('StatusPembayaran', 30);
            $table->bigInteger('SPR_SPR_ID');
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
        Schema::dropIfExists('transaksi_pembayaran');
    }
}
