<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('course') && $request->course !== 'all') {
            $query->where('course', $request->course);
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $students = $query->orderBy('last_name')->paginate(20);

        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function stats()
    {
        return response()->json([
            'total' => Student::count(),
            'active' => Student::where('status', 'Active')->count(),
            'inactive' => Student::where('status', 'Inactive')->count(),
            'graduated' => Student::where('status', 'Graduated')->count(),
            'dropped' => Student::where('status', 'Dropped')->count(),
            'male' => Student::where('gender', 'Male')->count(),
            'female' => Student::where('gender', 'Female')->count(),
        ]);
    }
}