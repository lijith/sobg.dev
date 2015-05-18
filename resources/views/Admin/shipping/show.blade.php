@extends('Admin.layout')

{{-- Page Title --}}
@section('title')
@parent
	Order Reference : {{ $order->reference_id }}
@stop


@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
    <section class="panel">
      <header class="panel-heading">
          Order Reference : {{ $order->reference_id }}
      </header>
      <div class="panel-body">
        <div class="row">

          <div class="col-md-4">
            <section class="panel">
              <header class="panel-heading">
                  Shipping Address
              </header>
               <div class="panel-body">
                {{ strtoupper($order->shipping_name) }}<br />
                {{ nl2br(strtoupper($order->shipping_address_1)) }}<br />
                {{ nl2br(strtoupper($order->shipping_address_2)) }}<br />
                {{ nl2br(strtoupper($order->shipping_city)) }}<br />
                {{ nl2br(strtoupper($order->shipping_state)) }}<br />
                {{ nl2br($order->shipping_contact_number_1) }}<br />
                {{ nl2br($order->shipping_contact_number_2) }}<br />

               </div>
            </section><!-- /.panel -->
          </div><!-- /.col-md-6 -->

          <div class="col-md-8">
            <section class="panel">
              <header class="panel-heading">
                  Ordered Items
              </header>
               <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Qunty</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $ord)
                      <tr>
                        <td>{{ ucwords($ord['type']) }}</td>
                        <td>{{ ucwords($ord['title']) }}</td>
                        <td>{{ $ord['quantity'] }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
               </div>
            </section><!-- /.panel -->
          </div><!-- /.col-md-6 -->

        </div><!-- /.row -->
      </div><!--.panel-body -->
    </section>
  </div>

</div> 


@stop
