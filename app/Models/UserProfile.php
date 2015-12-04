<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	  protected $fillable = ['user_id', 'image_id', 'about_me'];
	  protected $softDelete = true;


	public function image()
	    {
	        return $this->belongsTo('App\Models\Image');
	    }

	public function user()
	    {
	        return $this->belongsTo('App\Models\User');
	    }

}
