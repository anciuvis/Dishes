@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges --}}
<form action="{{ route($route, $id) }}" method="POST">
	{{ method_field("DELETE")}}
	{{ csrf_field() }}
	<button class="btn btn-danger btn-block">{{ $name }}</button>
</form>
@endif
