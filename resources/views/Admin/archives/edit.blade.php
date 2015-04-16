@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($archive->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($archive->title)}}
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li></li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('archives.update',$archive->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Edit Event</h2>

            <div class="form-group {{ ($errors->has('archive-title')) ? 'has-error' : '' }}">
                <label>Event Title</label>
                <input class="form-control" placeholder="Event Title" name="archive-title" type="text"  value="{{ Input::old('archive-title') ? Input::old('archive-title') : $archive->title }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('archive-title') ? $errors->first('archive-title') : '') }}

            </div>

            

            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Event Detail</label>
                <textarea rows="6" class="form-control" id="ckeditor1" name="details">{!! Input::old('details') ? Input::old('details') : $archive->details !!}</textarea>
                <span class="help-block">Full detail of the archive</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') ? Input::old('excerpt') : $archive->excerpt }}</textarea>
                <span class="help-block">Small description of archive(this shows in the home page archives)</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Event Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') ? Input::old('keywords') : $archive->keywords }}</textarea>
                <span class="help-block">Some keywords of archive eg place,name of guests etc. Each keyword seperated by comma</span>
                {{ ($errors->has('keywords') ? $errors->first('keywords') : '') }}
            </div>

            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">

        </form>
      </div>
    </section>
	</div>
</div>
@stop
