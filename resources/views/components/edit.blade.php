@if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar prisijunges --}}
<a href="{{ route($route, $id) }}" class="btn btn-success" name="edit">{{ $name }}</a>
@endif
