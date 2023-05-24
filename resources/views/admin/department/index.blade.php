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

            <div class="mb-5 font-bold">
                @if(session("success"))
                <p>{{session('success')}}</pk>
                    @endif

                <p>ตารางข้อมูลแผนก</p>



                <div class="container mt-5">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ลำดับ
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        ชื่อแผนก
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        UserID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created_At
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i=1)

                                @foreach($departments as $row)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$i++}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$row->department_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$row->user_id}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($row->created_at == NULL)
                                        ไม่ถูกนิยาม
                                        @else
                                        {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
            <div class="">
                <p class="mb-5 font-bold">แบบฟอร์ม</p>

                <form action="{{route('addDepartment')}}" method="post">
                    @csrf
                    <div>
                        <label for="department_name" class="">ชื่อแผนก</label>
                    </div>
                    <div>
                        <input type="text" class="form-control mt-5" name="department_name">
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
        </div>
    </div>
</x-app-layout>