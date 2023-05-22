<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Laravel 8') }} -->
            <div class="flex justify-between">
                <p> สวัสดี , {{Auth::user()->name}}</p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-5 font-bold"">ตารางข้อมูลแผนก</div>
            <div class="">
                <p class="mb-5 font-bold">แบบฟอร์ม</p>

                <form action="" method="post">
                    <div>
                        <label for="department_name" class="">ชื่อตำแหน่งงาน</label>
                    </div>
                    <div>
                        <input type="text" class="form-control mt-5" name="department_name">
                    </div>
                    <div>
                        <input type="submit" value="บันทึก" class="mt-5 p-3 w-48 bg-blue-800 text-white rounded-md">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>