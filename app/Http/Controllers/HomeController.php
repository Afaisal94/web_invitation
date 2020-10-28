<?php

namespace App\Http\Controllers;


use App\Models\Theme;
use App\Models\Groom;
use App\Models\Bridge;
use App\Models\Gallery;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }

    public function invitation($slug)
    {
        $id         = Invitation::where('slug', $slug)->first()->id;
        $invitation = Invitation::find($id);    
        $theme_id   = Invitation::where('id', $id)->first()->theme_id;    
        $view_name  = Theme::where('id', $theme_id)->first()->view_name;
        $view       = 'themes.'.$view_name;
        $groom      = Groom::where('invitation_id', $id)->first();
        $bridge     = Bridge::where('invitation_id', $id)->first();
        $gallery    = Gallery::where('invitation_id', $id)->get();
        return view($view, [
            'invitation'    => $invitation, 
            'groom'         => $groom, 
            'bridge'        => $bridge, 
            'galleries'     => $gallery, 
            'invitation'    => $invitation, 
            ]);
    
    }
}
