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

                @if(!$order->shipping_status)

               @endif

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
               <hr />
               @if ($order->shipping_status == 0)
               <p>Fill this form on confirmed shippment of this order</p>
               <form>
                 <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label" for="">Order ID</label>
                    <div class="col-lg-10">
                        <input type="text" placeholder="Order ID" id="" class="form-control" name="order-id">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-sm-2 control-label" for="">Shipping Information</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" name="shipment-information"></textarea>
                        <p class="help-block">Shipping handler, Tracking code etc for reciever</p>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-danger">Confirm Shipment</button>
                  </div>
                </div>
               </form>
                @endif
            </section><!-- /.panel -->
          </div><!-- /.col-md-6 -->

        </div><!-- /.row -->
      </div><!--.panel-body -->
    </section>
  </div>

</div> 


@stop
