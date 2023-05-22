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
        <div class="container">
            Hello Department
        </div>
    </div>
    </div>
</x-app-layout>