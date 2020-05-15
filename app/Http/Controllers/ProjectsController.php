<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        return view('layouts.app', ['content' => 'test']);
    }

    public function open($id) {
        return view('layouts.app', ['content' => 'test']);
    }
}
