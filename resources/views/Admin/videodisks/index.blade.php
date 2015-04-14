@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Video Disks
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
        <div class="disk-type-links">
          <a href="{{route('videodisks.list')}}">All</a> | 
          <a href="{{route('videodisks.list.type',array('dvd'))}}">DVD</a> |  
          <a href="{{route('videodisks.list.type',array('vcd'))}}">VCD</a>
        </div><!-- /.disk-type-links -->
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th class="col-md-4">Title</th>
                <th class="col-md-2">DVD/VCD</th>
	              <th class="col-md-3">Price</th>
	              <th class="col-md-3">Publish Date</th>
	          </thead>
            <tbody>
              @foreach($disks as $disk)
                <tr>
                  <td>
                    
                    <a href="{{ action('\App\Http\Controllers\Admin\VideoDiskController@show', array($disk->id)) }}">
                      <strong>{{ucwords($disk->title)}}</strong>
                    </a>
                  </td>
                  <td>
                    @if($disk->disk_type == 1) <span class="label label-primary">DVD</span>
                    @elseif($disk->disk_type == 2) <span class="label label-primary">VCD</span>

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
