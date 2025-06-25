<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return inertia('Students/Index');
    }

    public function create()
    {
        return inertia('Students/Create');
    }
}
