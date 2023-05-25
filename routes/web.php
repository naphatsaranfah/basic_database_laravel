<?php

use Illuminate\Support\Facades\Route;
// use \App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //มาจาก Models User (Eloq)
        // $users=User::all();

        $users=DB::table('users')->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){

      //Department
    Route::get('/department/all',[DepartmentController::class,'index'])->name('department');
    Route::post('/department/add',[DepartmentController::class,'store'])->name('addDepartment');
    Route::get('department/edit/{id}',[DepartmentController::class,'edit']);
    Route::post('department/update/{id}',[DepartmentController::class,'update']);

  //SoftDelete
    Route::get('department/softdelete/{id}',[DepartmentController::class,'softdelete']);
    Route::get('department/restore/{id}',[DepartmentController::class,'restore']);
    Route::get('department/delete/{id}',[DepartmentController::class,'delete']);

    // Service
    Route::get('/service/all',[ServiceController::class,'index'])->name('services');



    Route::post('service/add',[ServiceController::class,'store'])->name('addServices');

});