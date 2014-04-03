<?php use_helper('Date') ?>

<?php echo $answer->getRelevancyUpPercent().'% UP '.$answer->getRelevancyDownPercent().'% DOWN' ?>
 posted by <?php echo link_to($answer->getUser(),'user/show?nickname='.$answer->getUser()->getNickname()) ?>
 on <?php echo format_date($answer->getCreatedAt(), 'p') ?>
<div>
   <?php echo $answer->getBody() ?>
</div>

