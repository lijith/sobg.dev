@extends('Admin.layout')

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
            <div class="cover-pic">
                <img src="{{asset('images/video-disks/'.$disk->cover_photo)}}" class="img-responsive" alt="">
            </div><!-- /.cover-pic -->
	        <form method="POST" action="{{ route('videodisks.update',array($disk->id)) }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group {{ ($errors->has('disk-cover-photo')) ? 'has-error' : '' }}">
                <label>Change Cover Photo</label>
                <input type="file" id="disk-cover-photo" name="disk-cover-photo">
                <p class="help-block">Cover photo of disk(jpg, png files only)</p>
                {{ ($errors->has('disk-cover-photo') ? $errors->first('disk-cover-photo') : '') }}
            </div>
            <hr />

            <div class="form-group {{ ($errors->has('disk-title')) ? 'has-error' : '' }}">
                <label>Disk Title</label>
                <input class="form-control" placeholder="Disk Title" name="disk-title" type="text"  value="{{ Input::old('disk-title') ? Input::old('disk-title') : $disk->title }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('disk-title') ? $errors->first('disk-title') : '') }}

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('disk-price')) ? 'has-error' : '' }}">
                        <label>Disk Price</label>
                        <input class="form-control" placeholder="in INR" name="disk-price" type="text"  value="{{ Input::old('disk-price') ? Input::old('disk-price') : $disk->price }}">
                        {{ ($errors->has('disk-price') ? $errors->first('disk-price') : '') }}

                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('disk-type')) ? 'has-error' : '' }}">
                        <label>Disk Type</label>
                        <div>
                            <label class="radio-inline">
                              <input type="radio" name="disk-type" id="dvd" value="1"
                              @if($disk->disk_type == 1 || Input::old('disk-type')== 1) checked
                              @endif> DVD
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="disk-type" id="vcd" value="2"
                              @if($disk->disk_type == 2 || Input::old('disk-type')== 2) checked
                              @endif> VCD
                            </label>
                            {{ ($errors->has('disk-type') ? $errors->first('disk-type') : '') }}
                        </div>

                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="form-group {{ ($errors->has('youtube-link')) ? 'has-error' : '' }}">
                <label>Youtube link</label>
                <input class="form-control" placeholder="http://www.youtube.com/embed/W-Q7RMpINVo" name="youtube-link" type="text"  value="{{ Input::old('youtube-link') ? Input::old('youtube-link') : $disk->youtube_link }}">
                <p class="help-block">youtube embedd link</p>
                {{ ($errors->has('youtube-link') ? $errors->first('youtube-link') : '') }}
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('publish-date')) ? 'has-error' : '' }}">
                         <label>Published on</label>
                        <input class="form-control" placeholder="" name="publish-date" type="text"  value="{{ Input::old('publish-date') ? Input::old('publish-date') : $disk->published_at }}" id="publish-date">
                        {{ ($errors->has('publish-date') ? $errors->first('publish-date') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('author')) ? 'has-error' : '' }}">
                         <label>Authored By</label>
                        <input class="form-control" placeholder="" name="author" type="text"  value="{{ Input::old('author') ? Input::old('author') : $disk->author }}" id="author" >
                        {{ ($errors->has('author') ? $errors->first('author') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Disk Detail</label>
                <textarea rows="6" class="form-control" name="details" id="ckeditor1" >{{ Input::old('details') ? Input::old('details') : $disk->details }}</textarea>
                <span class="help-block">Full detail of the disk</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') ? Input::old('excerpt') : $disk->excerpt }}</textarea>
                <span class="help-block">Small description of disk</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') ? Input::old('keywords') : $disk->keywords }}</textarea>
                <span class="help-block">Some keywords</span>
                {{ ($errors->has('keywords') ? $errors->first('keywords') : '') }}
            </div>





            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Update Disk Info" type="submit">

        </form>
      </div>
    </section>
	</div>
</div>
@stop
