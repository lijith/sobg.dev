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

        @elseif($part == 'itenarary')

          <div class="admin-yatra-show">

            <div class="clearfix">
              {!! $yatra->itenary_cost !!}
            </div>

          </div><!-- /.admin-yatra-show -->

        @elseif($part == 'tips')

          <div class="admin-yatra-show">

            <div class="clearfix">
              {!! $yatra->tips !!}
            </div>

          </div><!-- /.admin-yatra-show -->

        @endif
          <hr />

          <p>

            <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit Highlight
            </a> |
            <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Edit Itinerary
            </a> |
            <a href="{{ route('yatra.edit',array('tips',$yatra->id)) }}">Edit Tips
          </p>

      </div>
    </section>
	</div>
</div>
@stop
