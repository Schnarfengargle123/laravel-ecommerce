<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get("/", function () {
    return "Welcome to Fragrance Kabal";
});

Route::get("/users", function (Request $request) {
    return User::all();
});

Route::get("/users/{id}", function (string $id) {
    return User::find($id);
});
