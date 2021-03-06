@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Archives
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          News Archives
      </header>
      <div class="panel-body">
        <div class="crearfix">
          <a href="{{ route('events.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Archive</a>
        </div><!-- /.crearfix -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Title</th>
	          </thead>
            <tbody>
              @foreach($archives as $archive)
                <tr>
                  <td>
                    <a href="{{ route('archives.show', array($archive->id)) }}">{{$archive->title}}</a>
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
