<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = ['name', 'image_id'];
	protected $softDelete = true;

	public function image()
	    {
	        return $this->belongsTo('App\Image');
	    }

	public function products()
	    {
	        return $this->hasMany('App\Product');
	    }

}
