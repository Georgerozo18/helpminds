<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function students(){
      $students = Student::paginate(10);

      return view('students.index',[
        'students' => $students,
      ]);
    }

    public function show(Student $student){

      return view('students.show',[
        'student' => $student,
      ]);
    }

}
