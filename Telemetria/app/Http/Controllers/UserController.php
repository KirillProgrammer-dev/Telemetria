<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getToken(Request $request){
        $user = User::where('login', $request->login)->first();

        if($user == null){
            return null;
        }
        // Проверка пароля!
        if(Hash::check($request->password, $user->password)){
            if ($user->login == "admin"){
                $token = $user->createToken($request->device_name, ['*', 'allow-see'])->plainTextToken;
            } else {
                $token = $user->createToken($request->device_name, ['*'])->plainTextToken;
            }
            $user->remember_token = $token;
            $user->save();
            return $token;
        } else{
            return null;
        }
    }

    public function checkToken(Request $request){
        return $request->user();
        if ($request->user() == null){
            return false;
        }
        if ($request->user()->tokenCan("allow-see")){
            return true;
        } else {
            return false;
        }
    }
}
