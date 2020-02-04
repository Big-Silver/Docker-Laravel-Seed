<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ABCController extends Controller {
   public function index() {
      echo "<br>ABC Controller.";
   }
}