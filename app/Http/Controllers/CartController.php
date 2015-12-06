<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		return $user->cart->items;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "create is work";
	}

	/**
	 * Store a newly created resource in storage.
	 * POST to /carts 
	 * @return Response
	 * Note: refactor this into an API namespace at some point.
	 */
	public function store(Request $request)
	{	
		$user = Auth::user();

		try
		{
			$user->cart->addItem(
		 		$request->product_id, 
		 		$request->product_quantity
		 		);
		}
		catch(Exception $e)
		{	
			$msg = "Item was NOT saved successfully.";
			return $msg;
		}

		
		return "Item saved successfully!";


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "edit is work";

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "update is work";

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "desroy is work";

	}

}
