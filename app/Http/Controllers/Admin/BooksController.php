<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();
        $penulis = Author::all();
        return view('admin.buku.index',compact('data','penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Author::orderBy('name', 'ASC')->get();
        return view('admin.buku.create', compact('penulis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'         => 'required',
            'penulis_id'    => 'required',
            'keterangan'    => 'required|min:10',
            'jumlah'        => 'required',
            'cover '        => 'file|image'
        ]);

        if ($request->cover) {
            $gambar = $request->cover;
            $nama_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/buku', $nama_gambar);
            $data = $request->all();
            $data['cover'] = 'buku/' . $nama_gambar;
            Book::create($data);
        }else{
            $data = $request->all();
            $data['cover'] = NULL;
            Book::create($data);
        }
        
        return redirect()->route('buku.index')->with('success', 'Buku baru sudah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Book::findorfail($id);
        $penulis = Author::orderBy('name', 'ASC')->get();
        return view('admin.buku.edit',compact('buku','penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $buku)
    {
        $this->validate($request,[
            'judul'         => 'required',
            'penulis_id'    => 'required',
            'keterangan'    => 'required|min:10',
            'jumlah'        => 'required',
            'cover '        => 'file|image'
        ]);


        if ($request->cover) {
            $gambar = $request->cover;
            $nama_gambar = date('s' . 'i' . 'H' . 'd' . 'm' . 'Y') . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/buku', $nama_gambar);
            $data = $request->all();
            $data['cover'] = 'buku/' . $nama_gambar;
            $buku->update($data);
        }else{
            $data = $request->all();
            $data['cover'] = NULL;
            $buku->update($data);
        }
        
           
        return redirect()->route('buku.index')->with('success','Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success','Data buku berhasil dihapus');
    }
}
