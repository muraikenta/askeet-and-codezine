<?php use_helper('Date', 'Global') ?>
 
<h1>recent answers</h1>
 
<div id="answers">
<?php foreach ($answer_pager->getResults() as $answer): ?>
  <div class="answer">
    <h2><?php echo link_to($answer->getQuestion()->getTitle(), 'question/show?stripped_title='.$answer->getQuestion()->getStrippedTitle()) ?></h2>
    <?php echo include_partial('answer',array('answer'=>$answer)) ?> 
  </div>
<?php endforeach ?>
</div>        
 
<div id="question_pager">
  <?php echo pager_navigation($answer_pager, 'answer/recent') ?>
</div>
