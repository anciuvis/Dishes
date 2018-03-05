<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('carts', function (Blueprint $table) {
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('dish_id')->references('id')->on('dishes');
				$table->foreign('order_id')->references('id')->on('orders');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
			Schema::table('carts', function (Blueprint $table) {
				$table->dropForeign('carts_user_id_foreign');
				$table->dropForeign('carts_dish_id_foreign');
				$table->dropForeign('carts_order_id_foreign');
			});
    }
}
