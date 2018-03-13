<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function carts() {
		return $this->hasMany('App\Cart', 'order_id', 'id');
	}

}
