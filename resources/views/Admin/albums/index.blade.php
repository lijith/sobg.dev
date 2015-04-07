@extends('admin.layout')

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

        <div class="crearfix">
          <a href="{{ route('album.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Album</a>
        </div><!-- /.crearfix -->
        
        <hr />
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th class="col-md-4">Album Title</th>
	              <th class="col-md-3">Pictures no:</th>
	          </thead>
            <tbody>
              @foreach($albums as $album)
                <tr>
                  <td>
                    
                    <a href="{{ route('album.show',array($album->id)) }}">
                      <img src="{{asset('images/albums/'.$album->cover_photo_thumbnail)}}" alt="cover photo" class="img-responsive" />
                      <br />
                      <strong>{{ucwords($album->title)}}</strong>
                    </a>
                  </td>
                  <td>{{$album->photos_number}}</td>
                </tr>
              @endforeach
            </tbody>
	        </table>

          {!!$albums->render()!!}
    </div>
      </div>
    </section>
  </div>

</div> 


@stop
