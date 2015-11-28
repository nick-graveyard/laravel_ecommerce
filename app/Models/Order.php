<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

		protected $fillable = ['user_id'];
		protected $softDelete = true;

	public function user()
	    {
	        return $this->belongsTo('App\User');
	    }

	public function price_adjustments()
	    {
	        return $this->hasMany('App\PriceAdjustments');
	    }

	public function order_products()
	    {
	        return $this->hasMany('App\OrderProduct');
	    }

}
