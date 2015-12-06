<?php
use App\Models\Product;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as'=> 'home', 'uses' =>'ProductController@index' ]);
Route::get('/home', ['as'=> 'home', 'uses' =>'ProductController@index']);
/* Route::get('/', ['as' => 'home', function () {
	$products = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
    return view('skins/skin_b/home', ['products' => $products] );
}]);


Route::get('/home', ['as' => 'home', function () {
	$products = Product::select('*')->orderBy('created_at', 'desc')->paginate(5);
    return view('skins/skin_b/home', ['products' => $products] );
}]);
*/

Route::get('/aboot', ['as' => 'aboot', function () {
    return view('skins/skin_b/aboot');
}]);


Route::get('/blog', ['as' => 'blog', function () {
    # return view('skins/skin_b/aboot');
    return 'blog!';
}]);

Route::get('/categories', ['as' => 'categories', function () {
    # return view('skins/skin_b/aboot');
    return 'categories!';
}]);

Route::get('/cart', ['as' => 'cart', function () {
    $id = Auth::user()->getCart()-> id; 
    return redirect('orders/' . $id);
}]);


Route::get('/account', array('as' => 'account', function(){
	$id = Auth::user()->id;
    return redirect('users/' . $id);

}));

Route::get('/product/category/{category_name}',  function(){
    $product = Product::ofCategory($category_name)->get();
    return response()->json($product);
});


// REST routes
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');
Route::resource('users', 'UserController');



// Authentication routes...
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/login', ['as'=> 'login', 'uses' => 'Auth\AuthController@getLogin' ] );
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', ['as'=> 'register', 'uses' => 'Auth\AuthController@getRegister' ] );
Route::post('/register', 'Auth\AuthController@postRegister');





// test routes
Route::get('echo', function() {
    return 'Great Success';
});

Route::post('echo', function() {
    return var_dump(Input::all());
});


// test routes
Route::get('hello_world', function () {
    return 'Ayyyyy lmao';
});








// Idea GraveYard
//-----------------
// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');
/* 
Route::get('/skin_a', function () {
    return view('skins/skin_a/home');
});
*/