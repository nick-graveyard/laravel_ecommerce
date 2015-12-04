<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

		protected $fillable = ['user_id'];
		protected $softDelete = true;

	public function user()
	    {
	        return $this->belongsTo('App\Models\User');
	    }

	public function adjustments()
	    {
	        return $this->hasMany('App\Models\PriceAdjustment');
	    }

	public function items()
	    {
	        return $this->hasMany('App\Models\OrderItem');
	    }

}
