<?php

namespace App\Http\Controllers\Manage;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecture\Lectures;
use App\Models\Doctor\Doctors;
use App\Http\Controllers\defaultController;
use App\Models\Manage\Manages;
use App\Models\Student\Students;
use App\Models\Student\Imports;
use App\Models\Subjects\Subjects;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\MockObject\Builder\Stub;

class manageController extends Controller
{
    use defaultController;

    public function __construct()
    {

        auth()->shouldUse('manage');
    }

    public function DefaultAdding($request,$model,$defaultData){

        if ($request->has('name') && $request->has('email')) {

            $this->status = true;

            if ($request->has('name') && $request->has('email')) {

                $check = $model->where('email', $request->input('email'))->count();

                if ($check > 0) {

                    $this->message = 'Account Already Found';

                    $this->status = false;

                } else {

                    $this->data = $defaultData;

                    $this->message = 'success add';

                    $model->create($this->data);
                }

                return $this->sendResult();
            }
        }
    }


    //// doctors

    public function addDoctor(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subtitle' => $request->input('subtitle'),
            'department' => $request->input('department')
        ];

        $doctor = new Doctors();

        return $this->DefaultAdding($request,$doctor,$data);
    }

    public function getDoctor($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Doctors::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateDoctor(Request $request,$id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subtitle' => $request->input('subtitle'),
            'department' => $request->input('department')
        ];

        $student = Doctors::where('id',$id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteDoctor($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Doctors::find($id);

        $student->delete();

        $this->data = [];

        return $this->sendResult();
    }

    /// Instructor

    public function addInstructor(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subtitle' => $request->input('subtitle'),
            'department' => $request->input('department')
        ];

        $lecture = new Lectures();

        return $this->DefaultAdding($request, $lecture, $data);
    }

    public function getInstructor($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Lectures::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateInstructor(Request $request, $id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'subtitle' => $request->input('subtitle'),
            'department' => $request->input('department')
        ];

        $student = Lectures::where('id', $id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteInstructor($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Lectures::find($id);

        $student->delete();

        $this->data = [];

        return $this->sendResult();
    }


    //// Affairs

    public function addAffair(Request $request){

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];

        $affairs = new Manages();

        return $this->DefaultAdding($request, $affairs, $data);
    }


    public function getAffair($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Manages::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateAffairs(Request $request, $id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ];

        $student = Manages::where('id', $id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteAffairs($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Manages::find($id);

        $student->delete();

        $this->data = [];

        return $this->sendResult();
    }

    //// Students

    public function AddStudent(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'year' => $request->input('year'),
            'department' => $request->input('department'),
            'section' => $request->input('section')
        ];

        $student = new Students();

        return $this->DefaultAdding($request, $student, $data);
    }

    public function getAllStudents($id){

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Students::where('year',$id)->get();

        $this->data = $student;

        return $this->sendResult();
    }
    public function getStudents($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Students::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateStudents(Request $request, $id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'department' => $request->input('department'),
            'section' => $request->input('section')
        ];

        $student = Students::where('id', $id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteStudents($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Students::find($id);

        $student->delete();

        $this->data = [];

        return $this->sendResult();
    }

    public function importStudents(Request $request){

        if($request->file('students')){

            Excel::import(new Imports, 'students.xlsx');

            $students = Students::all();

            $this->message = 'import Success';

            $this->data = $students;
        }
    }

    /// Subjects

    public function AddSubjects(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'desc' => $request->input('desc'),
            'doctor' => $request->input('doctor'),
            'another' => $request->input('another'),
        ];

        $student = new Subjects();

        return $this->DefaultAdding($request, $student, $data);
    }

    public function getSubjects($id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $student = Students::find($id);

        $this->data = $student;

        return $this->sendResult();
    }

    public function updateSubjects(Request $request, $id)
    {

        $this->message = 'retrieve Success';

        $this->status = true;

        $data = [
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'desc' => $request->input('desc'),
            'doctor' => $request->input('doctor'),
            'another' => $request->input('another'),
        ];

        $student = Subjects::where('id', $id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }

    public function deleteSubjects($id)
    {

        $this->message = 'Delete Success';

        $this->status = true;

        $student = Subjects::find($id);

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

        $student = Manages::where('id', $student->id)->update($data);

        $this->data = $data;

        return $this->sendResult();
    }
}
