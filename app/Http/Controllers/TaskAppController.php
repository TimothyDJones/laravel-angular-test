<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TaskAppController extends Controller
{
  public function index() {
    return view('TaskApp/index');
  }
}
