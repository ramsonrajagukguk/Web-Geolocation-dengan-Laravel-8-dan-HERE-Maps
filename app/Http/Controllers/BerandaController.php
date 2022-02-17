<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
        // $buku = Books::orderBy('id', 'desc')->get();
        $buku = Book::paginate(8);
        return view('beranda',compact('buku'));
    }

    public function show(Book $id){
        $book = $id;
        return view('buku_detail',compact('book'));

    }

    public function pinjam(Book $id){
        
        // PinjamHistory::create([
        //     'user_id' => auth()->id(),
        //     'book_id' => $id->id,  
        // ]);
        $buku_id = $id->id; 
        $user = auth()->user();

        if ($user->borrow()->where('books.id', $buku_id)->count() > 0) {
            return redirect()->back()->with('success', 'Kamu sudah meminjam buku dengan judul : ' . $id->judul);
        }

        $user->borrow()->attach($buku_id);
        $id->decrement('jumlah');
 
        return redirect()->back()->with('success', 'Berhasil meminjam buku');

        return 'ok';
    }

    
}
