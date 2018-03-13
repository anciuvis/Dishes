@if(Auth::check() && in_array(Auth::user()->role, $users))
<form action="{{ route($route, $id) }}" method="POST">
	@csrf
	@method('DELETE')
	<input type="hidden" name="id" value="{{ $id }}">
	<button class="btn btn-danger btn-block mb-1">{{ $name }}</button>
</form>
@endif
