<?php

namespace App\Http\Controllers;
use App\Models\Space;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
        $spaces = Space::orderBy('id', 'desc')->paginate(8);
        return view('beranda',compact('spaces'));
    }

    public function details(Space $space){
        return view('space_details',compact('space'));

    }    
}