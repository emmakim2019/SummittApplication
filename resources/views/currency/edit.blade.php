@extends('layouts.admin')

@section('title','Currency')


@section('content')

    <div class="row user-add-button">
        <a href="{{route('currency.index')}}" class="btn btn-warning btn-icon-split" style="margin-right: 15px;">
            <span class="icon"><i class="fas fa-plus"></i></span>
            <span class="text">Currency List</span> </a>
        <a href="{{route('currency.create')}}" class="btn btn-primary btn-icon-split" style="margin-right: 15px;">
            <span class="icon"><i class="fas fa-plus"></i></span>
            <span class="text">New Currency</span> </a>
    </div>


    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Edit a Currency
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('currency.update',$currency->CurrencyID) }}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="currencyname">Currency Name</label>
                <input id="currencyname" type="currencyname" class="form-control{{ $errors->has('currencyname') ? ' is-invalid' : '' }}" name="currencyname" value="{{ $currency->CurrencyName  }}" required>

                @if ($errors->has('currencyname'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('currencyname') }}</strong>
            </span>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Currency Rate</label>
                <input id="currencyrate" type="currencyrate" class="form-control{{ $errors->has('currencyrate') ? ' is-invalid' : '' }}" name="currencyrate" value="{{ $currency->CurrencyRate  }}" required>

                @if ($errors->has('currencyrate'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('currencyrate') }}</strong>
            </span>
                @endif
            </div>

            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
@endsection
