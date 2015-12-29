Ï@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
					
						{{-- product index loop --}}
						@each('skins.skin_b.product.show_short', $products, 'product')
		</div>

	</div>
	<div class="row">
		<div class="col-md-12 text-center">
					    {{-- pagination --}}
					    {!! $products->render() !!}
		</div>
	</div>
</div>
@endsection
