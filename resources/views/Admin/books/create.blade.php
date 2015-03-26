@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Add New Book
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          Add New Book
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('books.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group {{ ($errors->has('book-cover-photo')) ? 'has-error' : '' }}">
                <label>Book Cover Photo</label>
                <input type="file" id="book-cover-photo" name="book-cover-photo">
                <p class="help-block">Cover photo of disk(jpg, png files only)</p>
                {{ ($errors->has('book-cover-photo') ? $errors->first('book-cover-photo') : '') }}
            </div>
            <hr />

            <div class="form-group {{ ($errors->has('book-title')) ? 'has-error' : '' }}">
                <label>Book Title</label>
                <input class="form-control" placeholder="Event Title" name="book-title" type="text"  value="{{ Input::old('book-title') }}">
                <span class="help-block">Avoid special characters in title</span>
                {{ ($errors->has('book-title') ? $errors->first('book-title') : '') }}

            </div>
            <div class="form-group {{ ($errors->has('language')) ? 'has-error' : '' }}">
                <label>Language</label>
                <input class="form-control" placeholder="Book Language" name="language" type="text"  value="{{ Input::old('language') }}">
                <span class="help-block">Language in which book is published</span>
                {{ ($errors->has('language') ? $errors->first('language') : '') }}

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('book-price')) ? 'has-error' : '' }}">
                        <label>Book Price</label>
                        <input class="form-control" placeholder="in INR" name="book-price" type="text"  value="{{ Input::old('book-price') }}">
                        {{ ($errors->has('book-price') ? $errors->first('book-price') : '') }}

                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group {{ ($errors->has('published-by')) ? 'has-error' : '' }}">
                        <label>Published By</label>
                        <div>
                            <label class="radio-inline">
                              <input type="radio" name="published-by" id="dvd" value="1"
                              {{Input::old('published-by') == '1'? 'checked' : ''}}> School
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="published-by" id="vcd" value="2"
                              {{Input::old('published-by') == '2'? 'checked' : ''}}> Others
                            </label>
                            {{ ($errors->has('published-by') ? $errors->first('published-by') : '') }}
                        </div>

                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

           

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
                <label>Book Detail</label>
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
