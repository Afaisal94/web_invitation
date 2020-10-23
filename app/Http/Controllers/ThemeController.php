<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $themes = Theme::all();
    	return view('admin.theme_index',['themes' => $themes]);
    }

    
    public function create()
    {
        return view('admin.theme_create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'theme_name'    => 'required',
            'view_name'     => 'required',
        ]);

        $file           = $request->file('thumbnail');
        $tujuan_upload  = 'theme_img';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $theme = new Theme;
            $theme->theme_name  = $request->theme_name;
            $theme->view_name   = $request->view_name;
            $theme->thumbnail   = $file->getClientOriginalName();
        $theme->save();

        return redirect()->route('themes')
                        ->with('success','Created successfully.');
    }

    
    public function show($id)
    {
        echo"Show";
    }

    
    public function edit($id)
    {
        $themes = Theme::find($id);
    	return view('admin.theme_edit',['themes' => $themes]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'theme_name'    => 'required',
            'view_name'     => 'required',
        ]);

        $file           = $request->file('thumbnail');
        $tujuan_upload  = 'theme_img';
        
        if(!empty($file)){

            $file->move($tujuan_upload, $file->getClientOriginalName());

            $theme = Theme::find($id);
                $theme->theme_name  = $request->theme_name;
                $theme->view_name   = $request->view_name;
                $theme->thumbnail   = $file->getClientOriginalName();
            $theme->save();

        }else{

            $theme = Theme::find($id);
                $theme->theme_name  = $request->theme_name;
                $theme->view_name   = $request->view_name;
            $theme->save();

        }

        return redirect()->route('themes')
                        ->with('success','Updated successfully.');
        
    }

    
    public function destroy($id)
    {
        $theme = Theme::find($id);
        $theme->delete();

        return redirect()->route('themes')
                        ->with('success','Deleted successfully.');
    }
}
