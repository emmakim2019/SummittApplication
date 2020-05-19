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

class IndustryController extends Controller
{
    //

    public function index(){

        $industries = Industry::all();
        return view ('industry.index', compact('industries'));

    }

    public function json()
    {
        print_r("Adadasdasd");die;
        $query = Industry::orderBy('id','ASC')->get();
        print_r($query);die;
        return Datatables::of($query)

            ->addColumn('full_salary', function ($list) {
                return $list->SalCurrency.', '.$list->GrossMonthSal;
            })
            ->addColumn('client', function ($list) {
                return $list->Clients->CompanyName;
            })
            ->rawColumns(['tools'])
            ->make();

    }

    public function create(){

        $industries = Industry::all();
        return view ('industry.create', compact('industries'));
    }

    public function store(Request $request){


        $validator = Validator::make($request->except('_token'), [
            'name' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // dd($errors);
            return Redirect::back()->withInput()->withErrors($errors);
        }else {

            $jobAd = new Industry();
            $jobAd->Name = $request->input('name');
            $jobAd->Parent = ($request->input('parent')) ? $request->input('parent') : null;
            $jobAd->Details = ($request->input('details')) ? $request->input('details') : null;
            $jobAd->save();
            Toastr::success('Industry has been created.');
            return redirect()->route('industry.index');
        }
    }


    public function edit($id){

        $industrydata = Industry::where('ID','=',$id)->first();
        $industries = Industry::all();
        return view ('industry.edit',compact('industrydata','industries'));

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->except('_token'), [
            'name' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // dd($errors);
            return Redirect::back()->withInput()->withErrors($errors);
        }else {

            $insertdata = [
                'Name' => $request->input('name'),
                'Parent' => ($request->input('parent')) ? $request->input('parent') : null,
                'Details' => ($request->input('details')) ? $request->input('details') : null
            ];
            \DB::table('industry')->where('id', $id)->update($insertdata);
            Toastr::success('Industry has been update.');
            return redirect()->route('industry.edit', $id);
        }
    }


    public function view($id){
        $industry = Industry::where('ID','=', $id)->first();
        return view('industry.view',compact('industry'));
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
