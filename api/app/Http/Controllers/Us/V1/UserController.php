<?php

namespace App\Http\Controllers\Us\V1;

use App\Http\Controllers\Controller;
use App\Services\Us\V1\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    private $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function me() {
        if (!auth()->user())
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        return response()->json(['success' => true, 'data' => auth()->user()]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (!$validator->fails()) {
            $res = $this->service->create($data);
            if (!$res) {
                return response()->json(['success' => false, 'message' => 'Fail to create user'], 400);
            }

            return response()->json(['success' => true, 'data' => $res]);
        }

        return response()->json(['success' => false, 'message' => $validator->errors()], 400);
    }

    public function login(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
