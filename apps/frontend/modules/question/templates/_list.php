
<?php use_helper('Text','Date','Global') ?>

<?php foreach ($question_pager->getResults() as $question): ?>
  <div class="question">
    <div class="interested_block" id="block_<?php echo $question->getId() ?>">
      <?php include_partial('interested_user',array('question'=>$question)) ?>
    </div>
    <h2><?php echo link_to($question->getTitle(),'question/show?stripped_title='.$question->getStrippedTitle()) ?></h2>

    <div class="question_body">
      <div>asked by <?php echo link_to($question->getUser(), 'user/show?nickname='.$question->getUser()->getNickname()) ?> on <?php echo format_date($question->getCreatedAt(), 'f') ?></div>
      <?php echo truncate_text($question->getHtmlBody(),200) ?>
    </div>
  </div>
<?php endforeach; ?>

<div id="question_pager">
  <?php echo pager_navigation($question_pager,$rule) ?>
</div>
