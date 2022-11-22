<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('katalog_id')->nullable();
            $table->foreign('katalog_id')->references('id')->on('katalogs');
            $table->string('nik');
            $table->date('tanggalSewa');
            $table->date('tanggalAmbil');
            $table->date('tanggalKembali');
            $table->integer('hari');
            $table->double('harga');
            $table->enum('status_pembayaran',['Lunas','Belum Terbayar']);
            $table->double('totalPembayaran');
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
        Schema::dropIfExists('sewas');
    }
}
