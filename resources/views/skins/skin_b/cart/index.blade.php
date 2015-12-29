@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-6">
			@each('skins.skin_b.order_item.show', $items, 'order_item')
		</div>

		<div class="col-md-6">
			<div class="row" style = 'margin-top:10px;'>

				<div> 	Order Number: {{ $cart->id }}  </div>
				<div>  	Purchaser: {{$cart->user->name }} </div>
				<div> 	Order Started: {{$cart->created_at}} </div>
				<div>   Order Subtotal: </div>

				<div class="dropdown"> 
					<button  class="btn btn-default dropdown-toggle" style="width:30%" type="button" id="dropdownMenu1"  data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">
					<span id="selected">Payment Options</span>
					    <span class="caret"></span>
					</button>
					  <ul class="dropdown-menu">
					  	<!-- via Stripe payment -->
					    <li><a href="#">Credit Card</a></li>
					    <li><a href="#">Pay Pal</a></li>
					    <li><a href="#">Bitcoin</a></li>
					    <li><a href="#">Apple Pay</a></li>
					    <li><a href="#">Android Pay</a></li>
					    <!-- to be implemented -->
					    <li><a href="#">Bank Draft</a></li>
					  </ul>
					  	<a href="/checkout">
							<button id="" class="btn btn-primary">Checkout</button>
						</a>
				</div>  	

			</div>
		</div>
	</div>
</div>


@endsection
