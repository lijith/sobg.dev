@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ucwords($archive->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-11 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($archive->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-12">


            <section class="in-panel">
                <span class="label label-primary">Date</span> <br /><br />
                {!!$archive->details!!}
            </section>

            <section class="in-panel">
                <span class="label label-primary">Excerpt</span> <br /><br />
                 <i>{{$archive->excerpt}}</i>
            </section>

            <div class="panel-body">
                
                <form action="{{ route('archives.destroy',array($archive->id)) }}" method="POST" class="delete-request-form">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">
                <a href="{{ route('archives.edit', array($archive->id)) }}" class="btn btn-success confirm-edit">
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
