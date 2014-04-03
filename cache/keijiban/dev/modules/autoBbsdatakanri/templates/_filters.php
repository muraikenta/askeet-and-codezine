<?php
// auto-generated by sfPropelAdmin
// date: 2014/02/18 00:03:39
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('bbsdatakanri/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_author"><?php echo __('Author:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[author]', isset($filters['author']) ? $filters['author'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_id"><?php echo __('Id:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[id]', isset($filters['id']) ? $filters['id'] : null, array (
  'size' => 7,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_parent_id"><?php echo __('Parent:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[parent_id]', isset($filters['parent_id']) ? $filters['parent_id'] : null, array (
  'size' => 7,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'bbsdatakanri/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>