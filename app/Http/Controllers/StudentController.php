<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student1;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student1::orderBy('id',"desc")->get();
        echo "<pre>";
       // print_r($students);
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->file("image"));die;
        $file=$request->file("image");

        if ($request->hasfile("image")) {  //hasfile method file check
            $file->move("upload/",$file->getClientOriginalName());//move method automaticaly create folder in public for image
        }
       // die;
        $data=validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|unique:student1s|email|max:255"
            ],[
                "name.required"=>"name is needed",
                "email.email"=>"email should we valid",
                "email.required"=>"email is needed"
                ])->validate();
        $obj=new Student1;
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->st_image=$file->getClientOriginalName();
        $obj->created_at=date("y-m-d h:i:s");
        $is_saved=$obj->save();
        if ($is_saved) {
             session()->flash("studentMessage","Student data has been inserted successfully");
             return redirect("student/create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $std=Student1::find($id);
        return view('student.layouts.edit',compact("std"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=validator::make($request->all(),[
            "name"=>"required",
            "email"=>"required|email|max:255"
            ],[
                "name.required"=>"name is needed",
                "email.email"=>"email should we valid",
                "email.required"=>"email is needed"
                ])->validate();/*auto redirect same page*/
        $obj= Student1::find($id);
        $obj->name=$request->name;
        $obj->email=$request->email;
        $obj->created_at=date("y-m-d h:i:s");
        $is_saved=$obj->save();
        if ($is_saved) {
             session()->flash("studentMessage","Student data has been update successfully");
             return redirect("student/");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student1::find($id);
        $is_deleted=$student->delete();
        if ($is_deleted) {
            session()->flash("studentMessage","Student data has been Deleted");
             return redirect("student/");
        }
    }
}
