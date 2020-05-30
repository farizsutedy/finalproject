<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function signup(Request $request)
    {
        $user = new User;
        $user->email =  $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->fullname=  $request->input('fullname');
        $user->phonenumber =  $request->input('phonenumber');

        $user->save();

        // User::create([
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'fullname' => $request->input('fullname'),
        //     'phonenumber' => $request->input('phonenumber')
        // ]);
        $request->validate([
            'email' => 'required|',
            'password' => 'required'
        ]);
        return view('/login');
    }
    public function login(Request $request) {
        $email = Str::lower($request->input("email"));
        $password = $request->input("password");
        
        


        $users = User::all()->where('email',  $email);
        $count = $users->count();
        if (!$count) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and/or Password');
            }
            else{
            $data = DB::table('users')
                    ->where('email',$email)
                        -> get();
                foreach ($data as $data) {
                    $hashed_pw = $data->password;
                }
          
            if(Hash::check($password, $hashed_pw)){
                $data = DB::table('users')
                ->where('email',$request->input("email"))
                -> get();
    
                foreach ($data as $dat) {
                    $fullname = $dat->fullName;
                    $userID = $dat->userID;
                    $email = $dat->email;
                    $phonenumber = $dat->phoneNumber;
                }
                $cart = DB::table('bill_details')
                    -> join('bills','bills.billID','=','bill_details.billID')
                    ->where('bills.userID', $userID)
                    ->where('bills.statusID',1)
                    ->get();
                $count = $cart->count();

                Session::put('fullname',$fullname);
                Session::put('userID',$userID);
                Session::put('email',$email);
                Session::put('phonenumber',$phonenumber);
                Session::put('count',$count);
                // dump($fullname, $cart);
                return view('mainpage');

            }
            else{
                return Redirect::to(URL::previous())->with('message', 'Invalid  Username and/or Password');
            }
        }
    }
    public function logout(Request $request) {
        Session::flush();
        $request->session()->regenerate();
        // $request->session()->flush();
        return Redirect::to(".");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
