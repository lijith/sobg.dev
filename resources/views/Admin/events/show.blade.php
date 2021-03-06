@extends('Admin.layout')

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
                    <a href="{{ url(''). '/events/'.$event->slug }}" class="btn btn-primary" target="_blank">Preview Event</a>
                 </section>

                 <section class="in-panel">
                    <form method="post" action="{{ route('events.send-mail',array($event->id)) }}">
                      <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                      <button type="submit" class="btn btn-primary">Sent Notification Mails({{$event->send_mail_count}} times)</button>
                    </form>

                 </section>

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
                <span class="label label-primary">Details</span> <br /><br />
                <div class="back-content">{!!$event->details!!}</div>
            </section>

            <section class="in-panel">
                <span class="label label-primary">Excerpt</span> <br /><br />
                 <i>{{$event->excerpt}}</i>
            </section>

            <div class="panel-body">

                <form action="{{ action('\App\Http\Controllers\Admin\EventController@destroy', array($event->id)) }}" method="POST" class="delete-request-form">
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">
                <a href="{{ route('events.edit', array($event->id)) }}" class="btn btn-success confirm-edit">
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
