<?php

//virtuali direktorija/kelias, kuriame bus cart.php
namespace App\Http\Helpers;
use App\Cart as CartModel;

class Cart {

	// helperius dazniausiai daro statinius, kaip koki kalkuliatoriu. kad su statine nereiketu instantacijos daryt, iskart kviesti
	public static function count() {

		// $count = 'veikia';
		$token = csrf_token();
		$count = CartModel::where('remember_token', $token)->whereNull('order_id')->count();
		return $count;

	}

	public static function total() {

		$token = csrf_token();
		$items = CartModel::where('remember_token', $token)->whereNull('order_id')->get();
		// var_dump($items[0]->dish->price)
		$total = 0;
		foreach ($items as $key) {
			$total += $key->dish->price;
		}
		return $total;
	}

	public static function vat() {

		$token = csrf_token();
		$count = CartModel::where('remember_token', $token)->whereNull('order_id')->count();
		return $count;

	}
}

 ?>