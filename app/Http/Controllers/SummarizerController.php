<?php

namespace App\Http\Controllers;

use \App\Classes\Summarizer\Document;
use \App\Classes\Summarizer\Summarizer;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Redirect;

class SummarizerController extends Controller
{
    public function index()
    {
        return view("summarizer.index");
    }

    public function submit(Request $request)
    {
        // Variable Declarations
        $summarizer = new Summarizer();

        // Get file from request
        $files = $request["files"];

        foreach ($files as $key => $file) {
            $summarizer->addText(new Document($file));
        }

        return Redirect::route('summarizer.index')->with('summary', $summarizer->generate($request["wordCount"]) );
    }
}
