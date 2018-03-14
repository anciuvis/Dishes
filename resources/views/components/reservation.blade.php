<tr>
	<th scope="row">{{ $reservation->id }}</th>
	<td>
		{{ $reservation->name }}
	</td>
	<td>
		{{ $reservation->people_amount }}
	</td>
	<td>
		{{ $reservation->date }} {{ $reservation->time }}
	</td>
	<td>
		{{ $reservation->created_at }}
	</td>
	<td>
		{{ $reservation->phone }}
	</td>
	@if(Auth::check() && Auth::user()->role == 'admin')
	<td>
		edit delete
	</td>
	@endif
</tr>
