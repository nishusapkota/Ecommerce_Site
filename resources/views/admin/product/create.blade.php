<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
       .div_center{
       padding-top:40px;
       text-align: center;
       }
       .h2_font{
        font-size:40px;
        padding-bottom: 40px;
       }
       .table_center {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .table_center td {
        padding: 10px;
        /* border: 1px solid #ccc; */
    }

    .input_text {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }

    </style>
  </head>
  <body>
@include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        
                    </div>
                @endif
               
               
                <div class="div_center">
                    <h2 class="h2_font">Add Product</h2>
                <table class="table_center">
                    <form action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <tr>
                        <td> <label for="title">Title</label></td>
                        <td><input class="input_text" type="text" name="title" placeholder="Enter title" value="{{old('title')}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td>
                            <input class="input_text" type="text" name="description" placeholder="Write description" value="{{old('description')}}" required>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="image">Image</label>
                        </td>
                        <td>
                            <input class="input_text" type="file" name="image" placeholder="Choose image" value="{{old('image')}}" required>
                            <span>
                                @error('image')
                                <small class="form-text text-danger">
                                    {{$message}}
                                </small>
                                    
                                @enderror
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="cat_id">Category</label>
                        </td>
                        <td>
                            <select name="category_id" class="input_text">
                                <option value="" selected="">Choose Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>  
                                @endforeach
                               
                               </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Quantity</label>
                        </td>
                        <td>
                            <input class="input_text" type="number" name="quantity" placeholder="enter quantity" value="{{old('quantity')}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="price">Price</label>
                        </td>
                        <td>
                            <input class="input_text" type="number" name="price" placeholder="enter price" value="{{old('price')}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="discount">Discount Price</label>
                        </td>
                        <td>
                            <input class="input_text" type="number" name="discount" placeholder="enter discount price" value="{{old('discount')}}" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn" name="submit" value="Add Product">
                        </td>
                    </tr>

                </form>
                </table>
                    
                       
                       
                    </form>
                </div>
    
                
    
            </div>
        </div>
       
    <!-- container-scroller -->
    @include('admin.script')   
</body>
</html>
