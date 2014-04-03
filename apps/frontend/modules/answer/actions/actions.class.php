<?php

/**
 * answer actions.
 *
 * @package    mysite
 * @subpackage answer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class answerActions extends sfActions
{
  public function executeRecent()
  {
    $this->answer_pager = AnswerPeer::getRecentPager($this->getRequestParameter('page',1));
  }

  public function executeAdd()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      if(!$this->getRequestParameter('body'))
      {
        return sfView::NONE;  
      }

      $question = QuestionPeer::retrieveByPk($this->getRequestParameter('question_id'));
      $this->forward404Unless($question);

      $user = $this->getUser()->isAuthenticated() ? $this->getUser()->getSubscriber():UserPeer::retrieveByNickname('anonymous');

      $this->answer = new Answer();
      $this->answer->setQuestion($question);
      $this->answer->setBody($this->getRequestParameter('body'));
      $this->answer->setUser($user);
      $this->answer->save();

      return sfView::SUCCESS;
    }
    
    $this->forward404();
  }
}
