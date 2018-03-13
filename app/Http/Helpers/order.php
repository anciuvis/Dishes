<?php

namespace App\Http\Helpers;
use App\Order as OrderModel;

class Order {

	public static function count() {

		$token = csrf_token();
		$count = OrderModel::where('remember_token', $token)->count();
		return $count;

	}
}

?>
