<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Redirect;
use Toastr;
use Session;
use Validator;
use Auth;
use Notifications;

class CurrencyController extends Controller
{
    //

    public function index()
    {
        $currencies = Currency::all();
        return view('currency.index', compact('currencies'));
    }

    public function create(){
        return view ('currency.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->except('_token'), [
            'currencyname' => ['required', 'string'],
            'currencyrate' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // dd($errors);
            return Redirect::back()->withInput()->withErrors($errors);
        }else {

            $currency = new Currency();
            $currency->CurrencyName = $request->input('currencyname');
            $currency->CurrencyRate = $request->input('currencyrate');
            $currency->save();
            Toastr::success('Currency has been created.');
            return redirect()->route('currency.index');
        }
    }


    public function edit($id){

        $currency = Currency::where('CurrencyID','=',$id)->first();
        return view ('currency.edit',compact('currency'));

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->except('_token'), [
            'currencyname' => ['required', 'string'],
            'currencyrate' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            // dd($errors);
            return Redirect::back()->withInput()->withErrors($errors);
        }else {

            $insertdata = [
                'CurrencyName' => $request->input('currencyname'),
                'CurrencyRate' => $request->input('currencyrate')
            ];

            \DB::table('currency')->where('CurrencyID', $id)->update($insertdata);
            Toastr::success('Currency has been updated.');
            return redirect()->route('currency.edit', $id);
        }
    }


    public function view($id){
        $currency = Currency::where('CurrencyID','=', $id)->first();
        return view('currency.view',compact('currency'));
    }
}
