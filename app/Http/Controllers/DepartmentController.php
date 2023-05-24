<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index() {
        $departments=Department::all();
        return view('admin.department.index',compact('departments'));
    }
    //ตรวจสอบข้อมูล

    public function store(Request $request) {
        $request->validate([
            'department_name'=>'required|unique:departments|max:20'
        ],
        ['department_name.required'=>"กรุณาป้อนชื่อแผนกด้วยค่ะ",
        'department_name.max'=>"ห้ามป้อนเกิน 20 ตัวอักษร",
        'department_name.unique'=>"มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว"
    ]);

        //  บันทึกข้อมูล 
        $data = array();
        $data["department_name"] = $request->department_name;
        $data["user_id"] = Auth::user()->id;

        //query builder
        DB::table('departments')->insert($data);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");


    }

}