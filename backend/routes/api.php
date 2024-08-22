<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Models\UsertableModal;

use App\Http\Controllers\UserController3;


Route::get('/UsertableModel', [UserController3::class, 'index']);





