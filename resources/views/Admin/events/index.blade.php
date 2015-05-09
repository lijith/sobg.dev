@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Events
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Events List
      </header>
      <div class="panel-body">
        <div class="crearfix">
          <a href="{{ route('events.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New Event</a>
        </div><!-- /.crearfix -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Title</th>
	              <th>Start Date</th>
	              <th>End Date</th>
	          </thead>
            <tbody>
              @foreach($events as $event)
                <tr>
                  <td>
                    <a href="{{ action('\App\Http\Controllers\Admin\EventController@show', array($event->id)) }}">{{$event->title}}</a>
                  </td>
                  <td>{{$event->start_date}}</td>
                  <td>{{$event->end_date}}</td>
                </tr>
              @endforeach
            </tbody>
	        </table>
    </div>
      </div>
    </section>
  </div>

</div> 


@stop
