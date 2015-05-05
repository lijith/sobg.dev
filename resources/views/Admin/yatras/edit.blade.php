@extends('admin.layout')

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
	        <form method="POST" action="{{ route('yatra.update',array($part,$yatra->id)) }}" accept-charset="UTF-8" enctype="multipart/form-data">

            <h2>{{ ucwords($yatra->name) }}</h2>

            @if($part == 'highlight')

            <div class="form-group {{ ($errors->has('highlights')) ? 'has-error' : '' }}">
                <label>Yatra Highlights</label>
                <textarea rows="6" class="form-control ckeditor1" name="highlights"  id="ckeditor1">{{ Input::old('highlights') ? Input::old('highlights') : $yatra->highlights }}</textarea>
                {{ ($errors->has('highlights') ? $errors->first('highlights') : '') }}
            </div>

            @elseif($part == 'itenarary')

                <hr />

                <div class="form-group {{ ($errors->has('itenary')) ? 'has-error' : '' }}">
                    <label>Yatra Itenerary and Cost</label>
                    <textarea rows="6" class="form-control ckeditor1" name="itenary"  id="ckeditor2">{{ Input::old('itenary') ? Input::old('itenary') : $yatra->itenary_cost }}</textarea>
                    {{ ($errors->has('itenary') ? $errors->first('itenary') : '') }}
                </div>

            @endif


            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="_method" value="PUT" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">

        </form>
      </div>
    </section>
	</div>
</div>
@stop
