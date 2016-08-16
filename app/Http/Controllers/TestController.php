<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use App\Http\Requests;

class TestController extends Controller
{
  public function index() {
    Log::info('In the "index" method of "TestController"...');

    echo "<h2>Index method of TestController...</h2>";

    return true;
  }
}
