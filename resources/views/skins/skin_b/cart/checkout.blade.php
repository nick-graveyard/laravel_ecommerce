@extends('skins.skin_b.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<header> 
				<div> 	Order Number:  </div>
				<div>  	Purchaser: </div>
				<div> 	Order Started </div>
				<div>   Order Subtotal: </div>	
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<article>
					<h3> User </h3>
					<div> 	First Name:  </div>
					<div>  	Last Name: </div>
					<div> 	Company: </div>
					<div> 	Contact Phone: </div>
					<div>   Email:	</div>
			</article>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">
				<article>
				<h3> Mailing Address </h3>
					<div>	Street Address: </div>
					<div>	Street Address(2): </div>
					<div>   State/Province:</div>
					<div> 	Zip/Postal Code: </div>
					<div> 	Country: </div>

				</article>
			</div>
			<div class="col-md-6">
				<article>
				<h3> Billing Address </h3>
					<div>	Street Address: </div>
					<div>	Street Address(2): </div>
					<div>   State/Province:</div>
					<div> 	Zip/Postal Code: </div>
					<div> 	Country: </div>
				</article>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<article>
				<h3> Payment information </h3>
					<form action="/final" method="POST" id="payment-form">
					  <span class="payment-errors"></span>

					  <div class="form-row">
					    <label>
					      <span>Card Number</span>
					      <input type="text" size="20" data-stripe="number"/>
					    </label>
					  </div>

					  <div class="form-row">
					    <label>
					      <span>CVC</span>
					      <input type="text" size="4" data-stripe="cvc"/>
					    </label>
					  </div>

					  <div class="form-row">
					    <label>
					      <span>Expiration (MM/YYYY)</span>
					      <input type="text" size="2" data-stripe="exp-month"/>
					    </label>
					    <span> / </span>
					    <input type="text" size="4" data-stripe="exp-year"/>
					  </div>
					  	<input name="name" id="id" type="checkbox" checked="checked">
					 	<label>Save user profile and payment info for future shopping?</label>
						<div></div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit">Proceed to final confirmation</button>
					</form>
			</article>
		</div>
	</div>

</div>
@endsection
