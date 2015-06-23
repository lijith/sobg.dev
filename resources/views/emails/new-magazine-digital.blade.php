@extends('emails.base-layout')

@section('content')

	<h2>{{ucwords($magazine->title)}}</h2>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
      	<td valign="middle" width="30%">
      		<img src="{{ asset('images/magazines/'.$magazine->cover_photo_thumbnail) }}" alt="Magazine Cover" style="width:100%">
      	</td>
      	<td width="70%">
      		<p style="margin-left: 10px">
      			{{ $magazine->excerpt }}

      		</p>
      		<p style="margin-left: 10px">
						<a href="{{ url('/').'/members/login' }}" style="display: block; background: #d86a12; color:#FFF; width:150px; text-align: center; padding: 10px; font-weight: bold" title="Login to read">Login To Read</a>
					</p>
      	</td>
      	<td>
      		
      	</td>
      </tr>
	</table>
	

@stop