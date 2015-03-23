@extends('admin.layout')

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
          Video Disk List
      </header>
      <div class="panel-body">
        <div class="crearfix">
          <a href="{{ route('videodisks.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Video Disk</a>
        </div><!-- /.crearfix -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th>Title</th>
	              <th>Price</th>
	              <th>Publish Date</th>
	          </thead>
            <tbody>
              @foreach($disks as $disk)
                <tr>
                  <td>
                    <img src="{{asset('images/video-disks/'.$disk->cover_photo_thumbnail)}}" alt="cover photo" class="img-responsive" width="150px" />
                    <a href="{{ action('\App\Http\Controllers\Admin\VideoDiskController@show', array($disk->id)) }}"><br />
                    <strong>{{ucwords($disk->title)}}</strong></a>
                  </td>
                  <td>{{$disk->price}}</td>
                  <td>{{$disk->published_at}}</td>
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
