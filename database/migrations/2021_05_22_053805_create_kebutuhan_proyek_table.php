<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKebutuhanProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebutuhan_proyek', function (Blueprint $table) {
            $table->bigIncrements('KP_ID');
            $table->date('TanggalPengajuan');
            $table->string('PenanggungJawab', 30);
            $table->bigInteger('TotalNominal');
            $table->string('Doc_KP');
            $table->string('StatusPersetujuan', 30);
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
        Schema::dropIfExists('kebutuhan_proyek');
    }
}
