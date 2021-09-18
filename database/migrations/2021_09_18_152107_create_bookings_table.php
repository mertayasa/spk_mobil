<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mobil');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_sopir')->nullable();
            $table->text('deskripsi');
            $table->integer('harga');
            $table->date('tgl_mulai_sewa');
            $table->date('tgl_akhir_sewa');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id')->on('mobil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sopir')->references('id')->on('sopir')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
