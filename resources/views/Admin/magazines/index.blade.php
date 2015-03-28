@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Magazines
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Magazines
      </header>
      <div class="panel-body">

        <div class="crearfix">
          <a href="{{ route('magazines.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Edition</a>
        </div><!-- /.crearfix -->
        
        <hr />
      	<div class="table-responsive">
	        <table class="table table-striped table-hover">
	          <thead>
	              <th class="col-md-4">Title</th>
	              <th class="col-md-3">Publish Date</th>
	          </thead>
            <tbody>
              @foreach($magazines as $magazine)
                <tr>
                  <td>
                    
                    <a href="{{ action('\App\Http\Controllers\Admin\MagazineController@show', array($magazine->id)) }}">
                      <img src="{{asset('images/magazines/'.$magazine->cover_photo_thumbnail)}}" alt="cover photo" class="img-responsive" />
                      <br />
                      <strong>{{ucwords($magazine->title)}}</strong>
                    </a>
                  </td>
                  <td>{{$magazine->published_at}}</td>
                </tr>
              @endforeach
            </tbody>
	        </table>

          {!!$magazines->render()!!}
    </div>
      </div>
    </section>
  </div>

</div> 


@stop
