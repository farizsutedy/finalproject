@extends('template/home')
@section('container')

<div class="checkout_area">
        <div class="container">
            <div class="row">
                <!-- <img class="col-md-5 img-fluid" style="width:100%; max-height: 600px; margin-bottom: 100px" src="/img/product-img/2077.jpg" alt=""> -->
                <div class="col-12 col-md-12 col-lg-12 ml-lg-auto">
                    <div class="order-details-confirmation" style="margin:30px">

                        <div class="cart-page-heading">
                            <h5>Your Purchase History</h5>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span></li>
							@foreach($data as $data)
                            <li><img src="/img/product-img/{{$data->cover}}" style="text-align:left; max-height:100px"alt=""><span>{{$data->productName}}</span> <span>${{$data->productPrice}}</span> <span>{{$data->status}}</span></li>                            
					        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection