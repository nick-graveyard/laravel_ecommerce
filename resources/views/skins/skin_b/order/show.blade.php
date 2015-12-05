@extends('skins.skin_b.master')

@section('content')

<article>

<header> 

	<div> Order Number: {{ $order->id }}  </div>
	<div>  Purchaser </div>
	@include('skins.skin_b.user.user_grid_short', ['user' => $order->user] )

	<div> Order Started: {{ $order->created_at }}</div>

</header>

	
	@each('skins.skin_b.order_item.show', $order->items, 'order_item')



</article>
@endsection
