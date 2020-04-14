<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::resource("/tasks", "TasksController");
