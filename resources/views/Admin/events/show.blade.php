@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Event {{ucwords($event->title)}}
@stop



@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <section class="panel">
      <header class="panel-heading">
          {{ucwords($event->title)}}
      </header>
      <div class="panel-body">

        <div class="row">
            <div class="col-md-6">

                <section class="in-panel">
                    <span class="label label-primary">Cover</span> <br /><br />
                    <img src="{{asset('images/events/'.$event->cover_photo)}}" class="img-responsive" alt=""> 
                  </section>
                
            </div><!-- /.col-md-8 -->
            <div class="col-md-6">
                <section class="in-panel">
                    <span class="label label-primary">Date</span> <br /><br />
                    From <strong>{{$event->start_date}}</strong> to <strong>{{$event->end_date}}</strong>
                 </section>
                 <section class="in-panel">
                    <span class="label label-primary">Keywords</span> <br /><br />
                    <i>{{$event->keywords}}</i>
                 </section>

            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->

          

          


            <section class="in-panel">
                <span class="label label-primary">Date</span> <br /><br />
                {!!$event->details!!}
            </section>

            <section class="in-panel">
                <span class="label label-primary">Excerpt</span> <br /><br />
                 <i>{{$event->excerpt}}</i>
            </section>

            <div class="panel-body">
                <a href="{{ route('events.edit', array($event->id)) }}" class="btn btn-success confirm-edit">
                    Edit
                </a>
                <a href="" class="btn btn-danger confirm-delete">
                    Remove
                </a>
                
                

            </div>

      </div>
    </section>
	</div>
</div>
@stop
