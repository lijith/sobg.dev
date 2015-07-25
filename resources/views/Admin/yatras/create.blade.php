@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Yatras
@stop



@section('content')
<div class="row">
	<div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
          Yatra
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li></li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('yatra.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Create New Yatra</h2>

            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <label>Yatra Name</label>
                <input class="form-control" placeholder="Name" name="name" type="text"  value="{{ Input::old('name') }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('name') ? $errors->first('name') : '') }}

            </div>

            <div class="form-group {{ ($errors->has('highlights')) ? 'has-error' : '' }}">
                <label>Yatra Highlights</label>
                <textarea rows="6" class="form-control ckeditor1" name="highlights"  id="ckeditor1">{{ Input::old('highlights') }}</textarea>
                {{ ($errors->has('highlights') ? $errors->first('highlights') : '') }}
            </div>

            <hr />

            <div class="form-group {{ ($errors->has('itenary')) ? 'has-error' : '' }}">
                <label>Yatra Itenerary and Cost</label>
                <textarea rows="6" class="form-control ckeditor1" name="itenary"  id="ckeditor2">{{ Input::old('itenary') }}</textarea>
                {{ ($errors->has('itenary') ? $errors->first('itenary') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('tips')) ? 'has-error' : '' }}">
                <label>Tips</label>
                <textarea rows="6" class="form-control ckeditor1" name="tips"  id="ckeditor3">{{ Input::old('tips') }}</textarea>
                {{ ($errors->has('tips') ? $errors->first('tips') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Small Description</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') }}</textarea>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>
            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Keywords</label>
                <textarea rows="6" class="form-control" name="keywords">{{ Input::old('keywords') }}</textarea>
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
