@extends('admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Yatras
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Yatras
      </header>
      @foreach($packages as $key => $pckgs)
      <div class="panel-body">
        <h2 class="panel-heading">
          {{ $key }}
        </h2>
        @foreach($pckgs as $pckg)
      	<div class="row">
          <form method="POST" action="{{ route('package.update',array($pckg->id)) }}">
            
            <div class="col-sm-3">
              <div class="form-group">
                <label>Package Name</label>
                <input class="form-control" placeholder="Name" name="package-name" type="text"  value="{{ $pckg->package_name }}">
              </div>
            </div><!-- /.col-sm- -->
            <div class="col-sm-3">
              <div class="form-group">
                <label>Package Name</label>
                <input class="form-control" placeholder="Name" name="package-amount" type="text"  value="{{ $pckg->amount }}">
              </div>
            </div><!-- /.col-sm- -->
            <div class="col-sm-3">
             <label>Package For Yatra</label>
             @foreach($yatras as $yatra)
                <div class="radio">
                    <label>
                        <input type="radio" value="{{$yatra->id}}" name="yatra" {{ ($yatra->id == $pckg->yatra_id) ? 'checked' : '' }}>
                        {{ ucwords($yatra->name) }}
                    </label>
                </div>
              @endforeach
            </div><!-- /.col-sm- -->
            <div class="col-sm-1">
              <label>&nbsp;</label>
              <button type="submit">Update</button>
            </div><!-- /.col-sm- -->

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="_method" value="PUT" type="hidden">


          </form>

          <div class="col-sm-1">
            <label>&nbsp;</label>
            <form action="{{ route('package.destroy', array($pckg->id)) }}" method="POST" >
                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                <input name="_method" value="DELETE" type="hidden">

               <button type="submit">Remove</button>
            </form>
          </div><!-- /.col-sm- -->
        </div><!-- /.row- -->
        <hr />
        @endforeach
	        
       </div><!-- /.panel-body- -->
      @endforeach
    </section><!-- /.panel- -->
  </div>

</div> 


@stop
