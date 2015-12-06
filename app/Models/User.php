<?php 

namespace App\Models;

use App\Models\Order;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $softDelete = true;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'role'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function profile()
	{
		return $this->hasOne('App\Models\UserProfile');
	}

	public function orders()
	{
		return $this->hasMany('App\Models\Order');
	}


	public function cart()
	{	
		if ( !$this->cart_exists() ) 
		{
			$this->create_cart();
		}
	
		return $this->belongsTo('App\Models\Order', 'order_id');
	}

	
	/* tests if order variable is null 
	 and if not tests if the order exists
	*/
	private function cart_exists()
	{
		if ( is_null($this->order_id) )
		{
			return false;
		}
		else if ( !Order::find($this->order_id)->exists() )
		{
			return false;
		}
		else
		{
			return true;
		}

	}

	/* 
		creates a cart
	*/
	private function create_cart()
	{
			$order = new Order;
			$order->user_id = $this->id;
			$order->save();
			$this->order_id = $order->id;
			$this->save();
	}


}
