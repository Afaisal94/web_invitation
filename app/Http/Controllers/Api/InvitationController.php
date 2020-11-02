<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;

class InvitationController extends Controller
{
    public function index()
    {
        $invitation = Invitation::all();
        return response()->json([
            "success" => true,
            "message" => "Invitation List",
            "data" => $invitation
            ]);
    }

    public function show($id)
    {
        $invitation = Invitation::find($id);        
        if (is_null($invitation)) {
            return response()->json([
                "success" => false,
                "message" => "Invitation not found.",
                "data" => $invitation
            ]);
        }
            return response()->json([
                "success" => true,
                "message" => "Invitation retrieved successfully.",
                "data" => $invitation
            ]);
    }
}
