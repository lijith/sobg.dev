@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Photo Albums
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Photo Albums
      </header>
      <div class="panel-body">

        <div class="clearfix">
          <a href="{{ route('album.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Album</a>
        </div><!-- /.crearfix -->
        
        <hr />

        @if($albums->count() > 0)

        <div class="clearfix">
          <div class="media-gal">
            @foreach($albums as $album)
              <div class="images item">
                <a href="{{ route('album.show',array($album->id)) }}">
                  <img alt="" src="{{asset('images/albums/'.$album->cover_photo_thumbnail)}}">
                </a>
                <br />
                  <strong>
                    <a href="{{ route('album.show',array($album->id)) }}">
                      {{ucwords($album->title)}}</strong>
                    </a>  
                  <br />({{$album->photos_number}}) Photos
                <p>
                <form method="POST" action="{{ route('album.destroy', array($album->id)) }}">
                  <input name="album-id" value="{{ $album->id }}" type="hidden">
                  <input name="_token" value="{{ csrf_token() }}" type="hidden">
                  <input name="_method" value="DELETE" type="hidden">
                  <button type="submit" class="btn">
                    <i class="fa fa-trash"></i> Delete
                  </button>
                </form>
               </p>
              </div><!-- /.images item -->
            @endforeach
            
          </div><!-- /.media-gal -->

          {!!$albums->render()!!}

        </div><!-- /.clear-fix -->

        @else
          <p>No Albums</p>
        @endif
      	
      </div>
    </section>
  </div>

</div> 


@stop
