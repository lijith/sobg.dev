@extends('emails.base-layout')

@section('content')

	<h1 style="text-align: center">{{ ucwords($yatra['title']) }}</h1>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Name</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['name']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Gender</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['gender']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Date of Birth</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['dob']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Nationality</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['nationality']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Bloog Group</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['blood_group']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Passport Name</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['passport_name']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Passport Number</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['passport_number']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Address</td>
			<td style="padding-bottom: 10px;">
			{{ ucwords($yatra['address_line_1']) }} <br />
			{{ ucwords($yatra['address_line_2']) }} <br />
			{{ ucwords($yatra['city']) }} <br />
			{{ ucwords($yatra['state']) }} <br />
			{{ ucwords($yatra['country']) }}
			</td>
		</tr>
		@if ($yatra['accompanying_persons'] != '')
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Accompanying Persons</td>
				<td style="padding-bottom: 10px;">{{ ucwords($yatra['accompanying_persons']) }}</td>
			</tr>
		@endif

		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Mobile Number</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['contact_mobile']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">Landline Number</td>
			<td style="padding-bottom: 10px;">{{ ucwords($yatra['contact_landline']) }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px">email</td>
			<td style="padding-bottom: 10px;">{{ $yatra['email'] }}</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Special Requirments</td>
			<td style="padding-bottom: 10px;">
			{{ nl2br(ucwords($yatra['special_requirement'])) }}
			</td>
		</tr>
		<tr style="font-size: 16px;">
			<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Yatra Package</td>
			<td style="padding-bottom: 10px;">
			{{ $yatra['yatra_package'] }}
			</td>
		</tr>
		@if ($yatra['payment_mode'] == 'dd')
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">DD Number</td>
				<td style="padding-bottom: 10px;">
				{{ $yatra['dd_number'] }}
				</td>
			</tr>
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Date</td>
				<td style="padding-bottom: 10px;">
				{{ $yatra['dd_date'] }}
				</td>
			</tr>
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Bank</td>
				<td style="padding-bottom: 10px;">
				{{ ucwords($yatra['dd_bank']) }}
				</td>
			</tr>
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Amount</td>
				<td style="padding-bottom: 10px;">
				{{ $yatra['dd_amount'] }}
				</td>
			</tr>
		@elseif($yatra['payment_mode'] == 'transfer')
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Bank Transfer Date</td>
				<td style="padding-bottom: 10px;">
				{{ $yatra['bank_transfer_date'] }}
				</td>
			</tr>
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Bank</td>
				<td style="padding-bottom: 10px;">
				{{ ucwords($yatra['bank_transfer_bank']) }}
				</td>
			</tr>
			<tr style="font-size: 16px;">
				<td style="text-align: right;padding-right: 10px;padding-bottom: 10px; vertical-align: top">Yatra Package</td>
				<td style="padding-bottom: 10px;">
				{{ $yatra['yatra_package'] }}
				</td>
			</tr>
		@endif


	</table>

@stop