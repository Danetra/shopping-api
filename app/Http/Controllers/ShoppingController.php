<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Shopping;

class ShoppingController extends Controller
{
    public function index()
    {
        $shopping = Shopping::all();
        if($shopping)
        {
            return response()->json([
                'code' => 200,
                'status' => true,
                'data' => $shopping
            ]);
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'created_date'  => 'required',
        ]);

        $name = $request->input('name');
        $created_date = $request->input('created_date');

        $shopping = Shopping::create([
            'name'          => $name,
            'created_date'  => $created_date
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $shopping
        ]);
    }
}