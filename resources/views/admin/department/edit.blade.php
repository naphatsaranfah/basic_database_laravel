<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Laravel 8') }} -->
            <div class="flex justify-between">
                <p> สวัสดี , {{Auth::user()->name}}</p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12 px-40 w-full">
        <div class="">
            <p class="mb-5 font-bold">แบบฟอร์มแก้ไข</p>

            <form action="{{url('department/update/'.$department->id)}}" method="post">
                @csrf
                <div>
                    <label for="department_name" class="">ชื่อแผนก</label>
                </div>
                <div>
                    <input type="text" class="form-control" name="department_name"
                        value="{{$department->department_name}}">
                </div>
                @error('department_name')
                <div class="py-2">
                    <span class="text-red-800 ">{{$message}}</span>
                </div>
                @enderror
                <div>
                    <input type="submit" value="บันทึก" class="mt-5 p-3 w-48 bg-blue-800 text-white rounded-md">
                </div>
            </form>
        </div>


</x-app-layout>