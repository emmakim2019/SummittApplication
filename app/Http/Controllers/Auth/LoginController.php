<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use App\User;
use DB;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
    $data = $request->all();

    $validator = Validator::make($data, [
      'email'    => 'required',
      'login_password' => 'required|string|min:8',
      ]);
       
    if ($validator->fails()) {
      $errors = $validator->errors();

      return Redirect::back()->withErrors($errors);
    }

       $credentials = ['email' => $request->input('email'), 'password' => $request->input('login_password')];

        if (Auth::attempt($credentials, $request->input('remember'))) {
            $user = User::where('email', $request->input('email'))->first();
        
            if (!$user->email_verified_at) {
                return redirect('/email/verify');
            }
            if($user->role = 0){
                // if user is staff redirect to staff admin
                dd("redirect");
            }else{
                // if user is candidate redirect to profile
                return Redirect::route('home');
            }
        }else{
            //dd("here");
            $redirectError = [
                'title' => 'Sorry!',
                'content' => 'The email or password you entered did not match our records. Please double-check and try again.',
            ];
            Session::flash('redirectError', $redirectError);

            return Redirect::route('login');
        }
    }
}
