<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Laravel 8') }} -->
            <div class="flex justify-between">
                <p> สวัสดี , {{Auth::user()->name}}</p>
                <p> จำนวนผู้ใช้ระบบ {{count($users)}} คน</p>
            </div>
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="container">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ลำดับ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ชื่อ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                อีเมล
                            </th>
                            <th scope="col" class="px-6 py-3">
                                เริ่มสมัครใช้งานระบบ
                            </th>
                        </tr>
                    </thead>


                    <tbody>
                        @php($i=1)
                        @foreach($users as $row)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$i++}}
                            </th>
                            <td class="px-6 py-4">
                                {{$row->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$row->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>