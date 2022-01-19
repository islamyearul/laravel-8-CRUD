<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


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

Route::get('/', [CrudController::class, 'showdata']);
Route::get('/add-data', [CrudController::class, 'adddata']);
Route::post('/store-data', [CrudController::class, 'storedata']);
Route::get('/edit-data/{id}', [CrudController::class, 'editdata']);
Route::post('/update-data/{id}', [CrudController::class, 'updatedata']);
Route::get('/delete-data/{id}', [CrudController::class, 'deletedata']);
