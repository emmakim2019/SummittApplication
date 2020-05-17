@extends('layouts.admin')

@section('title','My Recruitement')


@section('content')
  <div class="card mb-5">
    <div class="card-header tab-form-header">
      My Job Ads
    </div>
    <div class="card-body">
      <table class="table" id="myJobAds" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Job Title</th>
          <th>Category</th>
           <th>Clients</th>
          <th>Job type</th>
          <th>Country</th>
          <th>Salary</th>
          <th>Deadline Date</th>
          <th>Tool</th>
        </tr>
      </thead>
    </table>
            </div>
          </div>

@endsection


