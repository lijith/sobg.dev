@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Subscription Rates
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Subscription Rates
      </header>
      <div class="panel-body">

        <div class="row">
          <div class="col-md-12">
            <h3>Digital Version</h3>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                @foreach($digitals as $digital)
                  <form method="POST" action="{{ route('magazines.subscription.update') }}">
                    <input name="_method" value="PUT" type="hidden">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="id" value="{{ $digital->id }}" type="hidden">

                    <tr>
                      <td>
                        <label>Title</label>

                        <input name="title" type="text" class="form-control" value="{{ $digital->key }}" />
                      </td>
                       <td>
                        <label>Rate</label>
                        <input name="rate" type="text" class="form-control" value="{{ $digital->value }}" />
                      </td>
                      <td>
                        <label>Period</label>
                        <input name="period" type="text" class="form-control" value="{{ $digital->period }}" />

                      </td>

                      <td><br /><button type="submit" class="btn btn-primary">Update</button></td>
                    </tr>

                  </form>
                @endforeach

              </table>
            </div>
          </div><!-- /.col-md-6 -->
          <div class="col-md-12">
            <h3>Print Version</h3>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                @foreach($prints as $print)
                  <form method="POST" action="{{ route('magazines.subscription.update') }}">
                    <input name="_method" value="PUT" type="hidden">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="id" value="{{ $print->id }}" type="hidden">

                    <tr>
                      <td>
                        <label>Title</label>

                        <input name="title" type="text" class="form-control" value="{{ $print->key }}" />
                      </td>
                       <td>
                        <label>Rate</label>
                        <input name="rate" type="text" class="form-control" value="{{ $print->value }}" />
                      </td>
                      <td>
                        <label>Period</label>
                        <input name="rate" type="text" class="form-control" value="{{ $print->period }}" />

                      </td>

                      <td><br /><button type="submit" class="btn btn-primary">Update</button></td>
                    </tr>

                  </form>
                @endforeach

              </table>
            </div>
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <hr />
        <h3>Add Subscription Plan</h3>
        <hr />

        <div class="row">

          <form method="POST" action="{{ route('magazines.subscription.store') }}">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">

            <div class="col-md-3">
              <label>Title</label>
              <input type="text" class="form-control" name="title" />
            </div><!-- /.col-md-3 -->
            <div class="col-md-2">
              <label>Rate</label>
              <input type="text" class="form-control" name="rate" />
            </div><!-- /.col-md-3 -->
            <div class="col-md-2">
            <label>Period</label>
              <input type="text" class="form-control" name="period" />
            </div><!-- /.col-md-3 -->
            <div class="col-md-3">
             <label>Type</label>
             <div>
                <label class="radio-inline">
                    <input type="radio" value="digital" name="type"> Digital
                </label>

                <label class="radio-inline">
                    <input type="radio" value="print" name="type"> Print
                </label>
             </div>
            </div><!-- /.col-md-3 -->
            <div class="col-md-2">
            <br />
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>

        </div><!-- /.row -->


      </div>
    </section>
  </div>

</div>


@stop
