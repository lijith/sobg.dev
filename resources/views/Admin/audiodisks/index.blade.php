@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Audio Disks
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Audio Disk List
      </header>
      <div class="panel-body">

        <div class="crearfix">
          <a href="{{ route('audiodisks.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Audio Disk</a>
        </div><!-- /.crearfix -->
        <div class="disk-type-links">
          <a href="{{route('audiodisks.list')}}">All Disks</a> | 
          <a href="{{route('audiodisks.list.type',array('acd'))}}">Audio CD</a> |  
          <a href="{{route('audiodisks.list.type',array('mp3'))}}">MP3</a>
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
