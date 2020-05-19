@extends('layouts.admin')

@section('title','Industry')


@section('content')
    <div class="row user-add-button">
        <a href="{{route('industry.index')}}" class="btn btn-warning btn-icon-split" style="margin-right: 15px;">
            <span class="icon"><i class="fas fa-plus"></i></span>
            <span class="text">Industry List</span> </a>
    </div>
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add a Industry
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('industry.store') }}"
              enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name')  }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
            </div>

            <div class="kt-portlet__body">

                @csrf
                <div class="form-group">
                    <label for="parent">Parent</label>
                    <select id="parent" name="parent"
                            class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" required>
                        <option selected value=" ">Select Parent</option>
                        @foreach($industries as $industry)
                            <option value="{{$industry->ID}}">{{$industry->Name}}
                        @endforeach
                    </select>

                    @if ($errors->has('parent'))
                        <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('parent') }}</strong>
            </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" id="details" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">{{ old('details')  }}</textarea>
                @if ($errors->has('details'))
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('details') }}</strong>
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
