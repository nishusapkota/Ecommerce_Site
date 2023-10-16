<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
table{
    width: 50%;
    margin: auto;
    text-align: center;
    border: 2px solid black;
    margin-bottom: 30px;
}
table th{
    background-color: cadetblue;
    font-size: 20px;
    padding:3px;
    border: 1px solid black;
}
table td{
    border: 1px solid black;
    padding:2px;   
}
.img_des{
    width:200px;
    height: 200px;
}
      </style>
   </head>
   <body>
      <div class="hero_area">
        
         @include('home.header')
         @if(session('message'))
         <div class="alert alert-success" role="alert">
             {{session('message')}}
             <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
         </div>
     @endif
   
      <div>
        <table>
            <tr>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php $total_price=0; ?>
            @foreach ($carts as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td>
                    <img class="img_des" src="{{asset($cart->image)}}">
                </td>
                <td>
                    <form action="{{route('deleteCart',$cart->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger">Remove</button>
                </form>
                </td>
            </tr>
            <?php $total_price = $total_price + $cart->price; ?>
            @endforeach
        </table>
        <div>
            <h1 style="text-align: center;">Total Price: {{$total_price}}</h1>
        </div>
        <div style="margin: auto; width:20%">
            <h1>Proceed To Order</h1>
           
            <a href="{{route('cashOrder')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{route('stripe',$total_price)}}" class="btn btn-danger">Pay Using Card</a>
        </div>
      </div>
     
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>