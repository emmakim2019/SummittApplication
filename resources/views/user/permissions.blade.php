@extends('layouts.admin')

@section('title','User Permissions')

@section('content')

<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Edit Permissions | {{$user->name}}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" method="POST" action="{{ route('users.permissions',$user->id) }}">
        <div class="kt-portlet__body">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input disabled id="name" type="name" class="form-control" value="{{ $user->name }}">

            </div>

            <div class="form-group">
                <label for="name">{{ __('Email') }}</label>
                <input disabled id="name" type="name" class="form-control" value="{{ $user->email }}">

            </div>

            <div class="form-group">
                <label for="name">{{ __('Username') }}</label>
                <input disabled id="name" type="name" class="form-control" value="{{ $user->username }}">

            </div>
            
            <div class="form-group">
                <label for="price">{{ __('Company Administrator') }}</label>
                <select class="form-control" name="company">
                    <option value="">None</option>
                    @foreach($companies as $company)
                        @if($user->is_company_admin)
                            @if($user->company_admined->company_id == $company->id)
                                <option value="{{$company->id}}" selected="selected">
                                    {{$company->name}}
                                </option>
                            @else
                                <option value="{{$company->id}}">
                                    {{$company->name}}
                                </option>
                            @endif
                        @else
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="more_info">{{ __('General Administrator') }}</label>
                <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="general" 
                    id="general" 
                    value="1"
                    <?php if($user->is_admin || $user->is_ikadmin){ echo 'checked="checked"'; } ?>
                >
                <label class="form-check-label" for="general">
                   Active
                </label>
                </div>
                <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="general" 
                    id="general" 
                    value="0" 
                    <?php if(!$user->is_admin || !$user->is_ikadmin){ echo 'checked="checked"'; } ?>
                >
                <label class="form-check-label" for="general">
                    Inactive
                </label>
                </div>
            </div>

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