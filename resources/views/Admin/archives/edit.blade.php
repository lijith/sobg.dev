@extends('Admin.layout')

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
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('archives.update',$archive->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Edit Archive</h2>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group {{ ($errors->has('archive-title')) ? 'has-error' : '' }}">
                        <label>Article Title</label>
                        <input class="form-control" placeholder="Article Title" name="archive-title" type="text"  value="{{ Input::old('archive-title') ? Input::old('archive-title') : $archive->title }}">
                        <span class="help-block">Avoid special characters in title</span>
                        {{ ($errors->has('archive-title') ? $errors->first('archive-title') : '') }}

                    </div>
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="form-group {{ ($errors->has('publish-date')) ? 'has-error' : '' }}">
                         <label>Article Date</label>
                        <input class="form-control" placeholder="" name="publish-date" type="text"  value="{{ Input::old('archive-title') ? Input::old('archive-title') : \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $archive->date)->format('m/d/Y') }}" id="publish-date">
                        {{ ($errors->has('publish-date') ? $errors->first('publish-date') : '') }}
                    </div>
                </div><!-- /.col-md-4 -->
            </div>



            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Archive Detail</label>
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
                <label>Keywords</label>
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
