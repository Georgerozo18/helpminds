<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Student;

class PagesController extends Controller
{
    public function inicio(){
      $messages = Message::latest()->paginate(10);
      return view('welcome',
        ['messages' => $messages,]);
    }

    public function ayuda(){
      return view('help');
    }

    // public function upnUsers(){
    //   $students = Student::all();
    //   return view('students',[
    //     'students' => $students,
    //   ]);
    // }
}
