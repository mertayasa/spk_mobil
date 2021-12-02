<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCanceledBookingStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            DB::statement("ALTER TABLE booking MODIFY status ENUM('booking_baru', 'dikonfirmasi_admin', 'on_progress', 'diantar', 'selesai', 'dibatalkan', 'expired') NOT NULL");
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
            DB::statement("ALTER TABLE booking MODIFY status ENUM('booking_baru', 'dikonfirmasi_admin', 'on_progress', 'selesai') NOT NULL");
        });
    }
}
