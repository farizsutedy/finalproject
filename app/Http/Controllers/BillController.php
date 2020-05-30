<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class BillController extends Controller
{
    //
    public function addToCart(Request $request, $productid )
    {

        if (Session::get('fullname') == ''){
            return view("mainpage");
        }
        else{
            $data = DB::table('bills')
                            -> join('users','users.userID','=','bills.userID')
                            -> join('status','status.statusID','=','bills.statusID')
                            ->where('bills.userID',$request->session()->get('userID'))
                            ->where('bills.statusID',1)
                            ->get();
            $count = $data->count();

            if (!$count) {
                Bill::create([
                    'userID' => $request->session()->get('userID'),
                    'statusID' => 1,
                ]);
                $b_id = DB::table('bills')
                    ->where('userID',$request->session()->get('userID'))
                    ->get()->last()->billID;

                $billdetail = new BillDetail;
                $billdetail->billID =  $b_id;
                $billdetail->productID = $productid;
                $billdetail->save();
                
                }
            else{
                foreach ($data as $data) {
                    $currentbillid = $data->billID;
                }
                $billdetail = new Billdetail;
                $billdetail->billID =  $currentbillid;
                $billdetail->productID = $productid;
                $billdetail->save();
            }
            $cart = DB::table('bill_details')
            -> join('bills','bills.billID','=','bill_details.billID')
            ->where('bills.userID', $request->session()->get('userID'))
            ->where('bills.statusID',1)
            ->get();
            $count = $cart->count();
            Session::put('count',$count);
            return Redirect::to(".");
        }
    }
    public function getCart(Request $request)
    {
        if (Session::get('fullname') == ''){
            return view("mainpage");
        }
        else
        {
            $data = DB::table('bill_details')
                            -> join('bills','bills.billID','=','bill_details.billID')
                            -> join('products','products.productID','=','bill_details.productID')
                            // -> join('status','status.statusID','=','bills.statusID')
                            ->where('bills.userID',$request->session()->get('userID'))
                            ->where('bills.statusID',1)
                            ->get();
            // dump($data);
            $cart = DB::table('bill_details')
            -> join('bills','bills.billID','=','bill_details.billID')
            ->where('bills.userID', $request->session()->get('userID'))
            ->where('bills.statusID',1)
            ->get();
            $count = $cart->count();
            Session::put('count',$count);
            return view('/checkout', compact('data'));
        }
    }

    public function getHistory(Request $request)
    {
        if (Session::get('fullname') == ''){
            return view("mainpage");
        }
        else
        {
            $data = DB::table('bill_details')
                            -> join('bills','bills.billID','=','bill_details.billID')
                            -> join('products','products.productID','=','bill_details.productID')
                            -> join('status','status.statusID','=','bills.statusID')
                            // -> join('status','status.statusID','=','bills.statusID')
                            ->where('bills.userID',$request->session()->get('userID'))
                            ->where('bills.statusID', '!=', 1)
                            ->orderBy('bill_details.billdetailID','DESC')
                            ->get();
            // dump($data);
            return view('/history', compact('data'));
        }
    }

    public function deleteItem( $billDetailID )
    {
        $deletedUser = BillDetail::where('billDetailID', $billDetailID)->delete();
        return Redirect::to('/checkout');
    }

}
