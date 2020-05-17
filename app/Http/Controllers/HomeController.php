<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Ixudra\Curl\Facades\Curl;
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
use App\JobAd;
use App\Ticket;
use Illuminate\Notifications\Notifiable;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role == 2){
            $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
            $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();
            //dd($cvdets);
            if(CvTable::where('CandidateRegID', $details->CanditateRegID)->first() == null){

            $redirectError = [
                'title' => 'Welcome to the Summit Recruitment and Search Portal',
                'content' => 'Create your profile by filling in your education and professional background information. This is helpful for matching you with available opportunities.',
            ];

            Session::flash('redirectError', $redirectError);
            return Redirect::route('profile.create');

            }elseif(PersonalSummary::where('CV_ID',$cvdets->CV_ID)->first() == null){
                
            $redirectError = [
                'title' => 'Notice!',
                'content' => 'Kindly fill all the relevant information in this section. This is helpful for matching you with available opportunities.',
            ];
            Session::flash('redirectError', $redirectError);
            return Redirect::route('profile.create.summary');

            }elseif(FurtherEducation::where('CV_ID', $cvdets->CV_ID)->first() == null){
                
            $redirectError = [
                'title' => 'Notice!',
                'content' => 'Kindly fill all the relevant information in this section. This is helpful for matching you with available opportunities.',
            ];
            Session::flash('redirectError', $redirectError);
            return Redirect::route('profile.create.education');

            }else{
            $jobs = JobAd::take(5)->get(); 

            $exps = WorkExperience::where('CV_ID', $cvdets->CV_ID)->get();
            $summary = PersonalSummary::where('CV_ID', $cvdets->CV_ID)->get();
            $y = 0;
            $lang = Language::where('CV_ID', $cvdets->CV_ID)->first();
            if($lang == null){
              $y = 0;
            }else{
            if($lang->Language2 != null){
              $y++;
            }if($lang->Language3 != null){
              $y++;
            }if($lang->Language4 != null){
              $y++;
            }
              
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

            $education = FurtherEducation::where('CV_ID', $cvdets->CV_ID)->get();
            $subjects = Subject::all();
            $specializations = Specialization::all();
            $profs = ProfQualTitles::all();
            $qualifications = ProfQual::where('CV_ID', $cvdets->CV_ID)->get();
            $profbodies = ProfBodies::where('CV_ID', $cvdets->CV_ID)->get();

            $industry = Industry::all();
            $functions = IndustryFunctions::all();
            $currency = Currency::all();
            $work = WorkExperience::where('CV_ID', $cvdets->CV_ID)->get();
            //dd($work);
            $workresps = [];

            foreach ($work as $key => $value) {
                //dd($value);
              $workresps = WorkExperienceResponsibility::where('WorkExpID', $value->WorkExpID)->get();
            }
            $interests = OtherInterest::where('CV_ID', $cvdets->CV_ID)->get();
            //dd($interests);

            $countries = Country::all();  

            return view('candidates.home', compact('jobs','details','cvdets','languages','summary','hardskills','attrs','skills','hskills','lang','y','subjects','education','specializations','profs','qualifications','profbodies','countries','industry','functions','currency','work','interests','workresps'));
            }
            
        }elseif(Auth::user()->role == 0 || Auth::user()->role == 1){

            return redirect()->route('dashboard');
        }
    }

}
