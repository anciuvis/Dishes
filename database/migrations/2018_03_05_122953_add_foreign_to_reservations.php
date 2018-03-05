<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('reservations', function (Blueprint $table) {
				$table->foreign('user_id')->references('id')->on('users');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::table('reservations', function (Blueprint $table) {
				$table->dropForeign('reservations_user_id_foreign');
			});
    }
}
