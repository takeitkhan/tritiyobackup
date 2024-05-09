<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Requisition\EmployeeRequisitionExport;
use App\Exports\ProjectReport;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::any('/', function () {
    return redirect(route('login'));
});

Route::get('dashboard', function () {
    if (auth()->check()) {
        if (auth()->user()->employee_status == 'Terminated') {
            Auth::logout();
            setcookie('loggedIn', false, -1, '/');
            setcookie('user', null, -1, '/');
            return redirect('/login')->with('message', 'You are terminated');
        }
        return view('dashboard');
    } else {
        return redirect('/login');
    }

})->name('dashboard');

Route::get('oops', function () {
    return view('oops');
});

Route::group(['middleware' => 'auth'], function () {
    require('modules/users.php');
    require('modules/routelists.php');
    require('modules/designations.php');
    require('modules/settings.php');
});


//Artisan
Route::get('/clearallcache', function () {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    return 'Configuration cache cleared! <br/>
            Configuration cached successfully! <br/>
            Route cache cleared! <br/>
            Routes cached successfully! <br/>
            Files cached successfully! <br/>
            Configuration cache cleared! <br/>
            Configuration cached successfully! <br/>
            <a href="' . url('/dashboard') . '">Go Back</a>';
});


Route::get('/mailtest', function () {
    $data = ['message' => 'Mobile Tele Solutions'];

    Mail::to('info@tritiyo.com')->send(new SendMail($data));

    return 'ok';
});

//Excel




// Reports
Route::post('download/excel/requisition-accountant', function (Request $request) {

    $date = $request->daterange;

    return Excel::download(new EmployeeRequisitionExport($date), $date.'requisition_for_accountant.xlsx');
    //return redirect()->back()->with('data', 'date');

//    return Excel::download(new BladeExport($data), 'export.xlsx');


})->name('download_excel_requisition_accountant');

/**
 * Exel Route
 */


Route::get('/download/excel/project', function () {
    $id = request()->get('id');
    $date = request()->get('daterange');
    return Excel::download(new ProjectReport($id, $date), 'Project Report Export'.$date.'.xlsx');

})->name('download_excel_project');


Route::get('/download/excel/site', function () {
    $id = request()->get('id');
    $date = request()->get('daterange');
    //dd($date);

    return Excel::download(new App\Exports\SiteReport($id, $date), 'Site Report Export'.$date.'.xlsx');

})->name('download_excel_site');


Route::get('/download/excel/vehicle', function () {
    $id = request()->get('id');
    $date = request()->get('daterange');
    //dd($date);

    return Excel::download(new App\Exports\VehicleReport($id, $date), 'Vehicle Report Export'.$date.'.xlsx');

})->name('download_excel_vehicle');



Route::get('/download/excel/material', function () {
    $id = request()->get('id');
    $date = request()->get('daterange');
    //dd($date);

    return Excel::download(new App\Exports\MaterialReport($id, $date), 'Material Report Export'.$date.'.xlsx');

})->name('download_excel_material');



Route::get('/download/excel/user', function () {
    $id = request()->get('id');
    $date = request()->get('daterange');
    //dd($date);
    $userName = \App\Models\User::where('id', $id)->first()->name;
    return Excel::download(new App\Exports\UserReport($id, $date), $userName.' Report Export'.$date.'.xlsx');

})->name('download_excel_user');
