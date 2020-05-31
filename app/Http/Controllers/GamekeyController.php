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
   public $chars = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");    
   public function index()
   {

   }
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
      dump($gamekey);
      // return view('test',compact('gamekey'));
    }
};
