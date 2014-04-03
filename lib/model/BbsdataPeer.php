<?php

/**
 * Subclass for performing query and update operations on the 'bbsdata' table.
 *
 * 
 *
 * @package lib.model
 */ 
class BbsdataPeer extends BaseBbsdataPeer
{
  static function getMybbsPager($page)
  {
    $c = new Criteria();
    $c->add(BbsdataPeer::PARENT_ID, 0);
    $c->addDescendingOrderByColumn(BbsdataPeer::ID);
    $pager = new sfPropelPager('Bbsdata', 5);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  public static function getMybbsReplies($parent)
  {
    $c_reply = new Criteria();
    $c_reply->add(BbsdataPeer::PARENT_ID, $parent->getId());
    $c_reply->addAscendingOrderByColumn(BbsdataPeer::ID);
    return BbsdataPeer::doSelect($c_reply);
  }

  public static function getSearchResults($word)
  {
    $c = new Criteria();
    $c1 = $c->getNewCriterion(BbsdataPeer::AUTHOR, 
          '%'.$word.'%', 
          Criteria::LIKE);
    $c2 = $c->getNewCriterion(BbsdataPeer::TITLE, 
          '%'.$word.'%', 
          Criteria::LIKE);
    $c3 = $c->getNewCriterion(BbsdataPeer::BODY, 
          '%'.$word.'%', 
          Criteria::LIKE);

    $c1->addOr($c2);
    $c1->addOr($c3);
    $c->add($c1);

    $c->addDescendingOrderByColumn(BbsdataPeer::ID);
    return BbsdataPeer::doSelect($c);
  }

}
