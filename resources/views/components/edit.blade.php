@if(Auth::check() && in_array(Auth::user()->role, $users))
<a href="{{ route($route, $id) }}" class="btn btn-warning mb-1" name="edit">{{ $name }}</a>
@endif
