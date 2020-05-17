<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use App\VerifyUser;
use App\RegistrationDetails;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Mail;
use Auth;
use Session;
use Notification;
use Carbon\Carbon;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use Notifiable,RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
      $data = $request->all();

        $validator = Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
          $errors = $validator->errors();
          return Redirect::back()->withErrors($errors);
        }

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmpassword' => Hash::make($data['password_confirmation']),
            'role' => 2,
            'status' => 0
        ]);

        if($user){

            $details = new RegistrationDetails();
            $details->Firstname = $data['fname'];
            $details->Lastname = $data['lname'];
            $details->EmailAddress = $data['email'];
            $details->AccUserID = $user->id;
            $details->RegistrationDate = Carbon::now();
            $details->save();

            $token = self::generateRandomString(16);

            $validate = new VerifyUser();
            $validate->user_id = $user->id;
            $validate->token = $token;
            $validate->save();

            // Notification::route('mail', $user->email)
            //     ->notify(new VerifyEmail($user));


         Mail::send('emails.candidate_verify',['name' => $details->Firstname.' '.$user->Lastname, 'url' => route('verify.account', $validate->token)],
              function ($message) use ($user,$details) {
                $message->from('support@farwell-consultants.com', 'Welcome to Summit Recruitment');
                $message->to($user->email, $details->Firstname);
                $message->subject('Account Verification');
          });

                     //Show session message
            $redirectMessage = [
                'title' => 'Welcome to the Summit Recruitment and Search Portal!',
                'content' => 'Your account has been successfully created. Please check your email for further instructions.',
            ];
            Session::flash('redirectMessage', $redirectMessage);

            return Redirect::route('login');

        }else{

            $user = User::where('email', $data['email'])->first();
            RegistrationDetails::where('AccUserID', $user->id)->delete();
            $user->delete();
                //return Redirect::back()->with('errors', 'An error occured while submitting your registration. Please refresh the page and try again.');
            $redirectError = [
                'title' => 'Error!',
                'content' => 'An error occured while submitting your registration. Please refresh the page and try again.',
            ];
            Session::flash('redirectError', $redirectError);

            return Redirect::route('login');
            }

    }

  public function verifyAccount($token)
  {
    $token = VerifyUser::where('token', $token)->first();
    //dd($token);
    if($token){
    $user_verify = $token->user;
    $user_verify->email_verified_at = Carbon::now();
    $user_verify->status = 1;
    $user_verify->save();

    if($user_verify){
       $token->delete();

       User::where('id', '=', $user_verify->user_id)->update(['status' => 1]);
    if(Auth::check()){
       Auth::logout();
    }

    $redirectMessage = [
        'title' => 'Account successfully Activated!',
        'content' => 'You account was successfully activated. Please log in with your registration email address and password.',
    ];

    Session::flash('redirectMessage', $redirectMessage);
    return Redirect::route('login');

    }else{

    $redirectError = [
        'title' => 'Sorry, invalid link',
        'content' => 'Something went wrong and your account has not been confirmed.',
    ];

    Session::flash('redirectError', $redirectError);

    return Redirect::route('login');

    }
   }else{

    $redirectError = [
        'title' => 'Account verified',
        'content' => 'Your account is already verified.  Please Login using your username / email and password.',
    ];

    Session::flash('redirectError', $redirectError);

    return Redirect::route('login');

    }
}

protected function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[ rand(0, $charactersLength - 1) ];
  }

  return $randomString;
}
    public function show()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        $user = Auth::user();

        if($user->email_verified_at){
            //Show session message
            $redirectMessage = [
                'title' => 'Account Verified',
                'content' => 'Your account is already verified. Thank you.',
                // 'action'=>'Google',
                // 'link'=>'google.com'
            ];

            Session::flash('redirectMessage',$redirectMessage);
            return redirect('/');
        }

        //Show session message
        $redirectError = [
            'title' => 'Verification Required',
            'content' => 'Please verify your account to continue.',
            // 'action'=>'Google',
            // 'link'=>'google.com'
        ];

        return view('auth.verify', ['user' => $user, 'redirectError' => $redirectError]);
    }



}
