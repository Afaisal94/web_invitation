<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        return response()->json([
            "success" => true,
            "message" => "Theme List",
            "data" => $themes
            ]);
    }

    public function show($id)
    {
        $themes = Theme::find($id);        
        if (is_null($themes)) {
            return response()->json([
                "success" => false,
                "message" => "Theme not found.",
                "data" => $themes
            ]);
        }
            return response()->json([
                "success" => true,
                "message" => "Theme retrieved successfully.",
                "data" => $themes
            ]);
    }
}
