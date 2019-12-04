@if(Session::has('success'))
	<p class="alert alert-success">{{Session::get('success')}}</p>
@endif

@foreach($success->all() as $s)
	<p class="alert alert-success">{{$s}}</p>
@endforeach