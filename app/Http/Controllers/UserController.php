<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Ixudra\Curl\Facades\Curl;

use App\User;
use App\SummitStaff;
use App\VerifyUser;
use App\Country;
use App\JobAd;
use Yajra\Datatables\Datatables;

use Auth;
use Toastr;
use Session;
use Validator;
use Mail;
use Redirect;

class UserController extends Controller
{

  /**
   * Route to display all users.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {

    if ($request->isMethod('post')) {

      if(!empty($request->input('account_type'))){
        $users = User::where('role','=', $request->input('account_type'))->paginate(20);
      }else if(!empty($request->input('status'))){
        $users = User::where('role','=', $request->input('status'))->paginate(20);
      }
    
    }else{

    $countries = Country::all();
    $users = User::where('role','=',0)->orWhere('role','=',1)->paginate(20);
    }
   

    return view('user.index', compact('countries', 'users'));
  }


  /**
   * Route to return json of all users
   *
   * @return datatable json
   */
  public function json($companyId = null)
  {


      $query = User::where('role','=',0)->orWhere('role','=',1)->get();

      return Datatables::of($query)
          ->addColumn('first_name', function ($list) {
                return $list->SummitStaff->Firstname;
            })
          ->addColumn('last_name', function ($list) {
                return $list->SummitStaff->Lastname;
            })
          ->addColumn('role', function ($list) {
            if($list->role == 0){

              return 'Administrator';
            }else{
              return 'Staff';
            }
          })
          ->addColumn('status', function ($list) {
            if($list->status == 0){

              return 'Not Active';

            }else{

              return 'Active';
            }

            })
        ->addColumn('tools', function ($list) {
          return '
        <span style="overflow: visible; position: relative; width: 110px;">
          <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="' . route('users.edit', $list->SummitStaff->id) . '">
            <i class="fas fa-edit"></i>
          </a>

      </span>';
        })
        ->rawColumns(['tools'])
        ->make();

  }

  public function create(){

    return view ('user.create');
  }

  public function store(Request $request){

    $validator = Validator::make($request->except('_token'), [
    'first_name' => ['required', 'string', 'max:255'],
    'last_name' => ['required', 'string', 'max:255'],
    'email_address' => ['required', 'string', 'email', 'max:255'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
    'account_type' => ['required'],

        ],
      [
        'email.unique' => 'An account with a similar email address already exists.'
      ]

      );

    if ($validator->fails()) {
        $errors = $validator->errors();
        return Redirect::back()->withInput()->withErrors($errors);
      }else{

        $user = new User();
        $user->email = $request->input('email_address');
        $user->password = Hash::make($request->input('password'));
        $user->confirmpassword = Hash::make($request->input('password'));
        $user->role = $request->input('account_type');
        $user->status = 0;

        $user->save();

        $staff= new SummitStaff();
        $staff->AccUserID = $user->id;
        $staff->Firstname = $request->input('first_name');
        $staff->Lastname = $request->input('last_name');
        $staff->EmailAddress = $request->input('email_address');
        $staff->PhoneNumber = $request->input('phone');
        $staff->designation = $request->input('designation');

        $staff->save();

        $token = self::generateRandomString(16);

        $validate = new VerifyUser();
        $validate->user_id = $user->id;
        $validate->token = $token;
        $validate->save();


         Mail::send('emails.staff_verify',['name' => $staff->Firstname.' '.$staff->Lastname,'email'=>$staff->EmailAddress, 'password'=> $request->input('password'), 'url' => route('verify.account', $validate->token)],
              function ($message) use ($user) {
                $message->from('support@farwell-consultants.com', 'Welcome to Summit Recruitment');
                $message->to($user->email, $user->first_name);
                $message->subject('Account Verification');
          });
          Toastr::success('User has been created.');
          return redirect()->route('users.index');
      }
    // var_dump($request);

  }

public function show($id){

  $user = User::where('id','=', $id)->first();
  $jobs = JobAd::where('StaffID','=',$user->SummitStaff->id)->orderBy('ID','DESC')->paginate(7);

  return view('user.view', compact('user','jobs'));
}


public function edit($id){

  $user = SummitStaff::where('id','=', $id)->first();

  return view('user.edit', compact('user'));
}




public function update(Request $request, $id){



  $validator = Validator::make($request->except('_token'), [
  'first_name' => ['required', 'string', 'max:255'],
  'last_name' => ['required', 'string', 'max:255'],
  'email_address' => ['required', 'string', 'email', 'max:255'],
  'password' => ['required', 'string', 'min:8', 'confirmed'],
  'account_type' => ['required'],

      ],
    [
      'email.unique' => 'An account with a similar email address already exists.'
    ]

    );

  if ($validator->fails()) {
      $errors = $validator->errors();
      return Redirect::back()->withInput()->withErrors($errors);
    }else{



      $staff= SummitStaff::where('id','=', $id)->first();
      $staff->Firstname = $request->input('first_name');
      $staff->Lastname = $request->input('last_name');
      $staff->EmailAddress = $request->input('email_address');
      $staff->PhoneNumber = $request->input('phone');
      $staff->designation = $request->input('designation');

      $staff->update();

      $user = User::where('id','=', $staff->AccUserID)->first();
      $user->email = $request->input('email_address');
      $user->password = Hash::make($request->input('password'));
      $user->confirmpassword = Hash::make($request->input('password'));
      $user->role = $request->input('account_type');
      $user->status = 1;

      $user->update();

      if(Auth::user()->role == 0){
        Toastr::success('User successfully updated.');
        return redirect()->route('users.index');
      }else{
        Toastr::success('User successfully updated.');
        return redirect()->route('dashboard');
      }

    }
  // var_dump($request);

}
  /**
   * User profile edit.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function profile(Request $request)
  {
    //Get user
    $user = Auth::user();

    if ($request->isMethod('post')) {

      //Validate
      $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
      ]);

      

      //Save changes
      $staff = SummitStaff::where('AccUserID','=',$user->id)->first();

      $staff->Firstname = $request->input('first_name');
      $staff->Lastname = $request->input('last_name');
      $staff->PhoneNumber = $request->input('phone');
      $staff->designation = $request->input('designation');

      if ($staff->update()) {

         Toastr::success('Your profile has been successfully updated.');
        return  view('user.profile', ['user' => $user]);
      } else {
        
        Toastr::error('There was a problem updating your profile. Please try again later.');
        return  view('user.profile', ['user' => $user]);
      }
    }


    if(strpos(Auth::user()->email,'noemail')){
      $user->email = '';
    }

    return view('user.profile', ['user' => $user]);
  }


  public function profileImage(Request $request, $id){
if (!is_null($request->file('profile_image'))) {
    $extension = $request->file('profile_image')->getClientOriginalExtension();

    $user = User::where('id','=',$id)->first();

    $fileName = $user->SummitStaff->Firstname.'-'.$user->SummitStaff->Lastname.'.' . $extension;
    $originalName = $fileName;
    $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);
    
    $upload = $request->file('profile_image')->move('uploads/staff/', $originalName);//
    if ($upload) {

      $staff = SummitStaff::where('AccUserID','=',$id)->first();

      $staff->profilePhoto = $originalName;
      $staff->update();
      Toastr::success('User profile image updated.');
      return redirect()->back();
    }
}

  }



  /**
   * User profile edit.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function password(Request $request)
  {
    //Get user
    $user = Auth::user();

    if ($request->isMethod('post')) {

      //Validate
      $request->validate([
        'password' => ['required', 'string', 'min:8'],
      ]);

      //Get password
      $password = $request->input('password');

      //Save changes
      if ($user->update(['password' => Hash::make($password)])) {

        $this->resetEdxPassword($user, $password);
        Toastr::success('Password successfully updated.');
      } else {
        Toastr::error('There was a problem updating your password.');
      }
    }
    return view('user.password', ['user' => $user]);
  }

  /**
   * Function to recieve user's picture upload
   */
  public function picture(Request $request)
  {
    if (!Auth::check()) {
      return response('Unauthorized', 403);
    }
    $user = Auth::user();

    //Save to storage
    $ppic = $request->file('ppic');
    $extension = $ppic->getClientOriginalExtension();
    $filename = $ppic->getFilename() . '.' . $extension;
    Storage::disk('public')->put($filename,  File::get($ppic));

    //Delete old file
    Storage::disk('public')->delete($user->ppicFilename);

    //Save to user
    $user->ppicFilename = $filename;
    if ($user->save()) {

      //Show session message
      $redirectMessage = [
        'title' => 'Profile photo updated',
        'content' => 'Your profile photo has been successfully updated.',
        // 'action'=>'Google',
        // 'link'=>'google.com'
      ];
    } else {

      //Show session message
      $redirectMessage = [
        'title' => 'Profile photo update failed',
        'content' => 'Profile photo updating failed. Please try again later.',
        // 'action'=>'Google',
        // 'link'=>'google.com'
      ];
    }
    Session::flash('redirectMessage', $redirectMessage);
    return back();
  }

  /**
   * Function to edit user permissions
  */
  public function permissions($userId,Request $request){

    //Get user
    $user = User::findOrFail($userId);

    if ($request->isMethod('put')) {

        //Validate
        $request->validate([
          'general' => ['required'],
        ]);

        //Update general
        $user->is_admin = $request->input('general');
        // $user->is_ikadmin = $request->input('general');
        $user->save();

        //Delete all user related company admins
        CompanyAdmin::where('user_id',$user->id)->delete();

        if($request->input('company')){
          //Set company admin
          $companyAdmin = new CompanyAdmin;
          $companyAdmin->user_id = $user->id;
          $companyAdmin->company_id = $request->input('company');
          $companyAdmin->save();
        }

        Toastr::success('User successfully updated.');
      }
    return view('user.permissions',['user'=>$user,'companies'=>Company::all()]);
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

}
