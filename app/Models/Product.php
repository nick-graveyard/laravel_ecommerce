<?php 

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = ["name", "description", "price", "category_id", "image_id"];


	public function image()
	    {
	        return $this->belongsTo('App\Models\Image');
	    }


	public function category()
	    {
	        return $this->belongsTo('App\Models\Category');
	    }


	    public function scopeOfCategory($query, $category_name)
	    {
	    	// note name is a unique column in the Category table
	    	$category_id = Category::where('name', $category_name)->first()->id;
	        return $query->where('category_id', $category_id);
	    }

	    public function scopeGetLatest($query, $amount_to_return)
	    {
	    	// note name is a unique column in the Category table
	        return $query->where('', $category_id);
	    }
}
