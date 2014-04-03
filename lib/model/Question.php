<?php

/**
 * Subclass for representing a row from the 'question' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Question extends BaseQuestion
{
  public function setTitle($v)
  {
    parent::setTitle($v);

    $this->setStrippedTitle(myTools::stripText($v));
  }

  public function setBody($v)
  {
    parent::setBody($v);

    require_once('markdown.php');

    $v = htmlentities($v,ENT_QUOTES,'UTF-8');

    $this->setHtmlBody(markdown($v));
  }
   
}
