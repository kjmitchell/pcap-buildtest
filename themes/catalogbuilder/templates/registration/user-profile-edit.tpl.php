<?php
  // print '<pre>'; print_r($form); print '</pre>'; exit;
?>
<div class="forms-pages login-page password-change frm">
  <div class="container">
    <div class="main-content row">
      <div class="col-xs-12">
        <h2><?php print $title; ?></h2>
        <p><?php print $subtitle; ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php print drupal_render($form['account']['mail']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php print drupal_render($form['account']['pass']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php print drupal_render($form['actions']); ?>
      </div>
    </div>
      <?php
      print render($form['form_id']);
      print render($form['form_build_id']);
      print render($form['form_token']);
      ?>
    </div>
  </div>
</div>