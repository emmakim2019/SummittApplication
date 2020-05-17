<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Clients;
use App\Country;
use App\Currency;
use App\Industry;
use App\Location;
use App\JobAd;
use App\SummitStaff;
use App\JobRequirement;
use App\JobDuty;
use App\PreQualTest;
use App\PreQualAnswers;
use App\CandidateAnswers;
use App\RegistrationDetails;
use App\CvTable;
use App\JobCV;
use App\User;

use Redirect;
use Toastr;
use Session;
use Validator;
use Auth;
use Notifications;

class JobAdController extends Controller
{
    //

    public function index(){

    	return view ('jobAds.index');

    }

     public function json()
  {
      $query = JobAd::with('Clients')->orderBy('id','ASC')->get();

      return Datatables::of($query)

          ->addColumn('full_salary', function ($list) {
          	    return $list->SalCurrency.', '.$list->GrossMonthSal;
            })
          ->addColumn('client', function ($list) {
                return $list->Clients->CompanyName;
            })
        ->addColumn('tools', function ($list) {
        	if (Auth::user()->role == 0){
        		 return '
        <span style="overflow: visible; position: relative; width: 110px;">
        <a title="View details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="'.route('jobAds.show',$list->ID).'">
           <i class="fas fa-eye"></i>
          </a>
          <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="' . route('jobAds.edit', $list->ID) . '">
            <i class="fas fa-edit"></i>
          </a>
          <a
            title="Delete"
            class="btn btn-sm btn-clean btn-icon btn-icon-sm"
            data-href="#"
            data-toggle="modal"
            data-target="#deleteConfirmModal"
            >
            <i class="far fa-trash-alt"></i>
          </a>
          
      </span>';
      }else{

      	 return '
        <span style="overflow: visible; position: relative; width: 110px;">
        <a title="View details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="'.route('jobAds.show',$list->ID).'">
           <i class="fas fa-eye"></i>
          </a>
          <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="' . route('jobAds.edit', $list->ID) . '">
            <i class="fas fa-edit"></i>
          </a>
      </span>';

       }

        })
        ->rawColumns(['tools'])
        ->make();

  }

  public function create(){
  	$clients = Clients::all();
  	$industries = Industry::all();
  	$currencies = Currency::all();
  	$countries = Country::all();
  	$locations = Location::all();
    $staff = SummitStaff::all();

    return view ('jobAds.create',compact('clients','industries','currencies','countries','locations','staff'));
  }

  public function store(Request $request){

    $validator = Validator::make($request->except('_token'), [
    'client_name' => ['required'],
    'job_title' => ['required', 'string'],
    'job_category' => ['required'],
    'summary' => ['required'],
    'education_level'=>['required'],
    'job_type'=>['required'],
    'location_city'=>['required'],
    'location_country'=>['required'],
    'salary_currency'=>['required'],
    'monthly_salary'=>['required'],
    'show_salary'=>['required'],
    'career_level'=>['required'],
    'deadline'=>['required'],
    'revenue'=>['required'],
    'candidate_placed'=>['required'],
    'staff_assigned'=>['required'],
      ]);

    if ($validator->fails()) {
        $errors = $validator->errors();

        // dd($errors);
        return Redirect::back()->withInput()->withErrors($errors);
      }else{

        $jobAd = new JobAd();
        $jobAd->ClientID = $request->input('client_name');
        $jobAd->JobTitle = $request->input('job_title');
        $jobAd->Category = $request->input('job_category');
        $jobAd->Summary = $request->input('summary');
        $jobAd->MinEduReq = $request->input('education_level');
        $jobAd->JobType = $request->input('job_type');
        $jobAd->LocationCity = $request->input('location_city');
        $jobAd->LocationCountry = $request->input('location_country');
        $jobAd->SalCurrency = $request->input('salary_currency');
        $jobAd->GrossMonthSal = $request->input('monthly_salary');
        $jobAd->ShowSal = $request->input('show_salary');
        $jobAd->CareerLevel = $request->input('career_level');
        $jobAd->Deadline = $request->input('deadline');
        $jobAd->revenue = $request->input('revenue');
        $jobAd->CandidatePlaced = $request->input('candidate_placed');
        $jobAd->StaffID = $request->input('staff_assigned');
        $jobAd->created_by = Auth::user()->id;
        $jobAd->AnnualPercentageRevenue = 14;

        $jobAd->save();

        $requirement= $_POST['JobFields']['requirements'];

        foreach ($requirement as $req){
        	$require = new JobRequirement();
        	$require->JobID = $jobAd->id;
        	$require->Requirement = $req;
        	$require->save();
        }



        $duties = $_POST['JobFields']['duties'];

          foreach ($duties as $dut) {

            $jobDutiesModel = new JobDuty;
            $jobDutiesModel->JobID = $jobAd->id;
            $jobDutiesModel->Duty  = $dut;
            $jobDutiesModel->save();


           }

           $details = [
                    'taskid' => $jobAd->ID,
                    'title' => 'You have been assigned an new Job',
                    'body' => 'A new job titled'. $jobAd->JobTitle. 'has been created and assigned to you.',
                    'type' => 'job',
            ];

            $staff = SummitStaff::where('id','=',$jobAd->StaffID)->first();

            $user = User::where('id','=',$staff->AccUserID)->first();

            $user->notify(new \App\Notifications\StaffNotification($details));

           Toastr::success('Job Application has been created.');
          return redirect()->route('jobAds.index');
      }

  }


  public function edit($id){

    $job = JobAd::where('ID','=',$id)->first();
  	$clients = Clients::all();
  	$industries = Industry::all();
  	$currencies = Currency::all();
  	$countries = Country::all();
  	$locations = Location::all();
    $staff = SummitStaff::all();

    return view ('jobAds.edit',compact('job','clients','industries','currencies','countries','locations','staff'));

  }

  public function update(Request $request, $id)
  {

    //dd($request->input('staff_assigned'));
      $validator = Validator::make($request->except('_token'), [
    'client_name' => ['required'],
    'job_title' => ['required', 'string'],
    'job_category' => ['required'],
    'summary' => ['required'],
    'education_level'=>['required'],
    'job_type'=>['required'],
    'location_city'=>['required'],
    'location_country'=>['required'],
    'salary_currency'=>['required'],
    'monthly_salary'=>['required'],
    'show_salary'=>['required'],
    'career_level'=>['required'],
    'deadline'=>['required'],
    'revenue'=>['required'],
    'candidate_placed'=>['required'],
    'staff_assigned'=>['required'],
        ]);

    if ($validator->fails()) {
        $errors = $validator->errors();

        // dd($errors);
        return Redirect::back()->withInput()->withErrors($errors);
      }else{



        $jobAd = JobAd::where('id','=',$id)->first();
        $jobAd->ClientID = $request->input('client_name');
        $jobAd->JobTitle = $request->input('job_title');
        $jobAd->Category = $request->input('job_category');
        $jobAd->Summary = $request->input('summary');
        $jobAd->MinEduReq = $request->input('education_level');
        $jobAd->JobType = $request->input('job_type');
        $jobAd->LocationCity = $request->input('location_city');
        $jobAd->LocationCountry = $request->input('location_country');
        $jobAd->SalCurrency = $request->input('salary_currency');
        $jobAd->GrossMonthSal = $request->input('monthly_salary');
        $jobAd->ShowSal = $request->input('show_salary');
        $jobAd->CareerLevel = $request->input('career_level');
        $jobAd->Deadline = $request->input('deadline');
        $jobAd->revenue = $request->input('revenue');
        $jobAd->CandidatePlaced = $request->input('candidate_placed');
        $jobAd->StaffID = $request->input('staff_assigned');
        $jobAd->created_by = Auth::user()->id;
        $jobAd->AnnualPercentageRevenue = 14;

        $jobAd->update();

       // dd($jobAd->update());


        JobRequirement::where('JobID','=', $id)->delete();

        $requirement= $_POST['JobFields']['requirements'];

        foreach ($requirement as $req){
        	$require = new JobRequirement();
        	$require->JobID = $id;
        	$require->Requirement = $req;
        	$require->save();
        }


       JobDuty::where('JobID','=', $id)->delete();

        $duties = $_POST['JobFields']['duties'];

          foreach ($duties as $dut) {

            $jobDutiesModel = new JobDuty;
            $jobDutiesModel->JobID = $id;
            $jobDutiesModel->Duty  = $dut;
            $jobDutiesModel->save();

           }
            $details = [
                    'taskid' => $jobAd->ID,
                    'title' => 'The job titled '. $jobAd->JobTitle. ' has been edited',
                    'body' => 'Changes have been made to the job you are assigned too.',
                    'type' => 'job',
            ];

            $staff = SummitStaff::where('id','=',$jobAd->StaffID)->first();

            $user = User::where('id','=',$staff->AccUserID)->first();

            $user->notify(new \App\Notifications\StaffNotification($details));


           Toastr::success('Job Application has been Updated.');

          return redirect()->route('jobAds.index');

        }
    }


  public function show($id){

    $job = JobAd::where('ID','=', $id)->first();
    $requirements = JobRequirement::where('JobID','=',$id)->get();
    $duties = JobDuty::where('JobID','=',$id)->get();
    $applications = JobCV::where('Job_adID','=',$id)->paginate(10);

    return view('jobAds.view',compact('job','requirements','duties','applications'));
  }

    public function apply(Request $request, $id)
    {
        $jobs = JobAd::take(5)->get();
        $jobAd = JobAd::where('id','=',$id)->first();

        $questions = PreQualTest::where('ID','=', $id)->get();
        //$answers = [];
        foreach ($questions as $key => $value) {
          # code...
          $answers[] = PreQualAnswers::where('PreQualTestID','=', $value->PreQualTestID)->get();
        }

        return view ('jobApplications.preQualTest',compact('jobAd','questions','answers','jobs'));

    }

    public function sendtest(Request $request)
    {

      $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();
      $applied = CandidateAnswers::where('CV_ID','=',$cvdets->CV_ID)->where('ID','=',$request->jobid)->get();
      //dd(count($applied));
      if(count($applied) > 0){

      $redirectError = [
          'title' => 'Application Already Sent!',
          'content' => 'You have already completed the pre-qualification questions and sent your application. Please check your email for a confirmation email',
      ];
      Session::flash('redirectError', $redirectError);

      return redirect()->back();
      }

      $answers = new CandidateAnswers;
      $questions = PreQualTest::where('ID','=', $request->jobid)->get();

      foreach ($questions as $key => $value) {
        # code...
        $answers->ID = $request->jobid;
        $answers->CV_ID = $cvdets->CV_ID;
        $answers->AnswerID = $value->PreQualTestID;
        $answers->Answer = $request[$value->PreQualTestID];
        $answers->save();

        $marks = PreQualAnswers::where('PreQualTestID','=', $value->PreQualTestID)->get();

      }

      $total = 0;
      foreach ($marks as $mark) {
        $total = $total + $mark->Marks;
      }

        $jobcv = new JobCV;
        $jobcv->CV_ID = $cvdets->CV_ID;
        $jobcv->Job_adID = $request->jobid;
        $jobcv->CandidateMarks = $total;
        $jobcv->MarkRead = 0;
        $jobcv->save();

      if($answers){
        $redirectMessage = [
            'title' => 'Application Sent!',
            'content' => 'You have successfully applied for the job. An email will be sent to your email address as confirmation. Only shortlisted candidates will be contacted.',
        ];
        Session::flash('redirectMessage', $redirectMessage);
      }else{
        $redirectError = [
            'title' => 'Application Incomplete!',
            'content' => 'Something went wrong wth your application. Please refersh the page and complete all the questions before submitting an applction',
        ];
        Session::flash('redirectError', $redirectError);
      }


      return redirect()->back();

    }

    public function applications()
    {
      $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();
      $jobcvs = JobCV::where('CV_ID','=', $cvdets->CV_ID)->get();
      $jobCV = [];
      foreach ($jobcvs as $key => $value) {
        # code...
        $cv = JobAd::where('ID','=',$value->Job_adID)->first();
        array_push($jobCV, $cv);
        $jobCV[$key]['status'] = $value->MarkRead; 

      } 

      $jobs = JobAd::take(5)->get();
      $categories = Industry::all();

        return view ('jobApplications.MyApplications',compact('jobCV','jobs','categories'));

    }

    public function applied(Request $request, $id)
    {
      $details = RegistrationDetails::where('AccUserID', Auth::user()->id)->first();
      $cvdets = CvTable::where('CandidateRegID', $details->CanditateRegID)->first();

      $jobdets = JobAd::where('ID','=', $id)->first();
      $jobreqs = JobRequirement::where('JobID','=', $id)->get();
      $jobdutys = JobDuty::where('JobID','=', $id)->get();

      $jobcvs = JobCV::where('CV_ID','=', $cvdets->CV_ID)->get();
      $jobCV = [];
      foreach ($jobcvs as $key => $value) {
        # code...
      $CV = JobAd::where('ID','=',$value->Job_adID)->first();
        array_push($jobCV, $CV);

      }

      $jobs = JobAd::take(5)->get();

        return view ('jobApplications.SingleApplication',compact('jobCV','jobs','jobdets','jobreqs','jobdutys'));

    }
}
