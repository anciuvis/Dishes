@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges ir ar adminas --}}
<a href="{{ route($route) }}" class="btn btn-secondary mb-1 btn-block" name="create">{{ $name }}</a>
@endif
