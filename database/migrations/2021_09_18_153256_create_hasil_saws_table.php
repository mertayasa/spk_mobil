<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('hasil_saw', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria', 50);
            $table->unsignedBigInteger('id_mobil');
            $table->float('nilai_akhir');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id')->on('mobil')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hasil_saws');
    }
}
