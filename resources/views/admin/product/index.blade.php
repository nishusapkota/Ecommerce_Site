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
                <h2 class="font_des">Show Products</h2>

                <table class="table_des">
                    <tr class="tr_des">
                        <th class="th_des">ID</th>
                        <th class="th_des">Title</th>
                        <th class="th_des">Description</th>
                        <th class="th_des">Category</th>
                        <th class="th_des">Quantity</th>
                        <th class="th_des">Price</th>
                        <th class="th_des">Discount_Price</th>
                        <th class="th_des">Image</th>
                        <th class="th_des">Action</th>

                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td class="td_des">{{$loop->index+1}}</td>
                        <td class="td_des">{{$product->title}}</td>
                        <td class="td_des">{{$product->description}}</td>
                        <td class="td_des">{{$product->category->category_name}}</td>
                        <td class="td_des">{{$product->quantity}}</td>
                        <td class="td_des">{{$product->price}}</td>
                        <td class="td_des">{{$product->discount_price}}</td>
                        <td class="td_des">
                            <img src="{{asset($product->image)}}" class="img_des">
                        </td>
                        <td class="td_des">
                           
                            <a class="btn btn-success" href="{{route('editProduct',$product->id)}}">Edit</a>
                            <form class="d-inline" onclick="return confirm('are you sure you want to delete?');" action="{{route('deleteProduct',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
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
