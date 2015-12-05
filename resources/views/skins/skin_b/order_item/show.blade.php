
<div class="row">

	<article id="order_item">


		<section class="col-md-2">
			@include('skins.skin_b.product.product_thumb', ['product' => $order_item->product] )
		</section>

		<section class ="col-md-10">
			<div>Quantity: {{ $order_item->quantity }} </div>
			<div>Price: {{ $order_item->price  }}  </div>
		</section>
	</article>


</div>