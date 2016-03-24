<?php
  module_load_include('inc', 'user', 'user.pages');
  $form = drupal_get_form('user_pass');
?>
<form action="<?php print($form['#action']); ?>"
      method="<?php print($form['#method']);?>"
      id="<?php print($form['#id']); ?>"
      accept-charset="UTF-8">
    <div class="forms-pages login-page frm">
      <div class="container">
        <div class="main-content row">
          <div class="col-xs-12">
            <h2>Forgot your password?</h2>
            <p>Please enter your Portescap email address to have your password sent to you via email.</p>
          </div>
          <div class="col-md-4 col-sm-6">
            <?php $form['name']['#attributes']['placeholder'] = 'Portescap Email' ?>
            <?php $form['name']['#attributes']['id'] = 'edit-name' ?>
            <?php $form['name']['#attributes']['name'] = 'name' ?>
            <?php $form['name']['#attributes']['required'] = 'required' ?>
            <?php print drupal_render($form['name']); ?>
          </div>
          <div class="col-md-4 col-sm-6">
            <?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-primary' ?>
            <?php $form['actions']['submit']['#value'] = 'Send' ?>
            <?php print drupal_render($form['actions']); ?>
          </div>
          <?php 
          print drupal_render($form['form_build_id']);
          print drupal_render($form['form_id']);
          ?>
        </div>
      </div>
    </div>
</form>