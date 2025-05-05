<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request){
        $request->validated($request->all());

        if(!Auth::attempt($request->only('employee_id', 'password'))){
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('employee_id', $request->employee_id)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $request->employee_id)->plainTextToken,
        ], 'Login Successfully');
    }

    public function register(StoreUserRequest $request){
        $request->validated($request->all());
        $user = User::create([
            'employee_id' => $request->employee_id,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $request->employee_id)->plainTextToken,
        ], 'Registered Successfully');
    }

    public function logout(){
        return response()->json('This is my logout Method');
    }
}
