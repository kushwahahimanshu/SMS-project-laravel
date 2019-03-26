@extends("student.layouts.master")

@section("title","Student Application | Listing")

@section("body")
 <div class="panel panel-default">
 	<div class="panel-heading">Student List
 		<a href="{{ url('student/create')}}" class="btn btn-success pull-right">+Add Student</a>
 	</div>
 	<div class="panel-body">
 		<table class="table">
 			<thead>
 				<tr>
 					<th>Sr No</th>
 					<th>Name</th>
 					<th>Email</th>
 					<th>Image</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php $i=1; ?><!-- autoincrement -->
 				@foreach($students as $student)
 				<tr>
 					<td>{{$i++}}</td>
 					<td>{{$student->name}}</td>
 					<td>{{$student->email}}</td>
 					<!-- <td>{{url('upload/'.$student->st_image)}}</td> -->
 					<!-- <td><img src="{{url('upload/'.$student->st_image)}}" width="50" height="50"></td> -->
 					<td>
 						@php
 						if(!empty($student->st_image)){@endphp
 						<img src="{{url('upload/'.$student->st_image)}}" width="50" height="50">
 						@php } else { @endphp

 						<h3>No Image Found</h3>
 						@php }@endphp
 					</td>
 					<td><a href="{{url('student/'.$student->id.'/edit')}}" class="btn btn-info">Edit</a>
 						<form action="/student/{{$student->id}}" method="post" class="pull-right">
 							{{csrf_field()}}
 							{{method_field("DELETE")}} <!-- pre define method for delete -->
 							<button class="btn btn-danger" type="submit">Delete</button>
 						</form></td>
 						<!-- <a href="{{url('student/'.$student->id)}}" class="btn btn-danger">Delete</a></td> -->
 				</tr>
 				@endforeach
 			</tbody>
 		</table>
 	</div>
 </div>
 @endsection