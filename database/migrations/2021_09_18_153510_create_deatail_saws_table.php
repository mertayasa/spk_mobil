<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeatailSawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('detail_saw', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hasil_saw');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_sub_kriteria');
            $table->timestamps();

            $table->foreign('id_hasil_saw')->references('id')->on('hasil_saw')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sub_kriteria')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('deatail_saws');
    }
}
