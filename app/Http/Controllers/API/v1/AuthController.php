<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

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
            return Auth::user();//'Authenticated User';
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

        public function login(Request $request){
            if(!Auth::attempt( $request->only('email', 'password' )) ){
                return response(
                    [
                        'message' => 'Invalid Credentials'
                    ], Response::HTTP_UNAUTHORIZED
                );
            }else{
                $user = Auth::user();
                $token = $user->createToken('token')->plainTextToken; /* please ignore this warning, it won't break the applications */
                $cookie = cookie('jwt', $token, 60 * 24); /* 60 * 24 = 1 day  */
                // return $token;
                return response([
                    'message' => $token
                ]
                )->withCookie($cookie);
            }
        }

            # the logout function, this is to delete the cookie
            public function logout(Request $request ){
                $cookie = Cookie::forget('jwt');

                return response([
                    'message' => 'Success'
                ])->withCookie($cookie);
            }
}
