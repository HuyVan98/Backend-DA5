<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function index()
    {
        $data = Slider::all();
        return response()->json($data, 200);
    }
    function getbyid($id)
    {
        $data = Slider::find($id);
        return response()->json($data, 200);
    }
    function store(Request $request)
    {
        dd($request->all());
        $data = new Slider();
        $data->image = $request->image;
        $data->save();
        return response()->json($data, 200);
    }
}