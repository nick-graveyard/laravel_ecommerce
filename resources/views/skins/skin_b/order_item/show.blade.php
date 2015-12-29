
<div class="row" style = 'margin-top:10px;'>

	<article id="order_item">


		<section class="col-md-4">
			<a href="{{ route('products.show', $order_item->product->id) }}">
				<div>
					<img class="img-responsive img-rounded" src="{{ $order_item->product->image->url_location }}" >
				</div>
			</a>
		</section>

	<form class="orderitem_remove">
		<section class ="col-md-4 col-md-offset-1">
			
				<div>Quantity: {{ $order_item->quantity}}</div>
				<div>Price: {{ $order_item->price  }} </div>
				<div>Item SubTotal: {{ $order_item->price * $order_item->quantity  }} </div>
				<button id="quantity_change" class="btn btn-success btn-block">Change Quantity</button>
				<button type="submit" class="btn btn-danger btn-block">Remove</button>
				<input type="hidden" name="id" value="{{ $order_item->id  }}">
				<input type="hidden" name="quantity" value="{{ $order_item->quantity  }}">
		</section>
		<section>
			
		</section>

	</form>

	</article>


</div>