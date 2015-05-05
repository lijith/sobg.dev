@extends('admin.layout')

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

          <div class="clearfix">
            {!! $yatra->highlights !!}
          </div>
          
          <hr />  

          <p>
            <a href="{{ route('yatra.show',array('itenarary',$yatra->id)) }}">Iternarary &amp; Cost</a> | 
            <a href="{{ route('yatra.edit',array('highlight',$yatra->id)) }}">Edit</a>
          </p>

        @elseif($part == 'itenarary')

          <div class="clearfix">
            {!! $yatra->itenary_cost !!}
          </div>  

          <hr />  

          <p>
            <a href="{{ route('yatra.show',array('highlight',$yatra->id)) }}">Highlight</a> | 
            <a href="{{ route('yatra.edit',array('itenarary',$yatra->id)) }}">Highlight</a>
          </p>

        @endif  
      </div>
    </section>
	</div>
</div>
@stop
