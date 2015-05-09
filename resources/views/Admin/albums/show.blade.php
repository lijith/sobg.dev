@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($album->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($album->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-6">

                <section class="in-panel">
                    <span class="label label-primary">Cover</span> <br /><br />
                    <img src="{{asset('images/albums/'.$album->cover_photo)}}" class="img-responsive" alt=""> 
                  </section>
                
            </div><!-- /.col-md-8 -->
            <div class="col-md-6">
              <form action="{{ route('album.photo.upload', array($album->id)) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" >
                <input name="_token" value="{!! csrf_token() !!}" type="hidden">

                <div class="form-group">
                  <label>Upload Photos</label>
                  <input type="file" name="album-photo[]" multiple />
                  <p class="help-block">(jpg/png files only file size below 2mb)</p>

                  <button type="submit" class="btn btn-primary">Upload photos</button>
                </div><!-- /.form-group -->
                
              </form>
            </div><!-- /.col-md-6 -->
            
        </div><!-- /.row -->

        <section class="in-panel">
            <span class="label label-primary">Detail</span> <br /><br />
            {!!$album->description!!}
        </section>

        <hr />
        <div class="clearfix">
          <div class="media-gal">
            @foreach($photos as $photo)
              <div class="images item">
                <a href="#">
                  <img alt="" src="{{asset('images/albums/'.$photo->image_thumbnail)}}">
                </a>
                <p>
                <form method="POST" action="{{ route('album.photo.delete', array($photo->id)) }}">
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

        {!! $photos->render() !!}

        </div><!-- /.clear-fix -->

        <hr />
        <hr />


        <div class="panel-body">
            
            <form action="{{ route('album.destroy', array($album->id)) }}" method="POST" class="delete-request-form">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="_method" value="DELETE" type="hidden">
            <a href="{{ route('album.edit', array($album->id)) }}" class="btn btn-success confirm-edit">
              <i class="fa fa-pencil-square-o"></i> Edit Album
            </a>
            <button type="submit" class="btn btn-danger confirm-delete">
              <i class="fa fa-trash-o"></i> Remove Album
            </button>
            </form>



        </div>

      </div>
    </section>
	</div>
</div>
@stop
