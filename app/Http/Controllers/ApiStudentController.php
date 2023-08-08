<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student= Student::all();
        return StudentResource::collection($student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student= Student::create($request->all());

        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student:: find($id);
        if($student){
            return new StudentResource($student);
        }else{
            return response()->json(['message'=>'Học sinh không tồn tại'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if ($student){
            $student -> update ($request->all());
        }else{
            return response()->json(['message'=>'Học sinh không tồn tại'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if ($student){
            $student->delete();
            return response()->json(['message'=>'Xóa thành công']);
        } else{
            return response()->json(['message'=>'Học sinh không tồn tại'],404);
        }
    }
}
