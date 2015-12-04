@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Shirtvana Transcendence</div>

				<div class="panel-body">
						
						{{-- product index loop --}}
						@each('skins.skin_b.product.show', $products, 'product')


					    {{-- pagination --}}
					    {!! $products->render() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
