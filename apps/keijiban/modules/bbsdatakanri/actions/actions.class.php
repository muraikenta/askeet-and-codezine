<?php

/**
 * bbsdatakanri actions.
 *
 * @package    mysite
 * @subpackage bbsdatakanri
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bbsdatakanriActions extends autobbsdatakanriActions
{
  public function executeLogin()
  {
    if($this->getRequestParameter('username')=='kanri'){
        if($this->getRequestParameter('password')=='kanri'){
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->addCredential('admin');
            return $this->forward('bbsdatakanri','list');
          }
      }
      $this->getUser()->setAuthenticated(false);
    }

  public function executeLogout()
  {
    $this->getUser()->setAuthenticated(false);
    $response = $this->getResponse();
    $response->setTitle('logout|admin|My BBS');
  }
}


