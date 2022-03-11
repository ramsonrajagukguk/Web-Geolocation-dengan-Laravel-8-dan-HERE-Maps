<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Beranda extends Controller
{
    public function index()
    {
     
        return view('admin.beranda');
    }


}