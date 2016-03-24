<?php
  module_load_include('inc', 'user', 'user.pages');
  global $user;

  $form = drupal_get_form('user_profile_form',$user);

  // echo "<pre>";
  // print_r($form);

//print(drupal_get_form('user_profile_form', $user));

?>
<form action="<?php print($form['#action']); ?>&destination=catalogbuilder/password/changed"
      method="<?php print($form['#method']);?>"
      id="<?php print($form['#id']); ?>"
      accept-charset="UTF-8">
  <div class="forms-pages password-change frm">
      <div class="">
        <div class="main-content">
          <div class="">
            <h1>Change password!</h1>
            <p>Please enter your existing new passwords below.</p>
          </div>
          <div class="inputs-wrapper">
              <?php $form['account']['current_pass']['#attributes']['placeholder'] = 'Current Password' ?>
              <?php print drupal_render($form['account']['current_pass']); ?>

              <?php $form['account']['pass']['pass1']['#attributes']['placeholder'] = 'New Password' ?>
              <?php print drupal_render($form['account']['pass']['pass1']); ?>

              <?php $form['account']['pass']['pass2']['#attributes']['placeholder'] = 'New Password Confirmation' ?>
              <?php print drupal_render($form['account']['pass']['pass2']); ?>

          </div>
          <div class="">
            <?php $form['actions']['submit']['#attributes']['class'][] = 'btn btn-primary' ?>
            <?php print drupal_render($form['actions']); ?>
          </div>
          <?php 
          print drupal_render($form['form_build_id']);
          print drupal_render($form['form_id']);
          print drupal_render($form['form_token']);
          print drupal_render($form['overlay_control']);


          ?>
        </div>
      </div>
    </div>
</form>
