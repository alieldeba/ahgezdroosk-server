<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfilesController extends Controller
{
    public function index(Profile $profile)
    {
        $profile = $profile->with(['user:id,username', 'grade:id,name'])->first();

        if (Auth::guest() || Auth::user()->cannot('update', $profile)) return
            response()->json($profile->only([
                'id',
                'name',
                'grade',
                'user',
                'avatar'
            ]));
        return response()->json($profile);
    }

    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        if (Auth::user()->cannot('update', $profile))
            abort(Response::HTTP_UNAUTHORIZED, __('profile.not-yours'));
        $avatarName = $profile->avatar;
        if ($request->safe()->has('avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
        }
        $profile->update(
            [
                ...$request->safe()->only([
                    'name',
                    'phone',
                    'grade_id'
                ]),
                'avatar' => $avatarName
            ]
        );

        Auth::user()->update(
            $request->safe()->only([
                'username',
            ])
        );

        return response()->json([
            'message' => __('profile.updated')
        ]);
    }
}
