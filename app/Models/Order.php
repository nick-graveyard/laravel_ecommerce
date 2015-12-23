<?php 

namespace App\Models;
use App\Models\OrderItem;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

		protected $fillable = ['user_id'];

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

	public function addItem($product_id, $quantity)
	{
			$product = Product::findOrFail($product_id);

			$params = [ 
				'order_id' => $this->id, 
				'product_id' => $product->id, 
				'quantity' => $quantity, 
				'price' => $product->price * $quantity
			];

			return OrderItem::create($params);
	}

	public function removeItem($item_id, $subtract_quantity)
	{
	
		// throws exception if item not found
		$item = $this->items()->where('id', $item_id)->firstOrFail();
		
		$final_quantity =  $item->quantity - $subtract_quantity;
		
		if($final_quantity <= 0)
		{
			$item->delete();
		}
		else
		{
			$item->quantity = $final_quantity;
			$item->save();
		}

		return true;
	}

}
