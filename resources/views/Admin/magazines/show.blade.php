@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($magazine->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($magazine->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-6">

                <section class="in-panel">
                    <span class="label label-primary">Cover</span> <br /><br />
                    <img src="{{asset('images/magazines/'.$magazine->cover_photo)}}" class="img-responsive" alt=""> 
                  </section>
                
            </div><!-- /.col-md-8 -->
            <div class="col-md-6">
                
                <div class="in-panel">
                  <span class="label label-primary">Price</span> <br /><br />
                  <strong>{{$magazine->price}} /-</strong>
                </div>

                <div class="in-panel">
                  <span class="label label-primary"><strong>{{$magazine->published_at}}</strong> Edition</span>
                </div>

                <div class="in-panel">
                  <a href="{{asset('magazines-pdf/'.$magazine->magazine_file)}}" target="_blank">{{$magazine->magazine_file}}</a>
                </div>
                 

            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->

          

          


            <section class="in-panel">
                <span class="label label-primary">Detail</span> <br /><br />
                {!!$magazine->details!!}
            </section>

            <section class="in-panel">
                <span class="label label-primary">Excerpt</span> <br /><br />
                 <i>{{$magazine->excerpt}}</i>
            </section>

            <div class="panel-body">
                
                <form action="{{ action('\App\Http\Controllers\Admin\MagazineController@destroy', array($magazine->id)) }}" method="POST" class="delete-request-form">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">
                <a href="{{ route('magazines.edit', array($magazine->id)) }}" class="btn btn-success confirm-edit">
                  <i class="fa fa-pencil-square-o"></i> Edit
                </a>
                <button type="submit" class="btn btn-danger confirm-delete">
                  <i class="fa fa-trash-o"></i> Remove
                </button>
                </form>



            </div>

      </div>
    </section>
	</div>
</div>
@stop
