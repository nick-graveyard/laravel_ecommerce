<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected fillable = ["name", "description", "price", "category_id", "image_id"];
	protected $softDelete = true;

	public function image()
	    {
	        return $this->belongsTo('App\Image');
	    }


	public function category()
	    {
	        return $this->belongsTo('App\Category');
	    }


}
