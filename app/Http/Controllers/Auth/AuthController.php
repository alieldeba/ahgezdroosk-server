<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // firstly we must get needed inputs
        $name = $request->string('name');
        $email = $request->string('email');
        $password = Hash::make($request->get('password'));
        $phone = $request->string('phone');
        $grade_id = $request->integer('grade_id');

        // then we will create the user
        $user = User::create([
            'username' => 'user_' . Str::random(15),
            'email' => $email,
            'password' => $password
        ]);

        // then create the profile and link it to the grade and the user
        Profile::create([
            'user_id' => $user->id,
            'name' => $name,
            'phone' => $phone,
            'grade_id' => $grade_id
        ]);

        Auth::login($user);

        return response()->json([
            'message' => __('auth.register'),
            'token' => Auth::user()->createToken('api')->plainTextToken,
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (!Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) return response()->json([
            'message' => __('auth.failed')
        ], Response::HTTP_UNAUTHORIZED);

        return response()->json([
            'message' => __('auth.login'),
            'token' => Auth::user()->createToken('api')->plainTextToken,
        ]);
    }

    public function user()
    {
        return [
            'user' => Auth::user()->with('profile')->get(),
        ];
    }
}
