<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .center{
        margin: auto; 
            width: 50%;
            text-align: center; 
            margin-top:30px;
            border: 3px solid white;

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
            @if(session('message'))
                <div class="alert alert-danger" role="alert">
                    {{session('message')}}
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" name="category_name" placeholder="Enter Category name">
                    <span>
                        @error('category_name')
                            <small class="form-text text-danger">
                                {{ $message }}</small>
                        @enderror
                    </span>
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>

            <table class="center">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <form action="{{url('/delete_category',$category->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">Delete</button>
                            </form>

                            {{-- <a  class="btn btn-danger" href="{{url('/delete-category',$category->id)}}">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
