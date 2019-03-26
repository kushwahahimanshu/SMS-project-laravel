<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<style>
	.a{
		margin-top: 50px;
	}
	.b{
		margin-top: -6px;
	}
</style>
</head>
<body>
   <div class="container">
   	 <div class="row">
   	 	@if($errors->any())
   	 	<div class="alert alert-danger">
   	 		<ul>
   	 			@foreach($errors->all() as $error)
   	 			<li>{{$error}}</li>
   	 			@endforeach
   	 		</ul>
   	 	</div>
   	 	@endif
   	 	@if(session()->has("studentMessage"))
   	 	<div class="aler alert-success">
   	 		<p>{{session()->get("studentMessage")}}</p>
   	 	</div>
   	 	@endif
   	 	@section("body")

   	 	@show
   	 </div>
   </div>
</body>
</html>

