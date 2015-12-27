@extends('skins.skin_b.master')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div id="invoice_title">
				<p>Invoice</p>
			</div>
		</div>
	</div>
	
	<div class="row">
			<div class="col-md-4">
				<div id="invoice_address">
					<div> Some dude </div>
					<div> 1234 Some Street </div>
					<div> Some city, XX 70000</div>
					<div> 504-867-5309</div>	
				</div>
			</div>
			<div class="col-md-3 col-md-offset-5">
				<div id="invoice_logo">
				<img src="{{ asset('img/logo_temporary.jpg') }}" class="img-responsive" alt="Responsive image">
				</div>
			</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<table class="table table-striped table-bordered table-responsive"> 
				<tr>
					<td> Order Number:</td>
					<td> 123455123</td> 
				</tr>
				<tr> 
					<td>Order Date:</td>
					<td> 2015-01-01 </td>
				</tr>
				<tr> 
					<td>Order Total:</td>
					<td> $1600.00 </td>
				</tr>	
			</table>
		</div>

	</div>

	<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-responsive"> 
					<tr>
						<th> Item</th>
						<th> Description </th> 
						<th> Unit Cost </th>
						<th> Quantity </th>
						<th> Price </th>
					</tr>
				</table>
			<div>



	</div>

</div>
@endsection
