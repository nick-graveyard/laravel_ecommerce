@extends('skins.skin_b.master')

@section('content')
<div class="container" style="margin-top:20px">

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div id="invoice_title">
				<p>Invoice</p>
			</div>
		</div>
	</div>
	
	<div class="row">
			<div class="col-md-3 col-md-offset-1" style="text-align:center">
				<div style="margin-top:40px; border:solid 2px #dddddd; padding:10px; border-radius:5px">
							<div> Some Person </div>
							<div>1234 Some Street </div>
							<div>Some city, XX 70000</div>
							<div>504-867-5309</div>
							<div>504-867-5309</div>
				</div>

			</div>
			<div class="col-md-3 col-md-offset-4">
				<div id="invoice_logo">
				<img src="{{ asset('img/logo_temporary.jpg') }}" class="img-responsive" alt="Responsive image">
				</div>
			</div>
	</div>
	<div class="row">
			<div class="col-md-3 col-md-offset-1" style="text-align:center">
				<div style="margin-top:40px; border:solid 2px #dddddd; padding:10px; border-radius:5px">
							<div> Shirtvana </div>
							<div>1234 Some Street </div>
							<div>Some city, XX 70000</div>
							<div>504-867-5309</div>
							<div>504-867-5309</div>
				</div>
			</div>
		<div class="col-md-4 col-md-offset-3">
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
					<td> Subtotal:</td>
					<td> $14200.00</td> 
				</tr>
				<tr> 
					<td>Tax:</td>
					<td> $120.00</td>
				</tr>
				<tr> 
					<td>Amount Due:</td>
					<td> $1600.00 </td>
				</tr>	
			</table>
		</div>

	</div>

	<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-striped table-bordered table-responsive"> 
					<tr>
						<th> Item</th>
						<th> Description </th> 
						<th> Unit Cost </th>
						<th> Quantity </th>
						<th> Price </th>
					</tr>
				@foreach ($items as $item)
				    <tr>
					    <td>{{ $item->product->id }}</td>
					    <td>{{ substr($item->product->description, 1, 40) . '.....' }}</td>
					    <td>{{ $item->product->price }}</td>
					    <td>{{ $item->quantity }}</td>
					    <td>{{ $item->price }}</td>
				    </tr>
				@endforeach
				</table>
			<div>
	</div>

</div>
@endsection
