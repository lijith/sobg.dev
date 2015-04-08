@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Magazines
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Magazines
      </header>
      <div class="panel-body">

        <div class="clearfix">
          <a href="{{ route('magazines.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Edition</a>
        </div><!-- /.crearfix -->
        
        <hr />

        <div class="row">
          @foreach($magazines as $magazine)
            <div class="col-md-4">
              <div class="item-wrap">
                <div class="pic-wrap">
                  <a href="{{ route('magazines.show', array($magazine->id)) }}">
                    <img class="img-responsive" src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" />
                  </a>
                </div><!-- /.pic-wrap -->
              <br />
              <a href="{{ route('magazines.show', array($magazine->id)) }}">
                <strong>{{ucwords($magazine->title)}}</strong>
              </a>
              <br />
              {{$magazine->published_at}}
              </div><!-- /.item-wrap -->
            </div><!-- /.col-md-4 -->
          @endforeach
        </div><!-- /.row -->
      	{!!$magazines->render()!!}
      </div>
    </section>
  </div>

</div> 


@stop
