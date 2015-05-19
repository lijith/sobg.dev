@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	{{ $title }}
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
        {{ $title }}
      </header>
      <div class="panel-body">

      @if($orders == null)
        <p>no new order</p>
      @else

      @endif

      <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
          <thead>
            <tr>
                <th>Order Reference ID</th>
                <th>Ship to</th>
                <th>Order Date</th>
                <th>No:Items</th>
                <th>Amount</th>
                @if($title == 'All Orders')
                <th>Shipped</th>
                @endif
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td><a href="{{ route('reference.order', array($order->reference_id)) }}">{{ $order->reference_id }}</a></td>
                <td>{{ strtoupper($order->shipping_name) }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->updated_at)->format('M d, Y') }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->amount }}</td>
                @if($title == 'All Orders')
                  <td>
                  @if($order->shipping_status)
                    <label>Shipped</label>
                  @else
                    <label>Not Shipped</label>
                  @endif
                  </td>
                @endif
              </tr>
              
            @endforeach
          </tbody>
          
        </table>


      </div><!--.adv-table -->

        <div class="clearfix"></div><!-- /.clearfix -->

        <div class="pg">
          <hr />
          @if($title == 'All Orders')
            {!! $orders->render() !!}
          @endif
        </div><!-- /.pg -->

      </div><!--.panel-body -->
    </section>
  </div>

</div> 


@stop
