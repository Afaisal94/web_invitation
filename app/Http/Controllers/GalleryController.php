<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        //$galleries    = Gallery::find($id);
        $galleries      = Gallery::where('invitation_id', $id)->get();
    	return view('admin.gallery_index',['galleries' => $galleries, 'id' => $id]);
    }

    
    public function create($id)
    {
        return view('admin.gallery_create',['id' => $id]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'photo'    => 'required',
        ]);

        $invitation_id  = $request->invitation_id;
        $file           = $request->file('photo');
        $tujuan_upload  = 'gallery';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $gallery = new Gallery;
            $gallery->invitation_id     = $invitation_id;
            $gallery->photo             = $file->getClientOriginalName();
        $gallery->save();

        return redirect()->route('galleries', ['id' => $invitation_id])
                        ->with('success','Created successfully.');
    }

    
    public function show($id)
    {
        echo"Show";
    }

    
    public function edit($id)
    {
        echo"Edit";
    }

    
    public function update(Request $request, $id)
    {
        echo"Update";
        
    }

    
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect()->route('galleries', ['id' => $id])
                        ->with('success','Deleted successfully.');
    }
}

