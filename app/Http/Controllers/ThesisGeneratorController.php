<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisGeneratorController extends Controller
{
    public function index()
    {
        return view("thesis.index");
    }
}
