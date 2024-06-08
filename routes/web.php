<?php

use App\Http\Controllers\PuntosGpsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.index');




Route::controller(PuntosGpsController::class)->group(function () {
    
    Route::get('puntosgps', 'index')->name('puntosgps.index');
    Route::get('puntosgps/create', 'create')->name('puntosgps.create');   
    Route::post('puntosgps/store', 'store')->name('puntosgps.store');
    Route::get('puntosgps/show', 'show' )->name('puntosgps.show');
    Route::post('puntosgps',  'buscarMarcadores')->name('puntosgps.buscarMarcadores');;
});


/*Route::get('cursos/{curso}', 'show')->name('cursos.show');
Route::get('cursos/{id}/edit', 'edit')->name('cursos.edit');
Route::put('cursos/{id}', 'update')->name('cursos.update');
Route::delete('cursos/{id}', 'destroy')->name('cursos.destroy');*/

