<?php

namespace App\Http\Controllers;

use \App\Classes\thesisGenerator\ThesisFile;
use Illuminate\Http\Request;
use File;
class ThesisGeneratorController extends Controller
{
    public function index()
    {
        return view("thesis.index");
    }

    public function submit(Request $request){
        // Variable Declarations
        $allFiles = [];

        // Get file from request
        $files = $request["files"];

        foreach ($files as $key => $file) {
          $thesisFile = new ThesisFile($file);
          array_push($allFiles, $thesisFile);
          echo 1;
        }

        dd($allFiles[0]->tokenSentence);
    }
}
