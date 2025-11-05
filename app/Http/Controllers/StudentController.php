<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequestPost;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {

        $students =  Student::all();
        if ($students->isEmpty()) {
            $data = [
                'message' => 'No students found',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($students, 200);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($student, 200);
    }

    public function store(StudentRequestPost $request)
    {
        $student = Student::create($request->all());
        if (!$student) {
            $data = [
                'message' => 'Student could not be created',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
                'message' => 'Student created successfully',
                'status' => 201
            ];
        return response()->json($data, 201);
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $student->update($request->all());
        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            $data = [
                'message' => 'Student not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $student->delete();
        $data = [
            'message' => 'Student deleted successfully',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
