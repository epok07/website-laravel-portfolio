<?php

namespace App\Http\Controllers;

use \App\Classes\thesisGenerator\ThesisText;
use \App\Classes\thesisGenerator\ThesisCollector;
use Illuminate\Http\Request;
use File;

class ThesisGeneratorController extends Controller
{
    public function index()
    {
        return view("thesis.index");
    }

    public function submit(Request $request)
    {
        // dd(ThesisText::getUselessWords());
        // Variable Declarations
        $thesisCollector = new ThesisCollector();
        // Get file from request
        $files = $request["files"];

        foreach ($files as $key => $file) {
            $thesisCollector->addText(new ThesisText($file));
        }

        $thesisCollector->calculateTextRanks();

        dd($thesisCollector->sortTopSentences());
    }
}
