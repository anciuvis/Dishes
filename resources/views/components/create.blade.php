@if(Auth::check() && in_array(Auth::user()->role, $users))
<a href="{{ route($route) }}" class="btn btn-secondary mb-1 btn-block" name="create">{{ $name }}</a>
@endif
