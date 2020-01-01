@extends('layout')	
@section('content')
	<h2 align="center">Your Cart Products</h2>
	<table class="table">
		<thead>
			<tr>
				<th>Sl</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Action</th>
			</tr>
		</thead>
		@if(Session::has('cart'))
		<tbody>
		@php
			$total = 0;
			$i = 1;
		@endphp
		@foreach($value as $data)
			@php
			 $total = $total + $data['price'] * $data['qty'];		
			@endphp
			<tr>
				<form action="{{url('/edit-cart')}}" method="post">
				@csrf
				<td>{{ $i++ }}</td>
				<td><input type="hidden" name="id" value="{{ $data['id'] }}">{{ $data['name'] }}</td>
				<td><input type="hidden" name="price" value="{{ $data['price'] }}">{{ $data['price'] }}</td>
				<td><input type="text" name="qty" value="{{ $data['qty'] }}" class="form-control col-lg-6"></td>
				<td>{{ $data['price'] * $data['qty'] }}</td>
				<td>
					<input type="hidden" name="name" value="{{$data['name']}}">
					<input type="submit" name="event" value="update" class="btn btn-warning">
					<input type="submit" name="event" value="delete" class="btn btn-danger">
				</td>
				</form>
			</tr>
		@endforeach
			<tr>
				<td colspan="4">Total</td>
				<td colspan="2">{{ $total }}</td>
			</tr>
		</tbody>
		@endif
	</table>
	<a href="index.php" class="btn btn-primary">Continue Shopping</a>
@endsection