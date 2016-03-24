<?php
  // print '<pre>'; print_r($form); print '</pre>'; exit;
?>
<div class="forms-pages login-page frm">
  <div class="container">
    <div class="main-content row">
      <div class="col-xs-12">
        <h2><?php print $title; ?></h2>
        <p><?php print $subtitle; ?></p>
      </div>
      <div class="col-sm-4">
        <?php print drupal_render($form['account']['name']); ?>
      </div>
      <div class="col-sm-4">
        <?php print drupal_render($form['account']['mail']); ?>
      </div>
      <div class="col-sm-12 col-md-4">
        <?php print drupal_render($form['actions']); ?>
      </div>
      <?php
      print drupal_render($form['form_build_id']);
      print drupal_render($form['form_id']);
      ?>
    </div>
  </div>
</div>