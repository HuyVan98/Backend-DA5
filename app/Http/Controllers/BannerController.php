<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function index()
    {
        $data = Banner::all();
        return response()->json($data, 200);
    }
    function getbyid($id)
    {
        $data = Banner::find($id);
        return response()->json($data, 200);
    }
    function bannerUpdate(Request $request, $id)
    {
        dd($request->all());
        $data = Banner::find($id);
        return response()->json($data, 200);
    }
    function store(Request $request)
    {
        dd($request->all());
        $data = new Banner();
        $data->image = $request->image;
        $data->save();
        return response()->json($data, 200);
    }
}