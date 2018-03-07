@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges --}}
<form action="{{ route($route, $id) }}" method="POST">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger btn-block">{{ $name }}</button>
</form>
@endif
