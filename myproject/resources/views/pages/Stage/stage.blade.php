<a href="Stage/create">Add Stage</a>
<br>
<br>
@foreach ($stages as $stage)
	{{$stage->strSSPName}} | {{$stage->intSSPNumber}} | <a href="/Stage/{{$stage->intSSPID}}/edit"> Edit </a><br>
@endforeach