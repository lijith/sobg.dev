@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($article->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-11 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($article->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-12">

            <div class="row">
              <div class="col-md-8">
                <section class="in-panel">
                    <span class="label label-primary">Excerpt</span> <br /><br />
                     <i>{{$article->excerpt}}</i>
                </section>
              </div><!-- /.col-md-8 -->
              <div class="col-md-4">
                <section class="in-panel">
                    <span class="label label-primary">Date</span> <br /><br />
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->date)->format('d M, Y') }}
                </section>

              </div><!-- /.col-md-4 -->
            </div><!-- /.row -->

            <section class="in-panel">
                <span class="label label-primary">Details</span> <br /><br />
                <div class="back-content">
                  {!! $article->details !!}
                </div><!-- /.back-content -->
            </section>


            <div class="panel-body">

                <form action="{{ route('articles.destroy',array($article->id)) }}" method="POST" class="delete-request-form">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">
                <a href="{{ route('articles.edit', array($article->id)) }}" class="btn btn-success confirm-edit">
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
