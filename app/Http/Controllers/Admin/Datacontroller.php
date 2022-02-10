<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;

class Datacontroller extends Controller
{
    public function penulis(){
        $penulis = Penulis::orderBy('name','ASC');
        
        return datatables()->of($penulis)
                    ->addColumn('action','admin.penulis.action')
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->toJson();
    }
}