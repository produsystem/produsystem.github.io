<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::view('/', 'welcome')->name('welcome');

// Route::get('/chirps/{chirp?}', function ($chirp=null) {
    
//     if($chirp=='2'){
//         // DIRECCIONA A LA RUTA 
//         // return redirect('chirps');
//         // //DIRECCIONA AL NOMBRE DE RUTA
//         // return redirect()->route('chirps.index');
        
//         // DIRECCIONA AL NOMBRE DE RUTA(METODO CORTO)
//         return to_route('chirps.index');
//     }
    
//     return 'hola mundo'.$chirp;



// });





Route::middleware('auth')->group(function () {

Route::view('/dashboard','dashboard' )->name('dashboard');

Route::get('/chirps', function () {
    return view('chirps.index');
})->name('chirps.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
