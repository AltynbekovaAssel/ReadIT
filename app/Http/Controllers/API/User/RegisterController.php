<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = $image->hashName();
            $image->storeAs('public', $image_name);

            User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'image' => env('APP_URL') . '/storage/' . $image_name,
            ]);

            return response()->json([
                'status' => '200',
                'message' => 'User created successfully',
            ]);
        }

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        return response()->json([
            'status' => '200',
            'message' => 'User created successfully',
        ]);

    }
}
