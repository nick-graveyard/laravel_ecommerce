
<article id="product" class="row" style="margin: 1em">

		<section class="col-md-3">
			<a href="{{ route('products.show', $product->id) }}">
				<img class="img-responsive img-rounded" src="{{ $product->image->url_location }}" >
			</a>
		</section>

		<section class ="col-md-9">
			<form class="orderitem_add" action="">
			 	
					<h4>
						<a href="{{ route('products.show', $product->id) }}">
							<span class="product_name">{{ $product->name }}</span>
						</a> 
					</h4>

				<div class="form-group">
					<div>{{ $product->description }}</div>
					<div>Price: {{ $product->price }}</div>
					<div>
						 Quantity: <input type="number" name="quantity" value="1" style="text-align:right; width:4em; border: 0px; border-radius: 0px; "> </span>
					</div>
				</div>

				<input type="hidden" name="id" value="{{ $product->id  }}">
				<button type="submit" class="btn btn-primary">Add to cart</button>
			</form>
		</section>



</article>