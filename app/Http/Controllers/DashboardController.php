<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\JobAd;

use Auth;

class DashboardController extends Controller
{
    //

    public function  dashboard(){



    	return view ('dashboard');
    }


    public function json()
  {

      $query = JobAd::where('StaffID','=',Auth::user()->SummitStaff->id)->orderBy('id','ASC')->get();


      return Datatables::of($query)

          ->addColumn('full_salary', function ($list) {
                return $list->SalCurrency.', '.$list->GrossMonthSal;
            })
          ->addColumn('client', function ($list) {
                return $list->Clients->CompanyName;
            })
        ->addColumn('tools', function ($list) {
          
             return '
        <span style="overflow: visible; position: relative; width: 110px;">
        <a title="View details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="'.route('jobAds.show',$list->ID).'">
           <i class="fas fa-eye"></i>
          </a>
          <a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-sm" href="' . route('jobAds.edit', $list->ID) . '">
            <i class="fas fa-edit"></i>
          </a>
      </span>';
        })
        ->rawColumns(['tools'])
        ->make();



  }
}
