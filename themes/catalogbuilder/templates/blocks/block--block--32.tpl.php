<?php

  global $user;

  if ( $user->uid ) {
      header('location:'.base_path().'catalogbuilder/catalogs-by-user');
  }

  $form = drupal_get_form('user_login_block');
  //echo "<pre>";
  //print_r($form);
?>
<form action="<?php print($form['#action']); ?>"
      method="<?php print($form['#method']);?>"
      id="<?php print($form['#id']); ?>"
      accept-charset="UTF-8">
    <div class="forms-pages login-page frm">
      <div class="container">
        <div class="main-content row">
          <div class="col-xs-12">
            <h2>Welcome to the Portescap Catalog Builder.</h2>
            <p>Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your customers for their specific product design needs.</p>
          </div>
          <div class="col-sm-4">
            <?php $form['name']['#attributes']['placeholder'] = 'Portescap Username' ?>
            <?php $form['name']['#attributes']['id'] = 'edit-name' ?>
            <?php $form['name']['#attributes']['name'] = 'name' ?>
            <?php $form['name']['#attributes']['required'] = 'required' ?>
            <?php print drupal_render($form['name']); ?>
          </div>
          <div class="col-sm-4">
            <?php $form['pass']['#attributes']['placeholder'] = 'Portescap Password' ?>
            <?php $form['name']['#attributes']['id'] = 'edit-pass' ?>
            <?php $form['name']['#attributes']['name'] = 'pass' ?>
            <?php $form['name']['#attributes']['required'] = 'required' ?>
            <?php print drupal_render($form['pass']); ?>
          </div>
          <div class="col-md-4 col-sm-12">
            <?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-primary' ?>
            <?php print drupal_render($form['actions']); ?>
            <a href="<?php print(base_path()); ?>catalogbuilder/user/password" class="handle-password primary-link"  data-modal data-target="#change-pass">Forgot Password?</a>
          </div>
          <?php 
          print drupal_render($form['form_build_id']);
          print drupal_render($form['form_id']);
          ?>
        </div>
      </div>
    </div>
</form>
