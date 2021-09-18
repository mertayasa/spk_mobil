<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria', 50);
            $table->unsignedBigInteger('id_kriteria');
            $table->string('sub_kriteria', 50);
            $table->string('skor', 50);
            $table->tinyInteger('sifat')->default(0);
            $table->timestamps();

            $table->foreign('id_kriteria')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sub_kriterias');
    }
}
