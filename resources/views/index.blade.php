@extends('layout')	
@section('content')
<table class="table">
	<thead>
		<tr>
			<th>Sr</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<td>Quantity</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	@php 
		$i = 1;
	@endphp		
	@foreach($value as $data)
		<form action="{{url('/add-to-cart')}}" method="post">
			@csrf
		<tr>
			<td>{{ $i++ }}</td>
			<td>{{ $data->name }}</td><input type="hidden" name="id" value="{{ $data->id }}">
			<td><img src="{{asset('image/'.$data->image)}}"></td><input type="hidden" name="name" value="{{$data->name}}">
			<td>{{ $data->price }}</td><input type="hidden" name="price" value="{{$data->price}}">
			<td><input type="text" class="form-control col-lg-6" name="qty" value="1"></td>
			<td><input type="submit" name="" value="Add Cart" class="btn btn-primary"></td>
		</tr>
		</form>		
	@endforeach
	</tbody>
</table>
@endsection