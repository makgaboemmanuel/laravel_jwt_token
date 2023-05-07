<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* user added method */
    public function register(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
            ]
        );

        #  $user->save(); /* This method doesn't exist because it can't be explained by intellisense */
        return $user;
    }
    public function user(){
        return 'Authenticated User';
    }

    public function getAllUsers(Request $request){
        return User::all();
    }

    # this uses the
    public function getAllUsersWeb(Request $request){
        $allUsers =  json_decode(User::all()); /* please, always use json_decode when reading class variables */



        foreach( $allUsers as $key => $value ){
                echo "<pre>";
                echo "\n" . $value->id . ", " . $value->name . ", " . $value->created_at . "\n";
                echo "</pre>";
        }

    }

}
