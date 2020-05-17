<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;

class PagesController extends Controller
{
    //
        public function index()
    {
        
        return redirect()->route('login');
    }
}
