@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($article->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($article->title)}}
      </header>
      <div class="panel-body">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
	        <form method="POST" action="{{ route('articles.update',$article->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>Edit Article/Interview</h2>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group {{ ($errors->has('article-title')) ? 'has-error' : '' }}">
                        <label>Article Title</label>
                        <input class="form-control" placeholder="Article Title" name="article-title" type="text"  value="{{ Input::old('article-title') ? Input::old('article-title') : $article->title }}">
                        <span class="help-block">Avoid special characters in title</span>
                        {{ ($errors->has('article-title') ? $errors->first('article-title') : '') }}

                    </div>
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="form-group {{ ($errors->has('publish-date')) ? 'has-error' : '' }}">
                         <label>Article Date</label>
                        <input class="form-control" placeholder="" name="publish-date" type="text"  value="{{ Input::old('article-title') ? Input::old('article-title') : \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->date)->format('m/d/Y') }}" id="publish-date">
                        {{ ($errors->has('publish-date') ? $errors->first('publish-date') : '') }}
                    </div>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->




            <div class="form-group {{ ($errors->has('details')) ? 'has-error' : '' }}">
                <label>Article Detail</label>
                <textarea rows="6" class="form-control" id="ckeditor1" name="details">{!! Input::old('details') ? Input::old('details') : $article->details !!}</textarea>
                <span class="help-block">Full detail of the article</span>
                {{ ($errors->has('details') ? $errors->first('details') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('excerpt')) ? 'has-error' : '' }}">
                <label>Excerpt</label>
                <textarea rows="6" class="form-control" name="excerpt">{{ Input::old('excerpt') ? Input::old('excerpt') : $article->excerpt }}</textarea>
                <span class="help-block">Small description of article(this shows in the home page articles)</span>
                {{ ($errors->has('excerpt') ? $errors->first('excerpt') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('keywords')) ? 'has-error' : '' }}">
                <label>Keywords</label>
                <textarea rows="3" class="form-control" placeholder="" name="keywords">{{ Input::old('keywords') ? Input::old('keywords') : $article->keywords }}</textarea>
                <span class="help-block">Some keywords of article eg place,name of guests etc. Each keyword seperated by comma</span>
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
