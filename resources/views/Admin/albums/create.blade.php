@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Add New Album
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          New Album
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('album.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group {{ ($errors->has('album-cover-photo')) ? 'has-error' : '' }}">
                <label>Album Cover Photo</label>
                <input type="file" id="album-cover-photo" name="album-cover-photo">
                <p class="help-block">Cover photo of album(jpg, png files only)</p>
                {{ ($errors->has('album-cover-photo') ? $errors->first('album-cover-photo') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('album-title')) ? 'has-error' : '' }}">
                <label>Album Title</label>
                <input class="form-control" placeholder="Title" name="album-title" type="text"  value="{{ Input::old('album-title') }}">
                <span class="help-block">Album title</span>
                {{ ($errors->has('album-title') ? $errors->first('album-title') : '') }}

            </div>

            <div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
                <label>Album Details</label>
                <textarea rows="6" class="form-control" name="description">{{ Input::old('description') }}</textarea>
                <span class="help-block">Album details</span>
                {{ ($errors->has('description') ? $errors->first('description') : '') }}
            </div>

            
            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') }}</textarea>
                <span class="help-block">Some keywords</span>
                {{ ($errors->has('keywords') ? $errors->first('keywords') : '') }}
            </div>

           
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" type="submit">

        </form>
      </div>
    </section>
	</div>
</div>
@stop
