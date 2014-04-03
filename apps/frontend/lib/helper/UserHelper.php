<?php
 
use_helper('Javascript');
 
function link_to_user_interested($user, $question)
{
  if ($user->isAuthenticated())
  {
    $interested = InterestPeer::retrieveByPk($question->getId(), $user->getSubscriberId());
    if ($interested)
    {
      // すでに興味を持っている
      return 'interested!';
    }
    else
    {
      // 興味があることをまだ宣言していなかった
      return link_to_remote('interested?', array(
        'url'      => 'user/interested?id='.$question->getId(),
        'update'   => array('success' => 'block_'.$question->getId()),
        'loading'  => "Element.show('indicator')",
        'complete' => "Element.hide('indicator');".visual_effect('highlight', 'mark_'.$question->getId()),
      ));
    }
  }
  else
  {
    return link_to_login('interested?');
  }
}

function link_to_login($name,$uri = null)
{
  if($uri && sfContext::getInstance()->getUser()->isAuthenticated())
  {
    return link_to($name,$uri);
  }
  else
  {
    return link_to_function($name,visual_effect('blind_down','login',array('duration'=>0.5)));
  }
}
 
?>
