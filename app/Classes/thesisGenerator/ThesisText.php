<?php
namespace App\Classes\thesisGenerator;

use \File;

class ThesisText
{
    // Raw values
    public $name;
    public $content;

    // Delimiters
    public $uselessWords;
    public $wordDelimiters;
    public $sentenceDelimiters;

    // raw tokens
    public $tokenWords;
    public $tokenSentences;

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
        $this->uselessWords = ThesisText::getUselessWords();
        $this->wordDelimiters = ThesisText::getWordDelimiters();
        $this->sentenceDelimiters = ThesisText::getSentenceDelimiters();

        // Set variables
        $content = file_get_contents($_file->path());
        $name = $_file->getClientOriginalName();

        // Split words tokenizeWords
        $this->tokenWords = $this->tokenizeWords($content);
        $this->tokenSentences = $this->tokenizeSentences($content);

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
        foreach ($this->tokenSentences as $key => $sentence) {
            $rank = $this->calculateSentenceRank($countDocumentsWordAppearsIn, $totalDocuments, $sentence);
            $this->sentenceRanks[$sentence] = $rank;
        };
    }

    public function calculateSentenceRank($countDocumentsWordAppearsIn, $totalDocuments, $sentence)
    {
        $rank = 0;
        $allWords = $this->tokenizeWords($sentence);
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

        $file = fopen(app_path() . "/Classes/thesisGenerator/" . "IgnoreWords.txt", "r");

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

        $file = fopen(app_path() . "/Classes/thesisGenerator/" . "WordDelimiters.txt", "r");

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

        $file = fopen(app_path() . "/Classes/thesisGenerator/" . "SentenceDelimiters.txt", "r");

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
    public function tokenizeWords($content)
    {
        // Var declaration
        $words = [];
        $word = "";

        // By characters
        for ($i=0; $i < strlen($content) ; $i++) {

            // Delimiter found
            if (in_array($content[$i], $this->wordDelimiters)) {

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

    public function tokenizeSentences($content)
    {
        // Var declaration
        $sentences = [];
        $sentence = "";

        // By characters
        for ($i=0; $i < strlen($content) ; $i++) {

            // Delimiter found
            if (in_array($content[$i], $this->sentenceDelimiters)) {
                // Add delimiter to sentence
                if ($content[$i] != " " && $content[$i] != "	") {
                    $sentence .= $content[$i];
                }

                // Corner case for closing brackets
                if (isset($content[$i+1]) && $this->checkForClosingBracket($content[$i+1])) {
                    $i += 1;
                    $sentence .= $content[$i];
                }

                // Remove tabs & new lines
                $sentence = str_replace("\r", "", $sentence);
                $sentence = str_replace("\n", "", $sentence);

                // Add to array of words
                if ($sentence != "") {
                    // Strip first character if blank
                    if ($sentence[0] == " ") {
                        array_push($sentences, substr($sentence, 1));
                    } else {
                        array_push($sentences, $sentence);
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
    private function checkForClosingBracket($char)
    {
        $brackets = ["}","]",")"];
        return in_array($char, $brackets);
    }
}
