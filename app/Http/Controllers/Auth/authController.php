<?php

namespace App\Http\Controllers\Auth;


use JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\defaultController;

class authController extends Controller
{

    use defaultController;


    public function login(Request $request){

        $this->message = '';
        $this->status = true;
        $this->data = [];
        $this->errors = [];

        if($request->has('email') && $request->exists('password')){

            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if($validator->fails()){

                $this->status = false;
                $this->errors = $validator->errors();
                $this->message = "Login Failed";

            }else{

                $email = $request->input('email');

                $password = $request->input('password');

                $remember = $request->input('remember');

                if($token = Auth::guard('manage')->attempt(['email' => $email,'password' => $password])){

                    $this->message = 'success login';
                    $this->status = true;
                    $this->data = [
                        'token' => $token,
                        'rule' => 'manage',
                        'token_type' => 'bearer',
                        'expire' => Auth::guard('manage')->factory()->getTTL() * 60
                    ];

                }else if($token = Auth::guard('doctor')->attempt(['email' => $email,'password' => $password])){

                    $this->message = 'success login';

                    $this->status = true;

                    $this->data = [
                        'token' => $token,
                        'rule' => 'doctor',
                        'token_type' => 'bearer',
                        'expire' => Auth::guard('doctor')->factory()->getTTL() * 60
                    ];

                }else if($token = Auth::guard('lecture')->attempt(['email' => $email,'password' => $password])){

                    $this->message = 'success login';

                    $this->status = true;

                    $this->data = [
                        'token' => $token,
                        'rule' => 'lecture',
                        'token_type' => 'bearer',
                        'expire' => Auth::guard('lecture')->factory()->getTTL() * 60
                    ];

                }else if($token = Auth::guard('student')->attempt(['email' => $email,'password' => $password])){

                    $this->message = 'success login';

                    $this->status = true;

                    $this->data = [
                        'token' => $token,
                        'rule' => 'student',
                        'token_type' => 'bearer',
                        'expire' => Auth::guard('student')->factory()->getTTL() * 60
                    ];
                }else{

                    $this->message = 'login failed';
                    $this->status = false;
                    $this->errors = [
                        'login' => 'Invalid Username or Password'
                    ];
                }
            }
        }else{

            $this->message = 'login failed';
            $this->status = false;
            $this->errors = [
                'login' => 'Both Fields Are Required'
            ];
        }

        return $this->sendResult();
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        $this->message = 'success login';
        $this->status = true;
        $this->data = [
            'token' => Auth::refresh(),
            'expire' => Auth::factory()->getTTL() * 60
        ];

        return $this->sendResult($this->message, $this->status, $this->data, []);
    }
}
