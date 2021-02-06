<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    use GeneralTrait;
    public function login(Request $request)
    {
        $this->lang($request->lang);
        if (!$request->email) {
            return $this->errorField('email');
        }
        if (!$request->password) {
            return $this->errorField('password');
        }
        $user = User::where('email', $request->email)->first();
        if (!$user or !Hash::check($request->password, $user->password)) {
            return $this->errorMessage('unauthorized');
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $data = [
            "name"              => $user->name,
            "email"             => $user->email,
            "token"             => $token,
            "userId"            => $user->id
        ];
        return $this->returnData('mUser', $data, __('Success login'));
    }

    public function translateFile()
    {
        $jsonString = file_get_contents(base_path('resources/lang/ar.json'));
        $data = json_decode($jsonString, true);
        return response()->json([
            'status'=>true,
            "translation"=>$data
        ]);

    }
}
