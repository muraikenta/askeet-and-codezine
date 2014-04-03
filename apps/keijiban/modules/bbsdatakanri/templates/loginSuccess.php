<?php echo form_tag('bbsdatakanri/login') ?>

  <fieldset>

  <div class="form-row">
    <label for="nickname">管理者名：</label>
    <?php echo input_tag('username',$sf_params->get('username')) ?>
  </div>
  
  <div class="form-row">
    <label for="password">パスワード：</label>
    <?php echo input_password_tag('password') ?>
  </div>
  </fieldset>

  <?php echo submit_tag('ログイン') ?>

</form>
