<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use App\RegistrationDetails;
use App\PersonalSummary;
use Redirect;
use App\User;
use App\LanguageList;
use App\Country;
use App\CvTable;
use App\HardSkill;
use App\Language;
use App\FurtherEducation;
use App\Subject;
use App\Specialization;
use App\ProfQualTitles;
use App\ProfQual;
use App\ProfBodies;
use App\Industry;
use App\IndustryFunctions;
use App\Currency;
use App\WorkExperience;
use App\WorkExperienceResponsibility;
use App\OtherInterest;

class EditProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
          //dd($user);
        //Save to storage
        $ppic = $request->file('ppic');
        $extension = $ppic->getClientOriginalExtension();
        $filename = $ppic->getFilename() . '.' . $extension;
        Storage::disk('public')->put($filename,  File::get($ppic));

        $photo = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
        //Delete old file
        Storage::disk('public')->delete($photo->CandidatePhoto);

        //Save to user
        //$user->ppicFilename = $filename;
        $photo = RegistrationDetails::where('AccUserID', Auth::user()->id)->update([
          'CandidatePhoto' => $filename
        ]);

        if ($photo) {

          return Redirect::back()->with('register_success', 'Your profile photo has been successfully updated.');
        } else {
          return Redirect::back()->with('register_error', 'Profile photo updating failed. Please refresh the page and try again.');
        }
      }

    public function editContact(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $validator = Validator::make($data, [
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email1' => ['string', 'email', 'max:255'],
        'phone' => ['required','numeric','digits_between:7,10'],
        'phone1' => ['numeric','digits_between:7,10'],
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();
        //dd($errors);
        return Redirect::back()->withErrors($errors);
      }

      if(isset($data['contactable'])){
        $contactable = 'Yes';
      }else{
        $contactable = 'No';
      }

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();
      if($cvdets != null){

      $details = DB::table('cv_table')
	      ->where('CandidateRegID', $user->CanditateRegID)
	      ->update([          
		     "Gender" => $data['gender'],           
		     "DOB" => $data['date'],              
		     "PhoneNumber" => $data['full_phone'],   
          "PhoneNumberOther" => @$data['full_phone1'],
          "EmailAddressOther" => @$data['email1'],       
		     "Contactable" => $contactable,    
		     "PO_BOX" => $data['pobox'],           
		     "PhysicalAddress" => $data['address'],  
		     "Nationality" => $data['nationality'],      
		     "Identification" => $data['identification'],   
		     "Passport_No" => $data['passport'],      
		     "Passport_Country" => $data['passport_country'], 
		     "ID_No"  => $data['id'],           
		     "ID_Country" => $data['country'],       
		     "DL"  => $data['licence'],              
		     "CarOwner" => $data['owner'],   
	      ]);

      	 return Redirect::back();

      }else{
      	 return Redirect::route('profile.create');
      }
      
    }

    public function editSummary(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();


      if(isset($data['summary'])){
      $validator = Validator::make($data, [
        'summary' => ['required', 'string', 'max:1000'],
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();
        //dd($errors);
        return Redirect::back()->withErrors($errors);
      }
      

        DB::table('cv_table')
        ->where('CV_ID', $cvdets->CV_ID)
        ->update([                           
         "PersonalSummary" => @$data['summary']
        ]);
      } 
      if(isset($data['linkedin'])){


        DB::table('cv_table')
        ->where('CV_ID', $cvdets->CV_ID)
        ->update([                        
         "LinkedInContact" => @$data['linkedin'], 
        ]);
      } 
      if(isset($data['skype'])){


        DB::table('cv_table')
        ->where('CV_ID', $cvdets->CV_ID)
        ->update([             
         "SkypeContact" => @$data['skype'],  
        ]);
      }

      if(isset($data['language1'])){

      $language = DB::table('language')
        ->where('CV_ID', $cvdets->CV_ID)
        ->update([             
        "Language1" => $data['language1'],
        "Fluency1" => $data['fluency1'],
        "Language2" => @$data['language2'],
        "Fluency2" => @$data['fluency2'],
        "Language3" => @$data['language3'],
        "Fluency3" => @$data['fluency3'],
        "Language4" => @$data['language4'],
        "Fluency4" => @$data['fluency4']
      ]);
      }

          if(isset($data['skill'])){
            PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('Skills','!=', '')->delete();

            foreach ($data['skill'] as $key => $value) {
            PersonalSummary::create([
            'CV_ID' => $cvdets->CV_ID, 
            'Skills' => $value,
            'Attributes' => ''
            ]);
            }

          }
          if(isset($data['attr'])){
            PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('Attributes','!=', '')->delete();
            foreach ($data['attr'] as $key => $value) {
            PersonalSummary::create([
            'CV_ID' => $cvdets->CV_ID, 
            'Attributes' => $value,
            'Skills' => ''
            ]);
            }
          }
          if(isset($data['hardskill'])){
            PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('HardSkills','!=', null)->delete();
            foreach ($data['hardskill'] as $key => $value) {
              //dd($value);
            PersonalSummary::create([
            'CV_ID' => $cvdets->CV_ID, 
            'HardSkills' => $value,
            'Attributes' => '',
            'Skills' => ''
            ]);
            }
          }

         return Redirect::back();
   
    }

    public function editFurtherEducation(Request $request)
    {
      $data = $request->all();
      
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();


      if(isset($data['educationid'])){

        FurtherEducation::where('FurtherEducationID', $data['educationid'])->update([
        "CV_ID" => $cvdets->CV_ID,
        "FormalEducation" => @$data['level'],
        "FurtherEducation" => @$data['furthered'],
        "QualificationTitle" => @$data['type'],
        "QualStartGradDate" => @$data['start_date'],
        "QualEndGradDate" => @$data['end_date'],
        "Institution" => @$data['institution'],
        "Subjects" => @$data['subject'],
        "Specialization" => @$data['specialization'],
      ]);

       return Redirect::back();

      }
    }

    public function editProffession(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();

          if($data['qualification'] == 'others'){
            $others = $data['qualification'];
            $qualification ='';
          }else{
            $others = '';
            $qualification = $data['qualification'];
          }

      if(isset($data['qualid'])){

        ProfQual::where('ProfQualID', $data['qualid'])->update([
        'CV_ID' => $cvdets->CV_ID, 
        'ProfessionalQualifications' => @$qualification, 
        'Other' => $others, 
        'StartDate' => @$data['start_date'], 
        'EndDate' => @$data['end_date'], 
        'ProfQualTitle' => @$data['title'],
      ]);
  

      }

      if(isset($data['bodyid'])){

        ProfBodies::where('ProfBodyID', $data['bodyid'])->update([
          'CV_ID' => $cvdets->CV_ID, 
          'ProfessionalBody' => $data['bodies'],
        ]);  

      }

       return Redirect::back();
      
    }

        public function editWork(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();
      if(isset($data['current'])){
        $current = 'Yes';
      }else{
        $current = 'No';
      }
      if(isset($data['contactref1'])){
        $contactref1 = 'Yes';
      }else{
        $contactref1 = 'No';
      }
      if(isset($data['workid'])){

      WorkExperience::where('WorkExpID', $data['workid'])->update([
          'CV_ID' => $cvdets->CV_ID, 
          'Title' => $data['title'], 
          'Company' => $data['company'], 
          'Sector' => $data['sector'], 
          'Industry_Functions' => $data['industry'], 
          'JobType' => $data['jobtype'], 
          'StartDate' => date("Y-m-d H:i:s", strtotime($data['start_date'])), 
          'CurrentDate' => $current, 
          'EndDate' => @date("Y-m-d H:i:s", strtotime($data['end_date'])), 
          'Line_Manager_Name' => @$data['line_name'], 
          'Line_Manager_Designation' => @$data['line_designation'], 
          'MonthlyGrossSalary' => intval($data['salary']), 
          'CurrencyID' => $data['currency'], 
          'Referee_Name' => $data['referee_name1'], 
          'Referee_Designation' => $data['referee_desg1'], 
          'Referee_Email' => $data['referee_email1'], 
          'Referee_Name2' => @$data['referee_name2'], 
          'Referee_Designation2' => @$data['referee_desg2'], 
          'Referee_Email2' => @$data['referee_email2'], 
          'Referee_Name3' => @$data['referee_name3'], 
          'Referee_Designation3' => @$data['referee_desg3'], 
          'Referee_Email3' => @$data['referee_email3'], 
          'Referee_Contact' => $contactref1, 
          'Referee_Phone' => $data['referee_phone1'], 
          'Referee_Phone2' => @$data['referee_phone2'], 
          'Referee_Phone3' => @$data['referee_phone3']
      ]);

      }

      if(isset($data['description'])){
        if(WorkExperienceResponsibility::where('WorkExpID', $data['workid'])->first() == null){
      WorkExperienceResponsibility::create([
        'WorkExpID' => $data['workid'],
        'Responsibility' => $data['description']
      ]);

        }else{
        WorkExperienceResponsibility::where('WorkExpID', $data['workid'])->update([
          'Responsibility' => $data['description']
        ]);
        }
      }

       return Redirect::back();
    }


    public function editInterest(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();

      if(OtherInterest::where('CV_ID', $cvdets->CV_ID)->first() != null){

      OtherInterest::where('CV_ID', $cvdets->CV_ID)->update([
        'Interests' => @$data['Interest1'],
        'Interest2' => @$data['Interest2'],
        'Interest3' => @$data['Interest3'],
        'Interest4' => @$data['Interest4'],
        'Interest5' => @$data['Interest5'],
      ]);
      }else{

      OtherInterest::create([
        'CV_ID' => $cvdets->CV_ID,
        'Interests' => @$data['Interest1'],
        'Interest2' => @$data['Interest2'],
        'Interest3' => @$data['Interest3'],
        'Interest4' => @$data['Interest4'],
        'Interest5' => @$data['Interest5'],
      ]);

      }

       return Redirect::back();
    }
}