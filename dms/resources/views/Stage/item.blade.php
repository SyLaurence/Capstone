 <a href="/Stage/Activity/{{$activity->id}}/create">Create Item</a>
 <br>
 {{$activity->name}}
 <br>
 <hr>
 <br>
 @foreach($activity->itemsetup as $item)
 	@if($item->used_in == 0)
 		@if($item->severity == 0)
 			Low
 		@endif
 		@if($item->severity == 1)
 			Medium
 		@endif
 		@if($item->severity == 2)
 			High
 		@endif
 		 | {{$item->name}}  |  <a href="/Item/Criteria/{{$item->id}}">View Criteria</a>
 		<br>
 	@endif
 @endforeach