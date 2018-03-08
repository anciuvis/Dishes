<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	// susieti su dishes lentele pagal viena ID:
  public function dish() {
		return $this->hasOne('App\Dish', 'id', 'dish_id');
	}

}
