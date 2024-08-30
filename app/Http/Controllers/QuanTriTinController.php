<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanTriTinController extends Controller
{
    function ___contruct(){
        $this->middleware('auth');
        
    }
    function index(){
        echo "<h1> Danh sách tin  </h1>";
    }
}