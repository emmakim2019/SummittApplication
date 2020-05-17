Job Ad Management<div class="aside">
<div id="sidemenu" class="sidemenu">
<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-bars"></i> Close Menu</a></li>
      <?php foreach (config('app-constants.profile') as $el) : ?>
      @if (\Route::current()->getName() == $el['route'] || (strpos(\Request::url(), $el['route']) !== false))
    <li class="list-group-item active"><a href="{{route($el['route'])}}" class="text-white">{{$el['title']}}</a></li>
                              @else
    <li class="list-group-item"><a href="{{route($el['route'])}}" class="text-white">{{$el['title']}}</a></li>
                              @endif

    <?php endforeach; ?>
  </ul>
</div>


</div>

<div id="sidejobs" class="sidejobs">
<div class="card">
  <div class="card-header">
    Top Jobs in my industry
  </div>
  <ul class="list-group list-group-flush">
  	@foreach($jobs as $job)
    <li class="list-group-item">
    	<h4>{{$job->JobTitle}}</h4>
    	<span>Deadline - {{$job->Deadline}}</span>
    	<p>
        <?php
        $str = $job->Summary;
        if (strlen($str) > 90) {
          $str = substr($str, 0, 90) . '...';
        }
        echo $str;
        ?></p>
    	<a href="#">Read more</a>
    </li>
    @endforeach
  </ul>
</div>	
</div>

</div>