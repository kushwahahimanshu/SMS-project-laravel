@extends("student.layouts.create")

@section("studentId",$std->id)

@section("studentName",$std->name)

@section("studentEmail",$std->email)

@section("editMethod")

{{method_field('PUT')}}

@endsection
