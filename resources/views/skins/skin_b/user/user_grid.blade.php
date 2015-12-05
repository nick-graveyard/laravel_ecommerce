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