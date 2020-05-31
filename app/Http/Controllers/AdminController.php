<?php

namespace App\Http\Controllers;

use App\Admin;
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


class AdminController extends Controller
{
    public $chars = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
   
    public function generateString()
    {
      $result = "";
      for ($i = 0; $i < 5; $i++) {
        $result .= $this->chars[rand(0,35)];
      }
      return $result;
    }
    
    public function addRandomStrings()
    {
      $string = "";
      for ($i = 0; $i < 3; $i++) {
        if ($string === "") {
          $string = $string . $this->generateString();
        } else {
          $string = $string . "-" . $this->generateString();
        }
        
      }
      return $string;
    }
    public function generateKey()
    {
       $gamekey = $this->addRandomStrings();
       return $gamekey;
    //    dump($gamekey);
       // return view('test',compact('gamekey'));
     }
    public function login(Request $request) {
        $username = Str::lower($request->input("username"));
        $password = $request->input("password");
        
        


        $admin = Admin::all()->where('username',  $username);
        $count = $admin->count();
        if (!$count) {
            // dump('test1');
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and/or Password');
            }
            else{
            $data = DB::table('admins')
                    ->where('username',$username)
                        -> get();
                foreach ($data as $data) {
                    $hashed_pw = $data->password;
                }
          
            if(Hash::check($password, $hashed_pw)){
                $data = DB::table('admins')
                ->where('username',$request->input("username"))
                -> get();
    
                foreach ($data as $dat) {
                    $username = $dat->username;
                    $password = $dat->password;
                    $adminID = $dat->adminID;
                    $api_token = $dat->api_token;
                }
                // $cart = DB::table('bill_details')
                //     -> join('bills','bills.billID','=','bill_details.billID')
                //     ->where('bills.userID', $userID)
                //     ->where('bills.statusID',1)
                //     ->get();
                // $count = $cart->count();

                Session::put('username',$username);
                Session::put('adminID',$adminID);
                Session::put('api_token',$api_token);
                // dump($fullname, $cart);
                // return view('/admin');
                dump($data);
                return view('adminhome');

            }
            else{
                // dump('test2');
                return Redirect::to(URL::previous())->with('message', 'Invalid  Username and/or Password');
                
            }
        }
    }
    public function logout(Request $request) {
        Session::flush();
        $request->session()->regenerate();
        // $request->session()->flush();
        return Redirect::to("/admin");
    }

    public function getOrders()
    {
        $data = DB::table('bills')
                        ->join('status','status.statusID','=','bills.statusID')
                        ->join('users',"users.userID",'=','bills.userID')
                        // -> join('status','status.statusID','=','bills.statusID')
                        ->where('bills.statusID', '=', 2)
                        ->orderBy('bills.billID','DESC')
                        ->get();
        dump($data);
        return view('/orders', compact('data'));
    }

    public function getDetails( $billID )
    {
        $data = DB::table('bill_details')
            ->join('bills','bills.billID', '=', 'bill_details.billID')
            ->join('products','products.productID','=','bill_details.productID')
            ->join('paymenttype','paymenttype.paymentTypeID','=','bills.paymentTypeID')
            ->where('bill_details.billID', '=', $billID)
            ->orderBy('bill_details.billdetailID','DESC')
            ->get();
        dump($data);
        return view('/orderdetails', compact('data'));
    }
    public function confirmOrder( $billID )
    {

        $data = [
            'statusID' => 3
        ];
        Bill::where('billID', $billID)->update($data);
        $bills = DB::table('bill_details')
                    ->where('billID','=',$billID)
                    ->get();
        
        foreach($bills as $bills)
        {
            $gamekey = [
                'gamekey' => $this->generateKey()
            ];
            BillDetail::where('billDetailID',$bills->billDetailID)->update($gamekey);
        }

        return Redirect::to('/orders');

    }
}
