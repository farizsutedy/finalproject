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
    $chars = new Arr("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");    
    $generateString = new Func("generateString", function() use (&$chars, &$Math) {
        $result = "";
        for ($i = 0.0; $i < 5.0; $i++) {
          $result = _plus($result, get($chars, call_method($Math, "floor", to_number(call_method($Math, "random")) * 36.0)));
        }
        return $result;
    });
    $addRandomStrings = new Func("addRandomStrings", function() use (&$generateString) {
        $string = "";
        for ($i = 0.0; $i < 3.0; $i++) {
          if ($string === "") {
            $string = _plus($string, call($generateString));
          } else {
            $string = _plus($string, _concat("-", call($generateString)));
          }
    
        }
    });  
    }
};
