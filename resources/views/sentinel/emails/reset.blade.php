@extends('emails.base-layout')

@section('content')
		<h2>Password Reset</h2>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<p>To reset your password, <a href="{{ route('member.reset.form', [$hash, urlencode($code)]) }}">click here.</a>  If you did not request a password reset, you can safely ignore this email - nothing will be changed.</p>
					<p>Or point your browser to this address: <br /> {{ route('member.reset.form', [$hash, urlencode($code)]) }}</p>
					<p>Thank you, <br />
					~The Admin Team</p>
				</td>
			</tr>
		</table>



@stop