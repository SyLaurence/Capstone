<a href='Stage/create'>Create Activity</a>

@while($ctr<=$lastStage)
		<br>
		<hr>
		<br>
		Stage {{$ctr}}:
		<br>
	@foreach($Activities as $activity)
		@if($activity->stage_no == $ctr)
		{{$activity->name}}
		@if($activity->type == 1)
			<a href="Stage/Activity/{{$activity->id}}"> View items </a>
		@endif
		@if($activity->type == 2)
			<a href="#"> Interview </a>
		@endif
		<br>
		@endif
	@endforeach
	<input type="text" id="hdctr" value="{{$ctr++}}" hidden>
@endwhile
