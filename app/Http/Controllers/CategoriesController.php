<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ApiController;


class CategoriesController extends ApiController
{
    public function index()
    {
        $categories = Categories::all();
        return $this->showAll($categories);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $category = Categories::create($data);
        return $this->showOne($category);
    }
    public function show($id)
    {
        $category = Categories::find($id);
        return $this->showOne($category);
    }

    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->slug = Str::slug($request->name);
        $category->update($request->all());
        // return response()->json(['data' => $user], 200);
        return $this->showOne($category);
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return $this->showOne($category);
    }
}