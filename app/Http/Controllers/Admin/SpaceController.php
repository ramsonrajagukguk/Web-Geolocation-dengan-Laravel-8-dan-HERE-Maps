<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Space;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = Space::orderBy('created_at','DESC')->paginate(4);
        return view('admin.space.index',compact('spaces'));    
        // return view('space');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.space.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'addres' => 'required',
            'description' => 'required',
            'lotitude' => 'required',
            'longitude' => 'required',
            'photo' => 'required',
            'photo.*' => ['mimes:jpg,png'],
        ]);

        $user = auth()->user();
  

       $space = $user->spaces()->create($request->except('photo'));

           
        
        $spacePhotos=[];

        foreach ($request->file('photo') as $file) {
           $path= Storage::disk('public')->putFile('spaces',$file);
           $spacePhotos[] =[
               'space_id' => $space->id,
               'path'   => $path
           ];
        }
        
        $space->photos()->insert($spacePhotos);

        return redirect()->route('space.index')->with('success', 'Space created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Space $space)
    {
        return view('admin.space.show',compact('space'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}