@extends('layouts.app')
@section('content')
	<div class="container w-75">

		<h1>Orders ()</h1>

		<div class="panel panel-default">
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Orders</th>
						<th>User</th>
						<th>Address</th>
						<th>Total Amount</th>
						<th>Tax Amount</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					@component('components/order', [
					'order'		=> $order,
					])
					@endcomponent
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
