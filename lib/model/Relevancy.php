<?php

/**
 * Subclass for representing a row from the 'relevancy' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Relevancy extends BaseRelevancy
{
    public function save($con = null)
    {
      $con = Propel::getConnection();
      try
      {
        $con->begin();

        $ret = parent::save();

        // answerテーブルのrelevancyを更新する
        $answer = $this->getAnswer();
        if ($this->getScore() == 1)
        {
          $answer->setRelevancyUp($answer->getRelevancyUp() + 1);
        }
        else
        {
          $answer->setRelevancyDown($answer->getRelevancyDown() + 1);
        }
        $answer->save($con);

        $con->commit();

        return $ret;
      }
      catch (Exception $e)
      {
        $con->rollback();
        throw $e;
      }
    }
}
