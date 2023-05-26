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

            <form action="{{url('service/update/'.$service->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="service_name" class="">ชื่อบริการ</label>
                </div>
                <div>
                    <input type="text" class="form-control" name="service_name" value="{{$service->service_name}}">
                </div>
                @error('service_name')
                <div class="py-2">
                    <span class="text-red-800 ">{{$message}}</span>
                </div>
                @enderror



                <div>
                    <label for="service_image" class="">ภาพประกอบ</label>
                </div>
                <div>
                    <input type="file" class="form-control" name="service_image" value="{{$service->service_image}}">
                </div>
                @error('service_image')
                <div class="py-2">
                    <span class="text-red-800 ">{{$message}}</span>
                </div>
                @enderror

                <input type="hidden" name="old_image" value="{{$service->service_image}}">



                <div class="form-group">
                    <img src="{{asset($service->service_image)}}" alt="" class="w-40 h-40">
                </div>


                <div>
                    <input type="submit" value="บันทึก" class="mt-5 p-3 w-48 bg-blue-800 text-white rounded-md">
                </div>
            </form>
        </div>


</x-app-layout>