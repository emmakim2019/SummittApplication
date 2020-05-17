<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;
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

class CurriculumVitaeController extends Controller
{
    //
        public function view()
    {
        
        $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
        //dd($details);
        $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();

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
            //dd($profbodies);
            $industry = Industry::all();
            $functions = IndustryFunctions::all();
            $currency = Currency::all();
            $work = WorkExperience::where('CV_ID', $cvdets->CV_ID)->get();
            $workresps = [];
            foreach ($work as $key => $value) {
                //dd($value);
              $workresps = WorkExperienceResponsibility::where('WorkExpID', $value->WorkExpID)->get();
            }
            $interests = OtherInterest::where('CV_ID', $cvdets->CV_ID)->get();

            $countries = Country::all();  

            return view('cv.upload', compact('jobs','details','cvdets','languages','summary','hardskills','attrs','skills','hskills','lang','y','subjects','education','specializations','profs','qualifications','profbodies','countries','industry','functions','currency','work','interests','workresps'));
        
    }

        public function upload(Request $request)
    {

        $cv = $request->file('file');
        $extension = $cv->getClientOriginalExtension();
        $filename = $cv->getFilename() . '.' . $extension;
        Storage::disk('public')->put($filename,  File::get($cv));

        $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();

        Storage::disk('public')->delete($user->CVUpload);


      $user = RegistrationDetails::where('AccUserID', Auth::user()->id)->update([
            'CVUpload' => $filename
      ]);

      return $user;

     }    

        public function export()
    {
        $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
        //dd($details);
        $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();

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
            //dd($profbodies);
            $industry = Industry::all();
            $functions = IndustryFunctions::all();
            $currency = Currency::all();
            $work = WorkExperience::where('CV_ID', $cvdets->CV_ID)->get();
            $workresps = [];
            foreach ($work as $key => $value) {
                //dd($value);
              $workresps = WorkExperienceResponsibility::where('WorkExpID', $value->WorkExpID)->get();
            }
            $interests = OtherInterest::where('CV_ID', $cvdets->CV_ID)->get();

            $countries = Country::all();  

            //return view('cv.export', compact('jobs','details','cvdets','languages','summary','hardskills','attrs','skills','hskills','lang','y','subjects','education','specializations','profs','qualifications','profbodies','countries','industry','functions','currency','work','interests','workresps'));


            $pdf = PDF::loadView('cv.export', compact('jobs','details','cvdets','languages','summary','hardskills','attrs','skills','hskills','lang','y','subjects','education','specializations','profs','qualifications','profbodies','countries','industry','functions','currency','work','interests','workresps'));

            return $pdf->download('cv.pdf');

            //return $pdf->stream();
    }

}
