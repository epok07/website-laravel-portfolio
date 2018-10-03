<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index(Request $request)
    {
        return view("cv.master");
    }

    public function downloadCv(Request $request){
        return response()->download(public_path('media/Erik_Smith_CV.pdf'));
    }
}
