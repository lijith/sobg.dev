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
		<td>Shipping Address</td>
		<td>:</td>
		<td>
			{{ ucwords($shipping->shipping_name)}}<br />
			{{ $shipping->shipping_address_1 }}<br />
			{{ $shipping->shipping_address_2 }}<br />
			{{ ucwords($shipping->shipping_city) }}, {{ ucwords($shipping->shipping_state) }}, {{ ucwords($shipping->shipping_country) }}<br />
			ph: {{ $shipping->shipping_contact_number_1 }}, {{ $shipping->shipping_contact_number_2 }}<br />
			e-mail {{ $shipping->shipping_email }}
		</td>
	</tr>
	<tr>
		<td>Billing Address</td>
		<td>:</td>
		<td>
			{{ ucwords($shipping->billing_name)}}<br />
			{{ $shipping->billing_address_1 }}<br />
			{{ $shipping->billing_address_2 }}<br />
			{{ ucwords($shipping->billing_city) }}, {{ ucwords($shipping->billing_state) }}, {{ ucwords($shipping->billing_country) }}<br />
			ph: {{ $shipping->billing_contact_number_1 }}, {{ $shipping->billing_contact_number_2 }}<br />
			e-mail {{ $shipping->billing_email }}
		</td>
	</tr>

	<tr>
		<td>Orders</td>
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