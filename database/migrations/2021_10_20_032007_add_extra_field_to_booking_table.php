<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->enum('dengan_sopir', ['ya', 'tidak'])->default('tidak');
            $table->enum('pengambilan', ['diantar', 'ambil_sendiri'])->default('ambil_sendiri');
            $table->text('alamat_antar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('dengan_sopir');
            $table->dropColumn('pengambilan');
            $table->dropColumn('alamat_antar');
        });
    }
}
