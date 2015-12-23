
<div class="row" style = 'margin-top:10px;'>

	<article id="order_item" style="border-bottom:1px solid e7e7e7; margin:10px">


		<section class="col-md-4">
			<a href="{{ route('products.show', $order_item->product->id) }}">
				<div>
					<img class="img-responsive img-rounded" src="{{ $order_item->product->image->url_location }}" >
				</div>
			</a>
		</section>

	<form class="orderitem_remove">
		<section class ="col-md-4">
			
				<div>Quantity: {{ $order_item->quantity}}</div>
				<div>Price: {{ $order_item->price  }} </div>
				<div>Item SubTotal: {{ $order_item->price * $order_item->quantity  }} </div>

				<input type="hidden" name="id" value="{{ $order_item->id  }}">
				<input type="hidden" name="quantity" value="{{ $order_item->quantity  }}">
		</section>
		<section class="col-md-4">
			<button id="quantity_change" class="btn btn-success">Change Quantity</button>
			<button type="submit" class="btn btn-danger">Remove</button>
		</section>

	</form>

	</article>


</div>