<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class CartController extends Controller {


	public function __construct()
	{
	    $this->middleware('auth');
	}

	/**
	 * Display a listing of the cart.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$cart = Auth::user()->cart;
		$items = $cart->items()->orderBy('id', 'desc')->get();
		$view = 'skins.skin_b.cart.index';
		return view( $view , ['cart' => $cart, 'items' => $items ]);
	}


	public function getFinal(Request $request)
	{
		$items = Auth::user()->cart->items;
		$view = 'skins.skin_b.cart.final';
		return view($view, ['items' => $items] );
	}

	/**
	 * Store a resource in a cart.
	 * POST to /carts 
	 * @return Response
	 */
	public function postAdd(Request $request)
	{	
		$user = Auth::user();

		try
		{
			$user->cart->addItem(
		 		$request->id, 
		 		$request->quantity
		 		);
		}
		catch(Exception $e)
		{	
			return "Item was NOT saved successfully.";
		}
		
		return "Item added to cart!";
	}

	public function postCount()
	{
		return Auth::user()->cart->items->count();
	}

	/**
	 * Remove a resource from a cart.
	 * POST to /carts/remove 
	 * @return Response
	*/

	public function postRemove(Request $request)
	{
		$user = Auth::user();

		try
		{
			$user->cart->removeItem(
		 		$request->id, 
		 		$request->quantity
		 		);
		}
		catch(Exception $e)
		{	
			return "Item was NOT removed successfully.";
		}

		return "Item removed successfully!";
	
	}

}
