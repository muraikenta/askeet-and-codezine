<?php

/**
 * Subclass for representing a row from the 'answer' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Answer extends BaseAnswer
{
    public function getRelevancyUpPercent()
    {
      $total = $this->getRelevancyUp() + $this->getRelevancyDown();

      return $total ? sprintf('%.0f', $this->getRelevancyUp() * 100 / $total) : 0;
    }

    public function getRelevancyDownPercent()
    {
      $total = $this->getRelevancyUp() + $this->getRelevancyDown();

      return $total ? sprintf('%.0f', $this->getRelevancyDown() * 100 / $total) : 0;
    }

    public function setBody($v)
    {
      parent::setBody($v);

      require_once('markdown.php');

      $v = htmlentities($v,ENT_QUOTES,'UTF-8');

      $this->setHtmlBody(markdown($v));
      }


}

