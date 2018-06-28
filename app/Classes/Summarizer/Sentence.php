<?php
namespace App\Classes\Summarizer;

class Sentence
{
    public $id;
    public $parentId; // document Id
    public $content; // the sentence itself
    public $order; // the sentence number in the document
    public $rank; // the rank of the sentence

    public function __construct($id, $parentId, $content,$order)
    {
      $this->id = $id;
      $this->parentId = $parentId;
      $this->content = $content;
      $this->order = $order;
    }

}
