@extends('Admin.layout')

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
          <a href="{{ route('yatra.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> New Yatra</a>
        </div><!-- /.crearfix -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Title</th>
	              <th>Highlight</th>
	              <th>Itenarary & Cost</th>
                <th>Tips</th>
                <th>&nbsp;</th>
	          </thead>
            <tbody>
              @foreach($yatras as $yatra)
                <tr>
                  <td>
                    {{$yatra->name}}
                  </td>
                  <td>
                    <a href="{{ route('yatra.show',array('highlight',$yatra->id)) }}">Show</a> |
                    <a href="{{ route('yatra.edit',array('highlight',$yatra->id)) }}">Edit</a>
                  </td>
                  <td>
                    <a href="{{ route('yatra.show',array('itenarary',$yatra->id)) }}">Show</a> |
                    <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit</a>
                  </td>
                  <td>
                    <a href="{{ route('yatra.show',array('tips',$yatra->id)) }}">Show</a> |
                    <a href="{{ route('yatra.edit',array('tips',$yatra->id)) }}">Edit</a>
                  </td>

                  <td>
                    <form action="{{ route('yatra.destroy', array($yatra->id)) }}" method="POST" >
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        <input name="_method" value="DELETE" type="hidden">

                       <button type="submit" class="btn btn-default">Remove</button>
                    </form>
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
