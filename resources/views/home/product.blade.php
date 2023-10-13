<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('productDetail',$product->id)}}" class="option1">
                                   Product Detail
                                </a>

                                <form action="{{route('addCart',$product->id)}}" method="POST">
                                    @method('POST')
                                    @csrf
                               <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" min="1" style="width:100%;">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Add To Cart">
                                </div>
                               </div>
                            </form>


                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $product->title }}
                            </h5>


                            @if ($product->discount_price != " ")
                                <h6 style="color:red;">
                                    Discount<br>
                                    ${{ $product->discount_price}}
                                </h6>
                                <h6 style="text-decoration:line-through;color:blue;">
                                 Price<br>
                                 ${{ $product->price }}
                             </h6>
                            @else
                            <h6 style="color:blue;">
                              Price<br>
                              ${{ $product->price }}
                          </h6>
                          @endif
                           
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <span style="padding-top:20px;">
            {{!!$products->withQueryString()->links('pagination::bootstrap-5')!!}}
        </span>
       
    </div>
</section>
