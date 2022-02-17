<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class Beranda extends Controller
{
    public function index()
    {
        $books = Auth()->user()->borrow;
        return view('admin.beranda',compact('books'));
    }


    public function list_pinjam(){
        $borrow = AuthorBook::where('returned_at', null)->get();
        return view('admin.listpinjam',compact('borrow'));
    } 

    public function returnBook(AuthorBook $id){
        $id->update([
            'returned_at' => Carbon::now(),
            'admin_id'    => auth()->id()  
        ]);

        return redirect()->route('listpinjam')->with('success','Buku berhasil Dikembalikan');
    }

}