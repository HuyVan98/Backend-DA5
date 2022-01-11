<?php

namespace App\Http\Controllers;

use App\Comments;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Orders;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user=Auth::user();
            return response()->json(['data' => $user, 'status' => 1]);
        }
        return response()->json(['status' => 'that bai']);
    }
}
