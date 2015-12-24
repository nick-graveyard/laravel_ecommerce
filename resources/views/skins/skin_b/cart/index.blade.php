@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-6">
			@each('skins.skin_b.order_item.show', $items, 'order_item')
		</div>

		<div class="col-md-6">
			<header> 
				<div> 	Order Number: {{ $cart->id }}  </div>
				<div>  	Purchaser: {{$cart->user->name }}</div>
				<div> 	Order Started: {{$cart->created_at}} </div>
				<div>   Order Subtotal: </div>
				<div>  	
					<a href="http://google.com">
						<button id="" class="btn btn-primary">Checkout</button>
					</a>
				</div>

			</header>
		</div>
	</div>
</div>


@endsection
