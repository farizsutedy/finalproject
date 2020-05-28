@extends('template/home')
@section('container')
<section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix" style="padding: 300px">
            <div class="product_thumbnail_slides owl-carousel">
                @yield('checkimage')
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            
            @yield('checkname')
            

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
              
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button style="margin-top:50px" type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                </div>
            </form>
        </div>
    </section>
@endsection