<?php
namespace App\Classes\Summarizer;

use \App\Classes\Summarizer\Sentence;
use \File;

class Document
{
    // Raw values
    public $id;
    public $name;
    public $content;

    // Delimiters
    public $uselessWords;
    public $wordDelimiters;
    public $sentenceDelimiters;

    // raw tokens
    public $tokenWords;
    public $sentences;

    // calculated tokens
    public $sentenceRanks;
    public $wordRanks;

    public function __construct($_file)
    {
        // Error Handle
        if ($_file->getMimeType() != "text/plain") {
            throw new \Exception("File type was not plain text!", 1);
        }

        // Init Delimiters
        $this->uselessWords = Document::getUselessWords();
        $this->wordDelimiters = Document::getWordDelimiters();
        $this->sentenceDelimiters = Document::getSentenceDelimiters();

        // Set variables
        $this->id = uniqid();
        $this->content = file_get_contents($_file->path());
        $this->name = $_file->getClientOriginalName();

        // Split words tokenizeWords
        $this->tokenWords = $this->tokenizeWords($this->content, $this->wordDelimiters);
        $this->sentences = $this->tokenizeSentences($this->content, $this->sentenceDelimiters);

        // Calculate Ranks
        $this->calculateWordRanks();
    }

    // ***************************************
    // 			Ranking Methods
    // ***************************************
    private function calculateWordRanks()
    {
        foreach ($this->tokenWords as $key => $word) {
            // Null case
            if ($this->wordRanks == null) {
                $this->wordRanks = [$word => 1];
            }

            // pre-exists
            elseif (!array_key_exists($word, $this->wordRanks)) {
                $this->wordRanks[$word] = 1;
            }

            // New word
            else {
                $this->wordRanks[$word] += 1;
            }
        }
    }
    public function calculateSentenceRanks($countDocumentsWordAppearsIn, $totalDocuments)
    {
        foreach ($this->sentences as $key => $sentence) {
            $rank = $this->calculateSentenceRank($countDocumentsWordAppearsIn, $totalDocuments, $sentence);
            $this->sentences[$sentence->id]->rank = $rank;
        };
    }

    public function calculateSentenceRank($countDocumentsWordAppearsIn, $totalDocuments, $sentence)
    {
        $rank = 0;
        // $allWords = $this->tokenizeWords($sentence);
        $allWords = $this->tokenizeWords($sentence->content, $this->wordDelimiters);
        $explodedWords = $this->filterUnwantedWords($allWords);

        foreach ($explodedWords as $key => $word) {
            if (isset($this->wordRanks[$word])) {
                $total = ($this->wordRanks[$word] * ($countDocumentsWordAppearsIn[$word] / $totalDocuments))/ count($allWords);
                $rank += $total;
            }
        }
        return $rank;
    }

    // ***************************************
    // 			Populate Methods
    // ***************************************
    public static function getUselessWords()
    {
        $ignoreWords = [];

        $file = fopen(app_path() . "/Classes/Summarizer/setup/" . "IgnoreWords.txt", "r");

        while (! feof($file)) {
            $word = str_replace(PHP_EOL, '', fgets($file));
            $word = str_replace("\r", '', $word);
            array_push($ignoreWords, $word);
        }
        return $ignoreWords;
    }

    public static function getWordDelimiters()
    {
        $ignoreWords = ["", " "];

        $file = fopen(app_path() . "/Classes/Summarizer/setup/" . "WordDelimiters.txt", "r");

        while (! feof($file)) {
            $word = str_replace(PHP_EOL, '', fgets($file));
            $word = str_replace("\r", '', $word);
            array_push($ignoreWords, $word);
        }
        return $ignoreWords;
    }

    public static function getSentenceDelimiters()
    {
        $ignoreWords = [];

        $file = fopen(app_path() . "/Classes/Summarizer/setup/" . "SentenceDelimiters.txt", "r");

        while (! feof($file)) {
            $word = str_replace(PHP_EOL, '', fgets($file));
            $word = str_replace("\r", '', $word);
            array_push($ignoreWords, $word);
        }
        return $ignoreWords;
    }

    // ***************************************
    // 				Tokenizers
    // ***************************************
    public static function tokenizeWords($content,$wordDelimiters)
    {
        // Var declaration
        $words = [];
        $word = "";

        // By characters
        for ($i=0; $i < strlen($content) ; $i++) {

            // Delimiter found
            if (in_array($content[$i], $wordDelimiters)) {

                // Remove tabs & new lines
                $word = str_replace("\r", "", $word);
                $word = str_replace("\n", "", $word);

                // Add to array of words
                if ($word != "") {
                    array_push($words, $word);
                    $word = "";
                }
            }
            // Normal character, append it
            else {
                $word .= $content[$i];
            }
        }
        return $words;
    }

    public function tokenizeSentences($content, $sentenceDelimiters)
    {
        // Var declaration
        $sentences = [];
        $sentence = "";

        // By characters
        for ($i=0; $i < strlen($content) ; $i++) {

            // Delimiter found
            if (in_array($content[$i], $sentenceDelimiters)) {
                // Add delimiter to sentence
                if ($content[$i] != " " && $content[$i] != "	") {
                    $sentence .= $content[$i];
                }

                // Corner case for closing brackets
                if (isset($content[$i+1]) && Document::checkForClosingBracket($content[$i+1])) {
                    $i += 1;
                    $sentence .= $content[$i];
                }

                // Remove tabs & new lines
                $sentence = str_replace("\r", "", $sentence);
                $sentence = str_replace("\n", "", $sentence);

                // Add to array of words
                if ($sentence != "") {
                    $uniqueId = uniqid();
                    // Strip first character if blank
                    if ($sentence[0] == " ") {
                        // array_push( $uniqueId, new Sentence($uniqueId,$this->id,substr($sentence, 1), count($sentences) ) );
                        $sentences[$uniqueId] = new Sentence($uniqueId,$this->id, substr($sentence, 1), count($sentences) );
                    } else {
                        $sentences[$uniqueId] = new Sentence($uniqueId,$this->id, $sentence, count($sentences) );
                    }
                    $sentence = "";
                }
            }
            // Normal character, append it
            else {
                $sentence .= $content[$i];
            }
        }
        return $sentences;
    }

    // ***************************************
    // 				Filters
    // ***************************************
    public function filterUnwantedWords($words)
    {
        $filteredWords = [];
        foreach ($words as $key => $word) {
            if (!in_array($word, $this->uselessWords)) {
                array_push($filteredWords, $word);
            }
        }
        return $filteredWords;
    }

    // ***************************************
    // 				Outlier Case Checks
    // ***************************************
    private static function checkForClosingBracket($char)
    {
        $brackets = ["}","]",")","\"","\”"];
        return in_array($char, $brackets);
    }
}
