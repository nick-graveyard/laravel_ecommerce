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
	        return $this->belongsTo('Category');
	    }

	
	/**
    * Scope a Product Call to only include Products from a category.
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeOfCategoryName($query, $category_name)
    {
    	// note name is a unique column in the Category table
    	$category_id = Category::where('name', $category_name)->first()->id;
        return $query->where('category_id', $category_id);
    }

}
