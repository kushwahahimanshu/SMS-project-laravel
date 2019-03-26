@extends("student.layouts.master")
@section("title","This is create page")
@section("body")

<div class="panel panel-primary">
 	<div class="panel-heading"><!-- create form -->
 		{{ ucfirst(substr(Route::currentRouteName(),8)) }} student <!-- route student.edit -->  <!-- here ucfirst for first latter capital and substr for skip the first 8 char of route name -->
 		<a href="{{ url('student')}}" class="btn btn-info pull-right b">>Back</a>
 		
 	</div>
 	<div class="panel-body">
 <form method="post" action="/student/@yield('studentId')" enctype="multipart/form-data">
 	{{csrf_field()}}

 	@section("editMethod")
 	@show
 	<div class="form-group">
 		<label for="name">Name</label>
 		<input type="text" name="name" class="form-control" id="name" value="@yield('studentName')">
 	</div>
 	<div class="form-group">
 		<label for="email">Email</label>
 		<input type="text" name="email" class="form-control" value="@yield('studentEmail')" id="email">
 	</div>
 	<div class="form-group">
 		<label for="image">Image</label>
 		<input type="file" name="image" class="form-control" id="image">
 	</div>
 	<button type="submit" class="btn btn-success">Submit</button>
 </form>
</div>
</div>
@endsection