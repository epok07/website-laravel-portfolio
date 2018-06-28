<?php
namespace App\Classes\thesisGenerator;

class ThesisCollector
{
    public $countDocumentsWordAppearsIn = [];
    public $thesisTexts = [];
    public $allWords = [];
    public $sentenceRankings = [];

    public function __construct()
    {
    }

    public function addText($thesisText)
    {

        // add document to indexer
        array_push($this->thesisTexts, $thesisText);

        // add to all words array (unique)
        $this->allWords = array_unique(array_merge($this->allWords, $thesisText->tokenWords), SORT_REGULAR);

        // add to word count of array
        foreach (array_unique($thesisText->tokenWords) as $key => $word) {
            if (!isset($this->countDocumentsWordAppearsIn[$word])) {
                $this->countDocumentsWordAppearsIn[$word] = 1;
            } else {
                $this->countDocumentsWordAppearsIn[$word] += 1;
            }
        }
    }

    public function calculateTextRanks()
    {
        foreach ($this->thesisTexts as $key => $thesisText) {
            $thesisText->calculateSentenceRanks($this->countDocumentsWordAppearsIn, count($this->thesisTexts));
        }
    }

    public function sortTopSentences()
    {
        $allSentences = [];
        foreach ($this->thesisTexts as $key => $thesisText) {
            $allSentences = array_merge($allSentences, $thesisText->sentenceRanks);
        }
        arsort($allSentences);
        return $allSentences;
    }
}
