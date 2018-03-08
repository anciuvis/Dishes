@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges ir ar adminas --}}
<a href="{{ route($route) }}" class="btn btn-warning mb-1" name="create">{{ $name }}</a>
@endif
