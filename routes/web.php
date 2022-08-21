<?php

use App\Http\Controllers\DepotController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\DistributerController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FiducialController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RepotController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Models\depot\Depot;
use App\Models\distributer;
use App\Models\Employe\employe;
use FontLib\Table\Type\name;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(InventoryController::class)->group(function(){
    Route::get("/","index");
    Route::post("Save_Data","store");
    Route::post("search","search");
    Route::get("search/{id}","find");

});
Route::controller(DispatchController::class)->group(function(){
    Route::get("/dispatch","index");
    Route::post("/dispatch","store");
    Route::post("/Save_dispatch","store");
    Route::get("/selected/{id}","select");
    
   

});
Route::controller(DistributerController::class)->group(function(){
    Route::get("/fiducial","index");
    Route::post("search_fiducial","search");
    Route::post("fiducial_search","search2");

     Route::get("/info/{id}","info");

});

Route::controller(DepotController::class)->group(function(){
    Route::get("/depot","index");
    Route::get("depot_info/{id}" ,"info"); 

});





// Route::controller(InventoryController::class)->group(function(){
//     Route::get("/","index");
// });
//DEPOT ROUT LARAVEL 9
