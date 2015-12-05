<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

	protected $fillable = ["order_id", "product_id", "quantity", 'price'];
	protected $softDelete = true;

	public function order()
	    {
	        return $this->belongsTo('App\Models\Order');
	    }

	public function product()
	    {
	        return $this->belongsTo('App\Models\Product');
	    }
}
