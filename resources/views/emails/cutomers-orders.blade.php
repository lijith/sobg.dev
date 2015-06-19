@extends('emails.base-layout')

@section('content')

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>Order ID</td>
		<td>:</td>
		<td>{{ $shipping->reference_id }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>:</td>
		<td>{{ $shipping->amount }}</td>
	</tr>
	<tr>
		<td>Your Orders</td>
		<td>:</td>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				@foreach ($orders as $order)
					<tr>
						<td>{{ ucwords($order['title']) }}</td>
						<td>:</td>
						<td>{{ $order['quantity']) }}</td>
					</tr>
				@endforeach
			</table>

		</td>
	</tr>
</table>


@stop