@extends('template/details')
@section('checkimage')
@foreach ($img as $img)
    <img class="img-fluid" src="/img/product-img/{{$img->imgUrl}}" alt="">
@endforeach              
@endsection

@section('checkname')
@foreach($data as $data)
    <h2>{{$data->productName}}</h2>
    <p>{{$data->productDescription}}</p>
           
            <p class="product-price">${{$data->productPrice}}</p>

                <form class="cart-form clearfix" action="/addToCart/{{$data->productID}}" method="post">
                @csrf
                <!-- Select Box -->
              
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    
                    <button style="margin-top:50px" type="submit" name="addtocart" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                </div>
            </form>
@endforeach
@endsection