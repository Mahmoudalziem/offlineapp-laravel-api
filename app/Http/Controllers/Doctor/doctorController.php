<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Controllers\defaultController;
use App\Models\Courses\Courses;
use App\Models\Doctor\Doctors;
use App\Models\Sections\Sections;
use Illuminate\Http\Request;
use Auth;

class doctorController extends Controller
{
    use defaultController;

    public function __construct()
    {
        auth()->shouldUse('doctor');
    }


    //// doctors

    public function addCourse(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'subtitle' => $request->input('subtitle'),
            'year' => $request->input('year'),
            'department' => $request->input('department'),
            'description' => $request->input('description'),
            'pre' => $request->input('pre'),
            'path' => $request->input('path'),
            'image' => $request->input('image'),
        ];

        $this->data = $data;

        $this->message = 'success add';

        Courses::create($this->data);

        return $this->sendResult();
    }

    public function getCourse($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Courses::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateCourse(Request $request,$id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'subtitle' => $request->input('subtitle'),
            'year' => bcrypt($request->input('year')),
            'department' => $request->input('department'),
            'description' => $request->input('description'),
            'pre' => $request->input('department'),
            'path' => $request->input('path'),
            'image' => $request->input('image'),
        ];

        $student = Courses::where('id',$id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteCourse($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Courses::find($id);

        $student->delete();

        $this->data = [];

        return $this->sendResult();
    }


    //// Sections

    public function addSection(Request $request)
    {
        $data = [
            'doctor' => $request->input('doctor'),
            'instructor' => $request->input('instructor'),
            'year' => $request->input('year'),
            'section' => $request->input('section'),
        ];

        $this->data = $data;

        $this->message = 'success add';

        Sections::create($this->data);

        return $this->sendResult();
    }

    public function getSection($year, $instr)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Sections::where('year',$year)->where('instructor',$instr)->get();

        $this->data = $student;

        return $this->sendResult();
    }

    public function deleteSection($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Sections::where('section',$id);

        $student->delete();

        $this->data = [];

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

        $student = Doctors::where('id', $student->id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }
}
