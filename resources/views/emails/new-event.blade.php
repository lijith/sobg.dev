@extends('emails.base-layout')

@section('content')

	<h2>{{ucwords($event->title)}}</h2>

      <?php 
            $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date);
            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->end_date);
      ?>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
      	<td valign="top" width="30%">
      		<img src="{{ asset('images/events/'.$event->cover_photo_thumbnail) }}" alt="Cover picture" style="width:90%">
      	</td>
      	<td width="70%">
      		<p style="margin-left: 10px">
                        <h3>Event
                        @if($start_date->diffInDays($end_date) > 0)
                        From <span style="color:#d86a12;">{{$start_date->format('Y M, d')}}</span> To <span style="color:#d86a12;">{{$end_date->format('Y M, d')}}</span>
                        @else
                        On <span style="color:#d86a12;">{{$start_date->format('Y M, d')}}</span>
                        @endif
                        </h3>
      			{{ $event->excerpt }}

      		</p>
      		<p style="margin-left: 10px">
                        
      			<a href="{{ url('/').'/events/'.$event->slug }}" style="display: block; background: #d86a12; color:#FFF; width:150px; text-align: center; padding: 10px; font-weight: bold" title="more information">Click For More Information</a>
      		</p>
      	</td>
      	<td>
      		
      	</td>
      </tr>
	</table>
	

@stop