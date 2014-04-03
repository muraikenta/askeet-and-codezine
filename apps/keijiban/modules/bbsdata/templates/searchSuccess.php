<?php use_helper('Search') ?>

<h1>検索結果：<?php echo $skey ?></h1>
<div align="right">
<?php echo form_tag('bbsdata/search') ?>
<?php echo input_tag('kensaku_key','') ?>
<?php echo submit_tag('検索') ?>
</form>
</div>
<hr />

<?php foreach ($bbsdatas as $bbsdata): ?>
<?php if($bbsdata->getTitle()!="DELETED"): ?>
<table>
<thead>
<tr>
  <th>Id</th>
  <th> タイトル</th>
  <th> お名前</th>
  <th> Date</th>
</tr>
</thead>
<tbody>
<tr>
  <td>
    <?php echo $bbsdata->getId() ?>
  </td>
  <td>
    <big><?php echo highlight_and_format_text($bbsdata->getTitle(),$skey) ?></big>
  </td>
  <td>
    <?php echo highlight_mail_to($bbsdata->getMail(),$bbsdata->getAuthor(),$skey) ?>
  </td>
  <td>
    <small>[<?php echo $bbsdata->getCreatedAt() ?>]</small>
  </td>
  <td>
    <?php echo link_to('Url',$bbsdata->getUrl()) ?>
  </td>

  <td>
  <?php if($bbsdata->getParentId()==0): ?>
    <?php echo '<b> Parent article </b>' ?>
  <?php else: ?>
    <?php echo '<i> Parent article id:'.$bbsdata->getParentId().'</i>' ?>
  <?php endif; ?>
  </td>
</tr>
</tbody>
</table>
<br />
<p><?php echo highlight_and_format_text($bbsdata->getBody(),$skey) ?></p>
<br /><br />
<div align="right">
<?php echo form_tag('bbsdata/sakujo') ?>
<?php echo input_password_tag('sakujo_key','') ?>
<?php echo input_hidden_tag('id',$bbsdata->getId()) ?>
<?php echo submit_tag('削除') ?>
</form>
</div>
<hr />
<?php endif; ?>
<?php endforeach; ?>
<?php
 echo form_tag('bbsdata/create','create');
 echo input_hidden_tag('oya_id',0);
 echo submit_tag('投稿する');
?>
</form>
<p><?php echo link_to('一覧表示へ','bbsdata/list') ?></p>
