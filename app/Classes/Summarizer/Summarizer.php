<?php
namespace App\Classes\Summarizer;
class Summarizer
{
    public $countDocumentsWordAppearsIn = [];
    public $documents = [];
    public $allWords = [];

    public function __construct()
    {
    }

    public function addText($document)
    {

        // add document to indexer
        array_push($this->documents, $document);

        // add to all words array (unique)
        $this->allWords = array_unique(array_merge($this->allWords, $document->tokenWords), SORT_REGULAR);

        // add to word count of array
        foreach (array_unique($document->tokenWords) as $key => $word) {
            if (!isset($this->countDocumentsWordAppearsIn[$word])) {
                $this->countDocumentsWordAppearsIn[$word] = 1;
            } else {
                $this->countDocumentsWordAppearsIn[$word] += 1;
            }
        }
    }

    public function calculateTextRanks()
    {
        foreach ($this->documents as $key => $document) {
            $document->calculateSentenceRanks($this->countDocumentsWordAppearsIn, count($this->documents));
        }
    }

    public function sortTopSentences()
    {
        $allSentences = [];
        foreach ($this->documents as $key => $document) {
            $allSentences = array_merge($allSentences, $document->sentences);
        }
        usort($allSentences,array($this, "cmpRank"));
        return $allSentences;
    }


    public function getSentencesByWordCount($rankedSentences, $maxCount){
      $count = 0;
      $position = 0;
      $sentences = [];
      $wordDelimiters = Document::getWordDelimiters();
      while($count < $maxCount && $position < count($rankedSentences)){
        array_push($sentences,$rankedSentences[$position]);
        // $count += strlen($rankedSentences[$position]->content);
        $count += count(Document::tokenizeWords($rankedSentences[$position]->content,$wordDelimiters));
        $position += 1;
      }

      return $sentences;
    }

    public function groupSentencesByDocument($sentences){
      $groups = [];

      foreach ($sentences as $key => $sentence) {
        if (!isset($groups[$sentence->parentId])) {
          $groups[$sentence->parentId] = [$sentence];
        } else{
          array_push($groups[$sentence->parentId],$sentence);
        }
      }

      return $groups;
    }

    public function sortGroupByOrder($group){
      usort($group,array($this, "cmpOrder"));
      return $group;
    }

    public function generate($wordCount){

      $finalSummary = "";
      $this->calculateTextRanks();
      $topSentences = $this->sortTopSentences();
      $summarizerSentences = $this->getSentencesByWordCount($topSentences, $wordCount);
      $summarizerGroups = $this->groupSentencesByDocument($summarizerSentences);

      // Sort the groups by sentence orders
      $sortedGroups = [];
      foreach ($summarizerGroups as $key => $group) {
        array_push($sortedGroups,$this->sortGroupByOrder($group));
      }

      // Compile Sentences
      foreach ($sortedGroups as $key => $groups) {
        foreach ($groups as $key => $sentence) {
          $finalSummary .= $sentence->content . " ";
        }
        $finalSummary .= "\n\n\n";
      }

      return $finalSummary;
    }

    //**************************************
    //            Filter Methods
    //**************************************
    public static function cmpRank($a,$b){
      if ($a->rank == $b->rank) {
              return 0;
          }
          return ($a->rank > $b->rank) ? -1 : 1;
    }

    public static function cmpOrder($a,$b){
      if ($a->order == $b->order) {
              return 0;
          }
          return ($a->order < $b->order) ? -1 : 1;
    }


}
