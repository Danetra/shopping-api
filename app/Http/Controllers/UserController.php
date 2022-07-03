<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|unique:users|email',
            'username'  => 'required',
            'name'      => 'required',
            'password'  => 'required|min:6',
        ]);

        $email = $request->input('email');
        $username = $request->input('username');
        $name = $request->input('name');
        $password = Hash::make($request->input('password'));

        $user = User::create([
            'email'     => $email,
            'username'  => $username,
            'name'      => $name,
            'password'  => $password
        ]);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan'
        ], 201);
    }
    
}