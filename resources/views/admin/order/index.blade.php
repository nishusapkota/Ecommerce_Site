<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .font_des{
            font-size: 40px;
            margin-top:30px;
            padding-bottom: 20px;
            text-align: center;
        }
        .table_des{
            width: 50%;
            margin: auto;
            border: 2px solid white;
        }
        .tr_des{
            background-color:rgb(15, 165, 179);
        }
        .th_des{
            padding:10px;
            text-align: center;
        }
        .td_des{
            padding:10px;
            text-align: center;
        }
        .img_des{
            width: 200px;
            height: 200px;
        }

    </style>
  </head>
  <body>
@include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="font_des">Show Orders</h2>

                <table class="table_des">
                    <tr class="tr_des">
                        <th class="th_des">Name</th>
                        <th class="th_des">Email</th>
                        <th class="th_des">Phone</th>
                        <th class="th_des">Address</th>
                        <th class="th_des">Product Title</th>
                        <th class="th_des">Quantity</th>
                        <th class="th_des">Price</th>
                        <th class="th_des">Image</th>
                        <th class="th_des">Payment Status</th>
                        <th class="th_des">Delivery Status</th>
                        <th class="th_des">Delivered</th>
                        <th class="th_des">Print PDF</th>
                        <th class="th_des">Send Email</th>

                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="td_des">{{$order->name}}</td>
                        <td class="td_des">{{$order->email}}</td>
                        <td class="td_des">{{$order->phone}}</td>
                        <td class="td_des">{{$order->address}}</td>
                        <td class="td_des">{{$order->product_title}}</td>

                        <td class="td_des">{{$order->quantity}}</td>
                        <td class="td_des">{{$order->price}}</td>
                       
                        <td class="td_des">
                            <img src="{{asset($order->image)}}" class="img_des">
                        </td>
                        <td class="td_des">{{$order->payment_status}}</td>
                        <td class="td_des">{{$order->delivery_status}}</td>
                        <td class="td_des">
                           @if($order->delivery_status == 'Processing')
                            <a class="btn btn-primary" href="{{route('delivered',$order->id)}}">Delivered</a>
                            @else
                            <p>Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{route('send_email',$order->id)}}">Send Email</a>
                        </td>

                    </tr>
                    @endforeach
                   
                </table>

            </div>
        </div>
       
        
    <!-- container-scroller -->
    @include('admin.script')   
</body>
</html>
