<?php

namespace App\Http\Controllers;

use App\Gamekey;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GamekeyController extends Controller
{
   public function index()
   {

   }
   public function generateKey()
   {
       $date = new DateTime();
       $timestamp = $date->getTimestamp();
       $gamekey = bcrypt($timestamp);      
   }
}
