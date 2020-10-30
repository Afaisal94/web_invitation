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
        $themes = Theme::latest()->simplepaginate(2);
        return view('admin.theme_index',['themes' => $themes])
                ->with('i', (request()->input('page', 1) - 1) * 2);
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
        $themes = Theme::find($id);
        return view('admin.theme_show',['themes' => $themes]);
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
        $image = Theme::where('id', $id)->value('thumbnail');
        $image_path = public_path('theme_img/'. $image);  
        
        $theme = Theme::find($id);
        $theme->delete();
        
        if(file_exists($image_path)){
            unlink($image_path);
        }

        return redirect()->route('themes')
                        ->with('success','Deleted successfully.');
    }
}
