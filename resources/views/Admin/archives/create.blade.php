@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	News
@stop


@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          News
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li></li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('archives.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Create A Archive News</h2>

            <div class="form-group {{ ($errors->has('archive-title')) ? 'has-error' : '' }}">
                <label>Archive Title</label>
                <input class="form-control" placeholder="Archive Title" name="archive-title" type="text"  value="{{ Input::old('archive-title') }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('archive-title') ? $errors->first('archive-title') : '') }}

            </div>


            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Archive Detail</label>
                <textarea rows="6" class="form-control" id="ckeditor1" name="details">{{ Input::old('details') }}</textarea>
                <span class="help-block">Full detail of the archive</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') }}</textarea>
                <span class="help-block">Small description of archive(this shows in the home page archives)</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Archive Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') }}</textarea>
                <span class="help-block">Some keywords of archive eg place,name of guests etc. Each keyword seperated by comma</span>
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
