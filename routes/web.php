<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/allnotes', [NoteController::class, 'showAllNotes'])->name('allnotes');
Route::get('/', [NoteController::class, 'showAllNotes'])->name('allnotes');

Route::get('/addnote', [NoteController::class, 'add'])->name('insert.note');

Route::get('/showDoneNotes', [NoteController::class, 'showDoneNotes'])->name('showDoneNotes');

Route::post('/addnew.note', [NoteController::class, 'store'])->name('addnew.note');

Route::get('/updateNote/{id}', [NoteController::class, 'updateNote'])->name('update.note');

Route::get('/editNote/{id}', [NoteController::class, 'editNote'])->name('edit.note');
Route::get('/deleteNote/{id}/{view}', [NoteController::class, 'deleteNote'])->name('delete.note');
Route::get('/doneNote/{id}', [NoteController::class, 'doneNote'])->name('done.note');
