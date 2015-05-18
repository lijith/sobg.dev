@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	New Orders
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          New Orders
      </header>
      <div class="panel-body">

      @if($new_orders == null)
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
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td><a href="{{ route('reference.order', array($order->reference_id)) }}">{{ $order->reference_id }}</a></td>
                <td>{{ $order->shipping_name }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->updated_at)->format('M d, Y') }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->amount }}</td>
              </tr>
              
            @endforeach
          </tbody>
          
        </table>
      </div><!--.adv-table -->

      </div><!--.panel-body -->
    </section>
  </div>

</div> 


@stop
