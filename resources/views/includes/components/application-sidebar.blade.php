<div id="side-applications" class="side-applications">

<div class="card">
  <div class="card-header">
    <h4>My Applications</h4>
  </div>
  <ul class="list-group list-group-flush">
    @foreach($jobCV as $jobcv)
    @if(isset($jobdets) && $jobdets->ID == $jobcv->ID)
    <li class="list-group-item active">
      <a href="{{ route('jobs.applied', $jobcv->ID)}}">
      <h5 class="text-white">{{$jobcv->JobTitle}}</h5>
      <span class="text-white">{{$jobcv->CareerLevel}} &nbsp;&nbsp;|&nbsp;&nbsp;{{$jobcv->LocationCity}}</span>
      </a>
    </li>
    @else
    <li class="list-group-item">
      <a href="{{ route('jobs.applied', $jobcv->ID)}}">
      <h5 class="text-primary">{{$jobcv->JobTitle}}</h5>
      <span class="text-grey">{{$jobcv->CareerLevel}} &nbsp;&nbsp;|&nbsp;&nbsp;{{$jobcv->LocationCity}}</span>
      </a>
    </li>
    @endif
    @endforeach
  </ul>
</div>  

</div>
