<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index() {
        $departments=Department::paginate(3);
        $trashDepartments = Department::onlyTrashed()->paginate(3);
        return view('admin.department.index',compact('departments','trashDepartments'));
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


    public function edit($id){
       $department =  Department::find($id);
       return view('admin.department.edit',compact('department'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'department_name'=>'required|unique:departments|max:20'
        ],
        ['department_name.required'=>"กรุณาป้อนชื่อแผนกด้วยค่ะ",
        'department_name.max'=>"ห้ามป้อนเกิน 20 ตัวอักษร",
        'department_name.unique'=>"มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว"
    ]);

    Department::find($id)->update([
        'department_name' => $request->department_name,
        'user_id'=>Auth::user()->id
    ]);

    return redirect()->route('department')->with('success', "อัพเดตข้อมูลเรียบร้อย");
    }

    public function softdelete($id) {
           $delete =  Department::find($id)->delete();
           return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
        }



        public function restore($id) {
            $restore = Department::withTrashed()->find($id)->restore();
            return redirect()->back()->with('success', "กู้คืนข้อมูลเรียบร้อย");

        }
}