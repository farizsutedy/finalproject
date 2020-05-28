<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function getSport()
    {
        $data = DB::table('products')
        ->where('categoryID',1)
            -> get();

        return view('/sport', compact('data'));
    }
    
    public function getAdventure()
    {
        $data = DB::table('products')
        ->where('categoryID',2)
            -> get();
        return view('/adventure');
    }
    
    public function getHorror()
    {
        $data = DB::table('products')
        ->where('categoryID',3)
            -> get();
        return view('/horror');
    }
    
    public function getStrategy()
    {
        $data = DB::table('products')
        ->where('categoryID',4)
            -> get();
        return view('/strategy');
    }
    
    public function getSimulation()
    {
        $data = DB::table('products')
        ->where('categoryID',5)
            -> get();
        return view('/simulation');
    }
    public function getDetails($productID)
    {
        $data = DB::table('products')
            ->where('productID',$productID)
                -> get();

        $image = DB::table('products')
            ->where('productID',$productID)
                ->get();

        foreach ($image as $imgUrl) {
            $imgUrlID = $imgUrl->imgUrlID;
        }

        $img = DB::table('imgURL')
            ->where('imgUrlID',$imgUrlID)
                ->get();


        // dump($data,$img);
        return view('/detail', compact('data','img'));
    }

}
