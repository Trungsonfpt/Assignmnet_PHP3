<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function list(Request $request)
    {
        //dd($request);
        $title = "Danh sách sinh viên";
        $student = new Student();
        $ListStudent = $student::all();
        if ($request->post() && $request->searchStudent) {
            $ListStudent = $student::where('name', 'like', '%' . $request->searchStudent.'%')
                ->get();

        }
        return view('student.list', compact('title', 'ListStudent'));

    }

    public function add(StudentRequest $request)
    {

        if ($request->ismethod('POST')) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('ImageStudent', $request->file('image'));
                $params = $request->except('_token');
                $params['image'] = $request->image;
                $student = Student::create($params);

                if ($student) {
                    Session::flash('success', 'Thêm sinh viên thành công');
                }
            }
        }

        return view('student.add');
    }
    public function edit(StudentRequest $request,$id)
    {
        $student_edit= DB::table('student')
            ->where('id',$id)->first();

        // Code update

        if ($request->isMethod('POST')){
            $params= $request->except('_token','image','sua');
            if ($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDL = Storage::delete('/public/'.$student_edit->image);
                if ($resultDL){
                    $request->image = uploadFile('ImageStudent', $request->file('image'));
                    $params['image'] = $request->image;
                }
            }else{
                // Nếu không thay hình sẽ giữ nguyên ảnh cũ
                $params['image']= $student_edit->image;
            }
            $result = Student::where('id', $id)->update($params);
            if($result){
                Session::flash('success', 'Sửa sinh viên thành công');
//                chuyển trang sau khi thành công
                return redirect()->route('edit-StudentRequest', ['id'=>$id]);
            }


        }
        return view('student.update', compact('student_edit'));
    }

    public function delete_stu(Request $request,$id){
        $student_delete = Student::where('id',$id)->delete();
        if ($student_delete){
            Session::flash('success','Xóa thành công');
            // Chuyển sang trang List
            return redirect()->route('homepage');
        }
    }
}
