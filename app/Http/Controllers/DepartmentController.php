<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        return view('admin.department.index');
    }

    public function store(Request $request) {
        $request->validate([
            'department_name'=>'required|unique:departments|max:10'
        ],
        ['department_name.required'=>"กรุณาป้อนชื่อแผนกด้วยค่ะ",
        'department_name.max'=>"ห้ามป้อนเกิน 10 ตัวอักษร",
    ]);
    }

}