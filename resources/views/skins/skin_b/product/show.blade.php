
<article id="product" class="row" style="margin: 1em">

	<section class="col-md-3">
		<a href="{{ route('products.show', $product->id) }}">
			<img class="img-responsive img-rounded" src="{{ $product->image->url_location }}" >
		</a>
	</section>


	<section class="col-md-9">
		<h4><a href="{{ route('products.show', $product->id) }}">{{ $product->name }} </a> </h4>
		<div>{{ $product->description }}</div>
		<div>Price: {{ $product->price }}</div>
		<div>Category: {{$product->category->name}}</div>
		<div>Added: {{ $product->created_at }}</div>
		<div>Id: {{$product->id}}</div>
	</section>



</article>