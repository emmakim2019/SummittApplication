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
use App\Location;
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

class CandidateProfileController extends Controller
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


    public function create()
    {   
        $userdetails = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
        $cvdets = CvTable::where('CandidateRegID', $userdetails->CanditateRegID)->first();
        $countries = Country::all();
        $locations = Location::all();


        return view('candidates.create', compact('userdetails','countries','cvdets','locations'));
    }
    public function createSummary()
    {  
        $userdetails = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      	$cvdets = CvTable::where('CandidateRegID', $userdetails->CanditateRegID)->first();

        if($cvdets == null){

            $redirectError = [
                'title' => 'Sorry!',
                'content' => 'Kindly fill the following information.',
            ];
            Session::flash('redirectError', $redirectError);

            return Redirect::route('profile.create');
        }

      	$summary = PersonalSummary::where('CV_ID', $cvdets->CV_ID)->get();
        $y = 0;
        $lang = Language::where('CV_ID', $cvdets->CV_ID)->first();
        if(!empty($lang) && $lang->Language2 != null){
          $y++;
        }if(!empty($lang) && $lang->Language3 != null){
          $y++;
        }if(!empty($lang) && $lang->Language4 != null){
          $y++;
        }
        $attrs = [];
        $skills = [];
        $hskills = [];
        foreach ($summary as $key => $value) {
          array_push($attrs, $value->Attributes);
          array_push($skills, $value->Skills);
          array_push($hskills, $value->HardSkills);
        }
        $languages = LanguageList::orderBy('LanguageName', 'ASC')->get();
        $hardskills = HardSkill::orderBy('Name', 'ASC')->get();

        return view('candidates.createSummary', compact('languages','summary','hardskills','cvdets','attrs','skills','hskills','lang','y'));
    }

    public function createWork()
    {   
        $userdetails = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      	$cvdets = CvTable::where('CandidateRegID', $userdetails->CanditateRegID)->first();

        if(FurtherEducation::where('CV_ID',$cvdets->CV_ID)->first() == null){
            $redirectError = [
                'title' => 'Sorry!',
                'content' => 'Kindly fill the following information.',
            ];
            Session::flash('redirectError', $redirectError);
            
            return Redirect::route('profile.create.education');
        }

        $industry = Industry::all();
        $functions = IndustryFunctions::all();
        $currency = Currency::all();
        $work = WorkExperience::where('CV_ID', $cvdets->CV_ID)->get();
        $interests = OtherInterest::where('CV_ID', $cvdets->CV_ID)->get();
            $workresps = [];
            foreach ($work as $key => $value) {
                //dd($value);
              $workresps = WorkExperienceResponsibility::where('WorkExpID', $value->WorkExpID)->get();
            }
            //dd($workresps);

        return view('candidates.createWork', compact('industry','userdetails','cvdets','functions','currency','work','interests','workresps'));
    }
    public function createEducation()
    {   

        $userdetails = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      	$cvdets = CvTable::where('CandidateRegID', $userdetails->CanditateRegID)->first();

        //dd(PersonalSummary::where('CV_ID',$cvdets->CV_ID)->first());
        if(PersonalSummary::where('CV_ID',$cvdets->CV_ID)->first() == null){
            $redirectError = [
                'title' => 'Sorry!',
                'content' => 'Kindly fill the following information.',
            ];
            Session::flash('redirectError', $redirectError);

            return Redirect::route('profile.create.summary');
        }

        $education = FurtherEducation::where('CV_ID', $cvdets->CV_ID)->get();
        //dd($education);
        $subjects = Subject::all();
        $specializations = Specialization::all();
        $profs = ProfQualTitles::all();
        $qualifications = ProfQual::where('CV_ID', $cvdets->CV_ID)->get();
        $profbodies = ProfBodies::where('CV_ID', $cvdets->CV_ID)->get();
        //dd($profbodies);

        return view('candidates.createEducation', compact('subjects','userdetails','cvdets','education','specializations','profs','qualifications','profbodies'));
    }

    public function addcontact(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $validator = Validator::make($data, [
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email1' => ['string', 'email', 'max:255'],
        'full_phone' => ['required','string','max:13','min:10'],
        'phone1' => ['string','max:13','min:10'],
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
         "location" => $data['location'],  
		     "Nationality" => $data['nationality'],      
		     "Identification" => $data['identification'],   
		     "Passport_No" => $data['passport'],      
		     "Passport_Country" => $data['passport_country'], 
		     "ID_No"  => $data['id'],           
		     "ID_Country" => $data['country'],       
		     "DL"  => $data['licence'],              
		     "CarOwner" => $data['owner'],   
	      ]);

      	 return Redirect::route('profile.create.summary');
      }else{

      $details = CvTable::create([          
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
	     "CandidateRegID" => $user->CanditateRegID
      ]);

      }
      
      if($details){
      	 return Redirect::route('profile.create.summary');
      }else{
      	return Redirect::back()->withErrors("Sorry, something seems to have gone wrong. Please refresh and try again.");
      }
    }

    public function addSummary(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();

      $validator = Validator::make($data, [
        'language1' => ['required'],
        'fluency1' => ['required'],
      ]);
      if($cvdets->PersonalSummary == null){
        $errors = [
          'Please fill in your profile summary information. This is helpful for matching you with available opportunities.'
        ];
        return Redirect::back()->withErrors($errors);
      }

      if ($validator->fails()) {
        $errors = $validator->errors();
      	//dd($errors);
        return Redirect::back()->withErrors($errors);
      }

        DB::table('cv_table')
	      ->where('CV_ID', $cvdets->CV_ID)
	      ->update([             
		     "SkypeContact" => $data['skype'],           
		     "LinkedInContact" => $data['linkedin']
	      ]);

      if(Language::where('CV_ID', $cvdets->CV_ID)->first() == null){
	      Language::create([
		  	"CV_ID" => $cvdets->CV_ID,
		    "Language1" => $data['language1'],
		    "Fluency1" => $data['fluency1'],
		    "Language2" => @$data['language2'],
		    "Fluency2" => @$data['fluency2'],
		    "Language3" => @$data['language3'],
		    "Fluency3" => @$data['fluency3'],
		    "Language4" => @$data['language4'],
		    "Fluency4" => @$data['fluency4']
		  ]);
      }else{

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

      if(PersonalSummary::where('CV_ID', $cvdets->CV_ID)->first() != null){

      	PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('Skills','!=', '')->delete();
      	PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('Attributes','!=', '')->delete();
      	PersonalSummary::where('CV_ID', $cvdets->CV_ID)->where('HardSkills','!=', null)->delete();
      }

      foreach ($data['skill'] as $key => $value) {
      PersonalSummary::create([
	    'CV_ID' => $cvdets->CV_ID, 
	    'Skills' => $value,
	    'Attributes' => ''
	  	]);
      }


      foreach ($data['attr'] as $key => $value) {
      PersonalSummary::create([
	    'CV_ID' => $cvdets->CV_ID, 
	    'Attributes' => $value,
	    'Skills' => ''
	  	]);
      }


      foreach ($data['hardskill'] as $key => $value) {
        //dd($value);
      PersonalSummary::create([
	    'CV_ID' => $cvdets->CV_ID, 
	    'HardSkills' => $value,
	    'Attributes' => '',
	    'Skills' => ''
	  	]);
      }

      return Redirect::route('profile.create.education');
   
  	}


    public function addFurtherEducation(Request $request)
    {
      $data = $request->all();
      //dd($data);
      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

      $cvdets = CvTable::where('CandidateRegID', $user->CanditateRegID)->first();

        FurtherEducation::create([
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

    public function addProffession(Request $request)
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

	      ProfQual::create([
		  	'CV_ID' => $cvdets->CV_ID, 
		  	'ProfessionalQualifications' => @$qualification, 
		  	'Other' => $others, 
		  	'StartDate' => @$data['start_date'], 
		  	'EndDate' => @$data['end_date'], 
		  	'ProfQualTitle' => @$qualification,
		  ]);
    
	      ProfBodies::create([
	      	'CV_ID' => $cvdets->CV_ID, 
	      	'ProfessionalBody' => $data['bodies'],
	      ]);
    

       return Redirect::back();
	}


    public function addWork(Request $request)
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

      $wid = WorkExperience::create([
          'CV_ID' => $cvdets->CV_ID, 
          'Title' => $data['title'], 
          'Company' => $data['company'], 
          'Sector' => $data['sector'], 
          'Industry_Functions' => $data['industry'], 
          'JobType' => $data['jobtype'], 
          'StartDate' => date("Y-m-d H:i:s", strtotime($data['start_date'])), 
          'CurrentDate' => $current, 
          'EndDate' => @date("Y-m-d H:i:s", strtotime($data['end_date'])), 
          'Line_Manager_Name' => $data['line_name'], 
          'Line_Manager_Designation' => $data['line_designation'], 
          'MonthlyGrossSalary' => intval($data['salary']), 
          'CurrencyID' => $data['currency'], 
          'Referee_Name' => @$data['referee_name1'], 
          'Referee_Designation' => @$data['referee_desg1'], 
          'Referee_Email' => @$data['referee_email1'], 
          'Referee_Name2' => @$data['referee_name2'], 
          'Referee_Designation2' => @$data['referee_desg2'], 
          'Referee_Email2' => @$data['referee_email2'], 
          'Referee_Name3' => @$data['referee_name3'], 
          'Referee_Designation3' => @$data['referee_desg3'], 
          'Referee_Email3' => @$data['referee_email3'], 
          'Referee_Contact' => $contactref1, 
          'Referee_Phone' => @$data['referee_phone1'], 
          'Referee_Phone2' => @$data['referee_phone2'], 
          'Referee_Phone3' => @$data['referee_phone3']
      ]);
      //dd($wid);
      if(isset($data['description'])){
      WorkExperienceResponsibility::create([
        'WorkExpID' => $wid->id,
        'Responsibility' => $data['description']
      ]);
      }

       return Redirect::back();
	}

    public function addInterest(Request $request)
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

       return Redirect::route('home');
    }

    public function deleteFurtherEducation(Request $request)
    {
        $data= $request->id;
        $userinfo = FurtherEducation::where('FurtherEducationID', $data)->first();
        if($userinfo->FurtherEducation == 'Degree'){

        FurtherEducation::where('CV_ID', $userinfo->CV_ID)->where('FurtherEducation', '!=',null)->delete();

        }else{

        FurtherEducation::where('FurtherEducationID', $data)->delete();
        }


        return response()->json(['success'=>'Record Deleted.']);

    }

    public function deleteProffession(Request $request)
    {
        $qid= $request->qid;
        $bid= $request->bid;

        ProfQual::where('ProfQualID', $qid)->delete();
        ProfBodies::where('ProfBodyID', $bid)->delete();

        return response()->json(['success'=>'Record Deleted.']);

    }

    public function deleteWork(Request $request)
    {
        $wid= $request->wid;

        WorkExperienceResponsibility::where('WorkExpID', $wid)->delete();
        WorkExperience::where('WorkExpID', $wid)->delete();

        return response()->json(['success'=>'Record Delete.']);

    }

}
