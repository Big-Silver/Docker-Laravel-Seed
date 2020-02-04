<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
   public function __construct() {
      $this->middleware('Second');
   }
   public function showPath(Request $request) {
      $uri = $request->path();
      echo '<br>URI: '.$uri;
      
      $url = $request->url();
      echo '<br>';
      
      echo 'URL: '.$url;
      $method = $request->method();
      echo '<br>';
      
      echo 'Method: '.$method;
   }
}
