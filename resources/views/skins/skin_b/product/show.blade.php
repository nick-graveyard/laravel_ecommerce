
<article id="product" class="row" style="margin: 1em">

		<section class="col-md-3">
			<a href="{{ route('products.show', $product->id) }}">
				<img class="img-responsive img-rounded" src="{{ $product->image->url_location }}" >
			</a>
		</section>


		<section class="col-md-9 button_stage">
			<h4>
				<a href="{{ route('products.show', $product->id) }}">
					<span class="product_name">{{ $product->name }}</span>
				</a> 
			</h4>
			<div>{{ $product->description }}</div>
			<div>Price: {{ $product->price }}</div>
			<div>Category: {{$product->category->name}}</div>
			<div>Added: {{ $product->created_at }}</div>
			<div>
				<span>Product Id:</span>
				<span class="product_id"> {{$product->id}} </span>
			</div>
			<div>
				<span>Quantity:</span>
				<span class="product_quantity">1</span>
			</div>

			{{--
				very important: this button is linked to the 
			--}}

			<button type="button" class="btn btn-primary post_to_cart">Add to cart</button>
			
		</section>



</article>