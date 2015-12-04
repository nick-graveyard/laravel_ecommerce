@extends('skins.skin_b.master')

@section('content')
	<div class="row">

		<div id="user_image">
		{{ $user->profile->image->url_location or 'Image not supplied' }} 
		</div>

		<div id="user_about">
		{{ $user->profile->about_me or 'Bio not supplied' }} 

		</div>

		<div id="user_id">
			{{ $user->id }}
		</div>

		<div id="user_name">
			{{ $user->name}}
		</div>

		<div id="user_email">
			{{ $user->email }}
		</div>

		<div id ="order_history">
			@foreach ($user->orders as $order)
			    {{ $order->id  }} <br/>
			    {{ $order->created_at }} <br/>

			    @foreach($order->items as $item)
			    	{{ $item->id}} <br/>
			    @endforeach
			@endforeach
		</div>

	</div>
@endsection
