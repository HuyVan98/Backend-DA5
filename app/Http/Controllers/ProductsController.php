<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comments;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ApiController;

class ProductsController extends ApiController
{
    public function index()
    {
        $data = array();
        $products = Products::all();
        foreach ($products as $key => $productsValue) {
            $productsValue['cate'] = $productsValue->category->name;
            $data[] = $productsValue;
        }
        return response()->json(['data' => $data]);
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        // if ($request->image != null) {
        //     $file = $request->file('image');

        //     $nameValue = Str::slug($request->name);
        //     $file_old = public_path('products\\') . $request->image;
        //     if (file_exists($file_old) != null && $request->image != 'no-img.jpg') {
        //         $nameImageValue = $nameValue . '-' . Str::random(10) . '.' . $file->extension();
        //     } else {
        //         $nameImageValue = $nameValue . '.' . $file->extension();
        //     }
        //     $destinationPath = public_path('products\\');
        //     $file->move($destinationPath, $nameImageValue);
        //     $data['image'] = $nameImageValue;
        //     $data['image'] = 'no-img.jpg';
        // } else {
        //     $data['image'] = 'no-img.jpg';
        // }
        $data['image'] = $request->image;
        // dd($data);
        $product = Products::create($data);
        return $this->showOne($product);
    }
    public function show($id)
    {
        $product = array();
        $product[] = Products::find($id);
        $product[] = Products::find($id)->comments()->where('status', 1)->get();
        return response()->json(['data' => $product]);
        // return $this->showAll($product);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Products::find($id);
        $product->slug = Str::slug($request->name);
        // if ($request->image != null) {
        //     $file_old = public_path('products\\') . $product->image;
        //     if (file_exists($file_old) != null && $product->image != 'no-img.jpg') {
        //         unlink($file_old);
        //     }
        //     $file = $request->file('image');
        //     $nameValue = Str::slug($request->name);
        //     $nameImageValue = $nameValue . '-' . Str::random(10) . '.' . $file->extension();
        //     $destinationPath = public_path('products\\');
        //     $file->move($destinationPath, $nameImageValue);
        //     $data['image'] = $nameImageValue;
        // } else {
        //     $data['image'] = $product->image;

        // }
        $data['image'] = $request->image;
        $product->update($data);
        // return response()->json(['data' => $user], 200);
        return $this->showOne($product);
    }
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return $this->showOne($product);
    }
    function productcat($id)
    {
        $data = array();
        $data[] = Products::where('cat_id', $id)->get();
        $data['count'] = Products::where('cat_id', $id)->get()->count();
        $data['cateName'] = Products::where('cat_id', $id)->first()->category->name;
        // $data = Products::where('cat_id', $id)->get();
        return response()->json(['data' => $data]);
    }
    function StoreComment(Request $request)
    {
        $comment = new Comments();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->status = 1;
        $comment->prd_id = $request->id;
        $comment->save();
        return response()->json(['status' => 'thanh cong', 'data' => $comment]);
    }
}