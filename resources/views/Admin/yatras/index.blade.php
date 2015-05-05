@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Yatras
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Yatras
      </header>
      <div class="panel-body">
        <div class="crearfix">
          <a href="{{ route('events.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create New Event</a>
        </div><!-- /.crearfix -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Title</th>
	              <th>Highlight</th>
	              <th>Itenarary & Cost</th>
	          </thead>
            <tbody>
              @foreach($yatras as $yatra)
                <tr>
                  <td>
                    {{$yatra->name}}
                  </td>
                  <td>
                    <a href="{{ route('yatra.show',array('highlight',$yatra->id)) }}">Show</a> | 
                    <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit</a>
                  </td>
                  <td>
                    <a href="{{ route('yatra.show',array('highlight',$yatra->id)) }}">Show</a> | 
                    <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit</a>
                  </td>
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
