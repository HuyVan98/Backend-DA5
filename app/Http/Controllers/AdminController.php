<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Orders;

class AdminController extends ApiController
{
    public function index()
    {
        $data = array();
        $user = User::all()->count();
        $data['order'] = Orders::where('state', 0)->count();
        $data['user'] = $user;
        $data['comment'] = Comments::where('status', 0)->count();
        return response()->json(['data' => $data]);
    }
    function loginApi(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            return response()->json(['data' => $user, 'status' => 1]);
        }
        return response()->json(['status' => 'that bai']);
    }
}