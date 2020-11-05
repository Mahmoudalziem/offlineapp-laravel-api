<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use App\Http\Controllers\defaultController;
use App\Models\Lecture\Lectures;
use App\Models\Marks\Marks;
use App\Models\Sections\Sections;
use App\Models\Student\Students;
use App\Models\Subjects\Subjects;
use Illuminate\Http\Request;
use Auth;

class lectureController extends Controller
{
    use defaultController;

    public function __construct(){

        auth()->shouldUse('lecture');
    }

    public function addMarks(Request $request)
    {

        $year = $request->input('year');

        $student = $request->input('student');

        $doctor = Sections::where('instructor',Auth::user()->id)->where('year',$year)->get()[0]->doctor;

        $subject = Subjects::where('year',$year)->where('doctor',$doctor)->get()[0]->name;

        $data = [
            'student' => $request->input('student'),
            'year' => $request->input('year'),
            'subject' => $subject,
            'midterm' => $request->input('midterm'),
            'oral' => $request->input('oral'),
            'practical' => $request->input('practical'),
            'semester' => $request->input('semester')
        ];

        $student = Marks::where('student',$student)->exists();

        return $student;

        if($student > 0){

            Marks::where('student', $student)->update($data);

        }else{

            Marks::create($this->data);

        }

        $this->message = 'success add';

        $this->data = $data;

        return $this->sendResult();
    }

    public function getMarks($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Marks::where('student',$id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function getStudents($id){

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Students::where('section',$id)->get();

        $this->data = $student;

        return $this->sendResult();
    }
    /// Update Settings

    public function updateSettings(Request $request)
    {

        $student = Auth::user();

        $this->message = 'password Success';

        $this->status = true;

        $data = [
            'password' => bcrypt($request->input('password')),
        ];

        $student = Lectures::where('id', $student->id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }
}
