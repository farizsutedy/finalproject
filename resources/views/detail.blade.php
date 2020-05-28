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


@endforeach
@endsection