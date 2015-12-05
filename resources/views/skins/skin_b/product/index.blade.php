@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
					
						{{-- product index loop --}}
						@each('skins.skin_b.product.show', $products, 'product')


					    {{-- pagination --}}
					    {!! $products->render() !!}


	</div>
</div>
@endsection
