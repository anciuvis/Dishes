<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function carts() {
		return $this->hasMany('App\Cart', 'order_id', 'id');
	}



}
