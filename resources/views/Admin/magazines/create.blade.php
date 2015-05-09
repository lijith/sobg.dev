@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Add New Magazine Edition
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          New Magazine Edition
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('magazines.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group {{ ($errors->has('magazine-cover-photo')) ? 'has-error' : '' }}">
                <label>Magazine Cover Photo</label>
                <input type="file" id="magazine-cover-photo" name="magazine-cover-photo">
                <p class="help-block">Cover photo of magazine(jpg, png files only)</p>
                {{ ($errors->has('magazine-cover-photo') ? $errors->first('magazine-cover-photo') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('magazine-title')) ? 'has-error' : '' }}">
                <label>Magazine Title</label>
                <input class="form-control" placeholder="Event Title" name="magazine-title" type="text"  value="{{ Input::old('magazine-title') }}">
                <span class="help-block">Avoid special characters in title(eg piravi aug 2015)</span>
                {{ ($errors->has('magazine-title') ? $errors->first('magazine-title') : '') }}

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('publish-date')) ? 'has-error' : '' }}">
                         <label>Published on</label>
                        <input class="form-control" placeholder="" name="publish-date" type="text"  value="{{ Input::old('publish-date') }}" id="publish-date">
                        {{ ($errors->has('publish-date') ? $errors->first('publish-date') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('magazine-price')) ? 'has-error' : '' }}">
                        <label>Price</label>
                        <input class="form-control" placeholder="in INR" name="magazine-price" type="text"  value="{{ Input::old('magazine-price') }}">
                        {{ ($errors->has('magazine-price') ? $errors->first('magazine-price') : '') }}

                    </div>
                </div><!-- /.col-md-6 -->
                
            </div><!-- /.row -->


            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Edition Detail</label>
                <textarea rows="6" class="form-control" name="details">{{ Input::old('details') }}</textarea>
                <span class="help-block">Full detail of the disk</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Edition Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') }}</textarea>
                <span class="help-block">Small description of disk</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
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
