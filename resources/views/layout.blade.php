<!DOCTYPE html>
<html>
<head>
	<title>Shopping Site</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
	<h1>Shopping Site</h1>
	<center>
		<a class="btn btn-warning col-lg-2" href="{{url('/')}}">Home</a>
		<a class="btn btn-warning col-lg-2" href="{{url('/view-cart')}}">Cart</a>
	</center>
	<br><br>
	@yield('content')
</div>
</body>
</html>