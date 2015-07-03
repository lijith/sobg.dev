@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($yatra->name)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($yatra->name)}}
      </header>
      <div class="panel-body">
        @if($part == 'highlight')

          <div class="admin-yatra-show">

            <div class="clearfix">
              {!! $yatra->highlights !!}
            </div>

          </div><!-- /.admin-yatra-show -->
          <hr />

          <p>
            <a href="{{ route('yatra.show',array('itenarary',$yatra->id)) }}">Iternarary &amp; Cost</a> |
            <a href="{{ route('yatra.edit',array('highlight',$yatra->id)) }}">Edit Highlight</a>
          </p>

        @elseif($part == 'itenarary')

          <div class="admin-yatra-show">

            <div class="clearfix">
              {!! $yatra->itenary_cost !!}
            </div>

          </div><!-- /.admin-yatra-show -->

          <hr />

          <p>
            <a href="{{ route('yatra.show',array('highlight',$yatra->id)) }}">Highlight</a> |
            <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit Iternarary</a>
          </p>

        @endif
      </div>
    </section>
	</div>
</div>
@stop
