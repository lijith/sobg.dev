@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($disk->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($disk->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-6">

                <section class="in-panel">
                    <span class="label label-primary">Cover</span> <br /><br />
                    <img src="{{asset('images/video-disks/'.$disk->cover_photo)}}" class="img-responsive" alt="">
                  </section>

            </div><!-- /.col-md-8 -->
            <div class="col-md-6">
                <div class="in-panel">
                  <span class="label label-primary">
                    <strong>
                      {{($disk->disk_type == 1)?'DVD':'VCD'}}
                    </strong>
                  </span>
                </div>

                <div class="in-panel">
                  <span class="label label-primary">Author</span> <br /><br />
                  <strong>{{$disk->author}}</strong>
                </div>

                <div class="in-panel">
                  <span class="label label-primary">Publish Date</span> <br /><br />
                  From <strong>{{$disk->published_at}}</strong>
                </div>


            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->






            <section class="in-panel">
                <span class="label label-primary">Disk Detail</span> <br /><br />
                <div class="back-content">
                  {!!$disk->details!!}
                </div>
            </section>

            <section class="in-panel">
                <span class="label label-primary">Excerpt</span> <br /><br />
                 <i>{{$disk->excerpt}}</i>
            </section>

            @if($disk->youtube_link != '')
              <section class="in-panel">
                  <!-- 4:3 aspect ratio -->
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$disk->youtube_link}}"></iframe>
                  </div>
              </section>
            @endif

            <div class="panel-body">

                <form action="{{ action('\App\Http\Controllers\Admin\VideoDiskController@destroy', array($disk->id)) }}" method="POST" class="delete-request-form">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">
                <a href="{{ route('videodisks.edit', array($disk->id)) }}" class="btn btn-success confirm-edit">
                  <i class="fa fa-pencil-square-o"></i> Edit
                </a>
                <button type="submit" class="btn btn-danger confirm-delete">
                  <i class="fa fa-trash-o"></i> Remove
                </button>
                </form>



            </div>

      </div>
    </section>
	</div>
</div>
@stop
