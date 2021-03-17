<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = User::where('email', $request->email)->first();

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => 2,
        ]);

        $token = JWTAuth::fromUser($user);

        return (new UserResource($user))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    public function getAuthenticatedUser()
    {
        $this->authorize('admin');
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return new UserResource($user);
    }

    public function update(Request $request)
    {
        $this->authorize('user');

        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'string|min:10|max:13',
                'photo' => 'file|image|mimes:jpeg,png,jpg',
                'district' => 'string|max:255',
                'address' => 'string|max:255',
                'postal_code' => 'string|max:255',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::where([
            'id' => auth()->id()
        ])->first();

        $file = $request->file('photo');
        if ($file) {
            File::delete('images/' . $user->photo);
            $nama_file = time() . ' ' . $file->getClientOriginalName();
            $tujuan_opload = 'photo';
            $file->move($tujuan_opload, $nama_file);
            User::where('id', $user->id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'district' => $request->district,
                    'address' => $request->address,
                    'id_province' => $request->id_province,
                    'id_city' => $request->id_city,
                    'postal_code' => $request->postal_code,
                    'photo' => $nama_file,
                ]);
        } else {
            User::where('id', $user->id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'district' => $request->district,
                    'address' => $request->address,
                    'id_province' => $request->id_province,
                    'id_city' => $request->id_city,
                    'postal_code' => $request->postal_code,
                ]);
        }
        return (new UserResource($user))->additional([
            'message' => 'succes update',
        ]);
    }
}
