@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges --}}
<form action="{{ route($route, $id) }}" method="POST">
	@csrf
	@method('DELETE')
	<button class="btn btn-danger btn-block mb-1">{{ $name }}</button>
</form>
@endif
