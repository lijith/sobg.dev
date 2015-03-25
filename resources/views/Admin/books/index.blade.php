@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Add New Book
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          New Book
      </header>
      <div class="panel-body">

        <div class="crearfix">
          <a href="{{ route('books.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Book</a>
        </div><!-- /.crearfix -->
        <div class="disk-type-links">
          <a href="{{route('books.list')}}">All Disks</a> | 
          <a href="{{route('books.list.type',array('sobg'))}}">By School</a> |  
          <a href="{{route('books.list.type',array('other'))}}">By Others</a>
        </div><!-- /.disk-type-links -->
        <hr />
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th class="col-md-4">Title</th>
                <th class="col-md-2">Audio CD/MP3</th>
	              <th class="col-md-3">Price</th>
	              <th class="col-md-3">Publish Date</th>
	          </thead>
            <tbody>
              @foreach($disks as $disk)
                <tr>
                  <td>
                    
                    <a href="{{ action('\App\Http\Controllers\Admin\AudioDiskController@show', array($disk->id)) }}">
                      <img src="{{asset('images/audio-disks/'.$disk->cover_photo_thumbnail)}}" alt="cover photo" class="img-responsive" />
                      <br />
                      <strong>{{ucwords($disk->title)}}</strong>
                    </a>
                  </td>
                  <td>
                    @if($disk->disk_type == 1) <span class="label label-primary">Audio CD</span>
                    @elseif($disk->disk_type == 2) <span class="label label-primary">MP3</span>

                    @endif
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
