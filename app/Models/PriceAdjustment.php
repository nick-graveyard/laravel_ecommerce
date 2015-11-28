<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceAdjustment extends Model {

	protected $fillable = ['type', 'description',' order_id', 'amount'];
	protected $softDelete = true;


	public function order()
	{
		return $this->belongsTo('App\Order');
	}


}
