@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Create New Event
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Event
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li></li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('events.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Create New Event</h2>

            <div class="form-group {{ ($errors->has('event-title')) ? 'has-error' : '' }}">
                <label>Event Title</label>
                <input class="form-control" placeholder="Event Title" name="event-title" type="text"  value="{{ Input::old('event-title') }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('event-title') ? $errors->first('event-title') : '') }}

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('event-start-date')) ? 'has-error' : '' }}">
                         <label>Event Start Date</label>
                        <input class="form-control" placeholder="" name="event-start-date" type="text"  value="{{ Input::old('event-start-date') }}" id="event-start-date">
                        {{ ($errors->has('event-start-date') ? $errors->first('event-start-date') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('event-end-date')) ? 'has-error' : '' }}">
                         <label>Event End Date</label>
                        <input class="form-control" placeholder="" name="event-end-date" type="text"  value="{{ Input::old('event-end-date') }}" id="event-end-date" >
                        {{ ($errors->has('event-end-date') ? $errors->first('event-end-date') : '') }}
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Event Detail</label>
                <textarea rows="6" class="form-control ckeditor1" name="details"  id="ckeditor1">{{ Input::old('details') }}</textarea>
                <span class="help-block">Full detail of the event</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') }}</textarea>
                <span class="help-block">Small description of event(this shows in the home page events)</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Event Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') }}</textarea>
                <span class="help-block">Some keywords of event eg place,name of guests etc. Each keyword seperated by comma</span>
                {{ ($errors->has('keywords') ? $errors->first('keywords') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('event-cover-photo')) ? 'has-error' : '' }}">
                <label>Cover Photo</label>
                <input type="file" id="event-cover-photo" name="event-cover-photo">
                <p class="help-block">Cover photo of event(jpg, png files only)</p>
                {{ ($errors->has('event-cover-photo') ? $errors->first('event-cover-photo') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('event-attachment')) ? 'has-error' : '' }}">
                <label>Event Brochure</label>
                <input type="file" id="" name="event-attachment">
                <p class="help-block">Attach brochure of event if any(jpg, png, pdf files only)</p>
                {{ ($errors->has('event-attachment') ? $errors->first('event-attachment') : '') }}
            </div>

           
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Create" type="submit">

        </form>
      </div>
    </section>
	</div>
</div>
@stop
