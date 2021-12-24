<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Str;

class UsersController extends ApiController
{
    public function index()
    {
        $user = User::all();
        return $this->showAll($user);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user = User::create($data);
        return $this->showOne($user);
    }
    public function show($id)
    {
        $user = User::find($id);
        return $this->showOne($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->slug = Str::slug($request->name);
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->update($request->all());
        // return response()->json(['data' => $user], 200);
        return $this->showOne($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        return $this->showOne($user);
    }
}