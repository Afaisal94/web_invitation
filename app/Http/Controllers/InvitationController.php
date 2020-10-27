<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Groom;
use App\Models\Bridge;
use App\Models\Gallery;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $invitations = Invitation::all();
    	return view('admin.invitation_index',['invitations' => $invitations]);
    }

    
    public function create()
    {
        $themes = Theme::all();
        return view('admin.invitation_create', ['themes' => $themes]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'slug'    => 'required|unique:invitations'
        ]);

        $tujuan_upload_1    = 'wedding_photo';
        $tujuan_upload_2    = 'gallery';
        
        $photo_groom        = $request->file('photo_groom');
        $photo_bridge       = $request->file('photo_bridge');
        $gallery_1          = $request->file('gallery_1');
        $gallery_2          = $request->file('gallery_2');
        $gallery_3          = $request->file('gallery_3');
        
        $photo_groom->move($tujuan_upload_1, $photo_groom->getClientOriginalName());
        $photo_bridge->move($tujuan_upload_1, $photo_bridge->getClientOriginalName());

        $gallery_1->move($tujuan_upload_2, $gallery_1->getClientOriginalName());
        $gallery_2->move($tujuan_upload_2, $gallery_2->getClientOriginalName());
        $gallery_3->move($tujuan_upload_2, $gallery_3->getClientOriginalName());

        $invitation = new Invitation;
            $invitation->theme_id       = $request->theme_id;
            $invitation->wedding_date   = $request->wedding_date;
            $invitation->wedding_time   = $request->wedding_time;
            $invitation->location       = $request->location;
            $invitation->gmap_code      = $request->gmap_code;
            $invitation->slug           = $request->slug;
        $invitation->save();

        $invitation_id = $invitation->id;

        $groom = new Groom;
            $groom->invitation_id       = $invitation_id;
            $groom->name                = $request->name_groom;
            $groom->nickname            = $request->nickname_groom;
            $groom->father_name         = $request->father_groom;
            $groom->mother_name         = $request->mother_groom;
            $groom->photo               = $photo_groom->getClientOriginalName();
        $groom->save();

        $bridge = new Bridge;
            $bridge->invitation_id       = $invitation_id;
            $bridge->name                = $request->name_bridge;
            $bridge->nickname            = $request->nickname_bridge;
            $bridge->father_name         = $request->father_bridge;
            $bridge->mother_name         = $request->mother_bridge;
            $bridge->photo               = $photo_bridge->getClientOriginalName();
        $bridge->save();

        $data = [
            ['invitation_id' => $invitation_id, 'photo' => $gallery_1->getClientOriginalName()],
            ['invitation_id' => $invitation_id, 'photo' => $gallery_2->getClientOriginalName()],
            ['invitation_id' => $invitation_id, 'photo' => $gallery_3->getClientOriginalName()],
        ];

        Gallery::insert($data);

        return redirect()->route('invitations')
                        ->with('success','Created successfully.');
    }

    
    public function show($id)
    {
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

    
    public function edit($id)
    {
        $invitation = Invitation::find($id);        
        $theme_id   = Invitation::where('id', $id)->first()->theme_id;
        $groom      = Groom::where('invitation_id', $id)->first();
        $bridge     = Bridge::where('invitation_id', $id)->first();
        $gallery    = Gallery::where('invitation_id', $id)->first();
        $theme_name = Theme::where('id', $theme_id)->first()->theme_name;
        $themes     = DB::table('Themes')->where('id', '!=', $theme_id)->get();
        return view('admin.invitation_edit', [
            'themes'        => $themes, 
            'invitation'    => $invitation, 
            'groom'         => $groom, 
            'bridge'        => $bridge, 
            'gallery'       => $gallery, 
            'invitation'    => $invitation, 
            'theme_id'      => $theme_id,
            'theme_name'    => $theme_name,
            ]);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $invitation = Invitation::find($id);
        $invitation->delete();

        return redirect()->route('invitations')
                        ->with('success','Deleted successfully.');
    }
}
