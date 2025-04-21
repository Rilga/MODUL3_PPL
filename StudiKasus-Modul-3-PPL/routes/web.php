<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/notes', function () {
    //     return view('Notes.index');
    // })->name('notes');

    Route::get('/notes', [NoteController::class, 'index'])->name('notes');
    Route::get('/create-note', [NoteController::class, 'create']);
    Route::post('/submit-note', [NoteController::class, 'store'])->name('note-submit');
    Route::get('/note/{id}', [NoteController::class, 'show'])->name('detail-note');
    Route::get('/edit-note-page/{id}', [NoteController::class, 'edit']);
    Route::put('/note-update/{id}', [NoteController::class, 'update'])->name('note-update');
    Route::delete('/delete-note/{id}', [NoteController::class, 'destroy']);
});

require __DIR__.'/auth.php';
