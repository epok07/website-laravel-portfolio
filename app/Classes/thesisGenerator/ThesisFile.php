<?php
namespace App\Classes\thesisGenerator;
use \File;
class ThesisFile
{
  public $name;
  public $content;
  public $tokenWords;
  public $tokenSentence;
  public $sentenceRanks;
  public $wordRanks;

  function __construct($_file) {

    $sentenceDelimiters = "\.|\\n|\\r|\?|\!";
    $wordDelimiters = " | |\.|\\n|\\r|\?|\!|\,";
    $irrelevantWords = [""];
    $irrelevantSentences = [""," "];

    // Error Handle
    if ($_file->getMimeType() != "text/plain") {
      throw new \Exception("File type was not plain text!", 1);
    }

    // Set variables
    $content = file_get_contents($_file->path());
  	$name = $_file->getClientOriginalName();

    // Split words
    $tokenWords = preg_split( "/(". $wordDelimiters . ")/", $content );
    $tokenSentence = preg_split( "/(". $sentenceDelimiters . ")/", $content );

    // Clense word Array
    $tokenWords_tmp = [];
    foreach ($tokenWords as $key => $word) {
      if (!in_array($word, $irrelevantWords)) {

        // Calculate rank
        if ($this->wordRanks == null) {
          $this->wordRanks = [$word => 1];
        }elseif (!array_key_exists ($word, $this->wordRanks)) {
          $this->wordRanks[$word] = 1;
        } else{
          $this->wordRanks[$word] += 1;
        }
        array_push($tokenWords_tmp,$word); // add to word dictionnary
      }
    }
    $tokenWords = $tokenWords_tmp;

    // Clense sentence Array
    $tokenSentences_tmp = [];
    foreach ($tokenSentence as $key => $sentence) {
      if (!in_array($sentence, $irrelevantSentences)) {
        // Trip first character if blank
        if ($sentence[0] == " ") {
          array_push($tokenSentences_tmp,substr($sentence,1));
        } else{
          array_push($tokenSentences_tmp,$sentence);
        }

      }
    }
    $tokenSentence = $tokenSentences_tmp;

    dd($this->wordRanks);
    dd($tokenWords);
  }
}

?>
