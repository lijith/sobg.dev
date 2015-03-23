@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Add New Disk
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Add New Disk
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('videodisks.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group {{ ($errors->has('disk-cover-photo')) ? 'has-error' : '' }}">
                <label>Disk Cover Photo</label>
                <input type="file" id="disk-cover-photo" name="disk-cover-photo">
                <p class="help-block">Cover photo of disk(jpg, png files only)</p>
                {{ ($errors->has('disk-cover-photo') ? $errors->first('disk-cover-photo') : '') }}
            </div>
            <hr />

            <div class="form-group {{ ($errors->has('disk-title')) ? 'has-error' : '' }}">
                <label>Disk Title</label>
                <input class="form-control" placeholder="Event Title" name="disk-title" type="text"  value="{{ Input::old('disk-title') }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('disk-title') ? $errors->first('disk-title') : '') }}

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('disk-price')) ? 'has-error' : '' }}">
                        <label>Disk Price</label>
                        <input class="form-control" placeholder="in INR" name="disk-price" type="text"  value="{{ Input::old('disk-price') }}">
                        {{ ($errors->has('disk-price') ? $errors->first('disk-price') : '') }}

                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('disk-type')) ? 'has-error' : '' }}">
                        <label>Disk Type</label>
                        <div>
                            <label class="radio-inline">
                              <input type="radio" name="disk-type" id="dvd" value="1"
                              {{Input::old('disk-type') == '1'? 'checked' : ''}}> DVD
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="disk-type" id="vcd" value="2"
                              {{Input::old('disk-type') == '2'? 'checked' : ''}}> VCD
                            </label>
                            {{ ($errors->has('disk-type') ? $errors->first('disk-type') : '') }}
                        </div>

                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="form-group {{ ($errors->has('youtube-link')) ? 'has-error' : '' }}">
                <label>Youtube link</label>
                <input class="form-control" placeholder="http://www.youtube.com/embed/W-Q7RMpINVo" name="youtube-link" type="text"  value="{{ Input::old('youtube-link.') }}">
                <p class="help-block">youtube embedd link</p>
                {{ ($errors->has('youtube-link') ? $errors->first('youtube-link') : '') }}
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
                    <div class="form-group {{ ($errors->has('author')) ? 'has-error' : '' }}">
                         <label>Authored By</label>
                        <input class="form-control" placeholder="" name="author" type="text"  value="{{ Input::old('author') }}" id="author" >
                        {{ ($errors->has('author') ? $errors->first('author') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Disk Detail</label>
                <textarea rows="6" class="form-control" name="details">{{ Input::old('details') }}</textarea>
                <span class="help-block">Full detail of the disk</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
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
