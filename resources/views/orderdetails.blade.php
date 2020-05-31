@extends('template/admintemplate')
@section('container')

<div class="checkout_area">
        <div class="container">
            <div class="row">
                <!-- <img class="col-md-5 img-fluid" style="width:100%; max-height: 600px; margin-bottom: 100px" src="/img/product-img/2077.jpg" alt=""> -->
                <div class="col-12 col-md-12 col-lg-12 ml-lg-auto">
                    <div class="order-details-confirmation" style="margin:30px">

                        <div class="cart-page-heading">
                            <a href="/orders"><h5>Back</h5></a>
                        </div>

      
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Payment Type</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td style="text-align:center"><img src="/img/product-img/{{$data->cover}}" style="text-align:right; max-height:100px"alt=""></td>
                                    <td>{{$data->productName}}</td>
                                    <td>${{$data->productPrice}}</td>
                                    <td style="text-align:center"><img src="/img/core-img/{{$data->paymentType}}.png" style="text-align:right; max-height:100px; max-width:150px"alt=""></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tr>
                                <th>Total</th>
                                <td></td>
                            </tr>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection