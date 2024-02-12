<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
        public function index()
    {

        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

}
