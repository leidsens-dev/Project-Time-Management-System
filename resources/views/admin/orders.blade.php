@extends('admin.layout.admin')
@section('content')
    <h3>Orders</h3>
    <hr>

    
        @foreach($orders as $order)
            <div style="padding: 10px;background: aliceblue;box-shadow: 3px 3px 2px;">
                <h4>Order by {{$order->user->name}} <br> Total Items {{$order->total}} <br> Order Date: {{$order->created_at}}</h4>

                <form action="{{route('toggle.deliver',$order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>

                <div class="clearfix"></div>
                
                <h5>Items</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>qty</th>
                        <th>price</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>

                    @endforeach
                </table>
            </div>
			<hr>
        @endforeach

    
@endsection

