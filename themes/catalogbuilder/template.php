<?php


function portescap_preprocess_node(&$vars) {
  
}

function portescap_theme(){
    

    $items = array();
	$items['user_login'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'portescap') . '/templates/registration',
		'template' => 'user-login',
		'preprocess functions' => array(
		   'portescap_preprocess_user_login'
		),
	);
	$items['user_register_form'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'portescap') . '/templates/registration',
		'template' => 'user-register-form',
		'preprocess functions' => array(
		  'portescap_preprocess_user_register_form'
		),
	);
	$items['user_pass'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'portescap') . '/templates/registration',
		'template' => 'user-pass',
		'preprocess functions' => array(
		  'portescap_preprocess_user_pass'
		),
	);
	$items['user_profile_form'] = array(
		'render element' => 'form',
		'path' => drupal_get_path('theme', 'portescap') . '/templates/registration',
    'template' => 'user-profile-edit',
    'preprocess functions' => array(
    	'portescap_preprocess_user_edit'
    	)
  	);

  return $items;
}

function portescap_preprocess_user_login(&$variables) {
	$variables['title'] = t('Welcome to the Portescap Catalog Builder.');
	$variables['subtitle'] = t('Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your customers for their specific product design needs.');
  $variables['form']['actions']['submit']['#value'] = t('Sign In');

  $variables['form']['name']['#attributes']['placeholder'] = $variables['form']['name']['#title'];
  $variables['form']['pass']['#attributes']['placeholder'] = $variables['form']['pass']['#title'];

  $variables['form']['actions']['submit']['#attributes']['class'] = array('btn', 'btn-primary');

}

function portescap_preprocess_user_register_form(&$variables) {
	$variables['title'] = t('Welcome to the Portescap Catalog Builder.');
	$variables['subtitle'] = t('Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your customers for their specific product design needs.');
	$variables['form']['actions']['submit']['#value'] = t('Sign Up');
  
  $variables['form']['account']['name']['#attributes']['placeholder'] = $variables['form']['account']['name']['#title'];
  $variables['form']['account']['mail']['#attributes']['placeholder'] = $variables['form']['account']['mail']['#title'];

  $variables['form']['actions']['submit']['#attributes']['class'] = array('btn', 'btn-primary');

}

function portescap_preprocess_user_pass(&$variables) {
	$variables['title'] = t('Forgot your password?');
	$variables['subtitle'] = t('Please enter your Portescap email address to have your password sent to you via email.');
	$variables['form']['actions']['submit']['#value'] = t('Send');
  
  $variables['form']['name']['#attributes']['placeholder'] = t('Portescap email');

  $variables['form']['actions']['submit']['#attributes']['class'] = array('btn', 'btn-primary');

}

function portescap_preprocess_user_edit(&$variables) {
	$variables['title'] = t('Edit your password');
	$variables['subtitle'] = t('Edit your password');
	$variables['form']['actions']['submit']['#value'] = t('Send');
  
  $variables['form']['account']['mail']['#attributes']['disabled'] = t('disabled');
  $variables['form']['account']['mail']['#attributes']['placeholder'] = $variables['form']['account']['mail']['#title'];
  $variables['form']['account']['pass']['pass1']['#attributes']['placeholder'] = $variables['form']['account']['pass']['pass1']['#title'];
  $variables['form']['account']['pass']['pass2']['#attributes']['placeholder'] = $variables['form']['account']['pass']['pass2']['#title'];

  $variables['form']['actions']['submit']['#attributes']['class'] = array('btn', 'btn-primary');

}


/**
 * Implements hook_block_info().
 */
function custom_block_block_info() {
  $blocks = array();
  $blocks['my_block'] = array(
    'info' => t('My Custom Block'),
  );
  
  return $blocks;
}

/**
*theme paths
*/

function theme_url($name) {
	global $base_url;
	return $base_url.'/'.path_to_theme().'/';
}

function stylesheet_url($name) {
	global $base_url;
	return $base_url.'/'.path_to_theme().'/css/'.$name.'.css';
}

function images_url($name) {
	global $base_url;
	return $base_url.'/'.path_to_theme().'/images/';
}

function portescap_preprocess_block(&$vars, $hook){
  if (isset($vars['block']))
  {
    $vars['content'] = $vars['elements']['#children'];
    $vars['theme_hook_suggestions'][] = '/templates/blocks/block__' . $vars['block']->module.'__'.$vars['block']->delta;
  }
}

/*
* Preprocess for view
*/
function armorall_preprocess_views_view(&$vars, $hook)
{
  if (isset($vars['view']))
  { 
    $vars['theme_hook_suggestions'][] = '/templates/views/views_view__'. $vars['view']->name;
    extend_functionality(__FUNCTION__, $vars['view']->name, $vars);
  }
}


 // function portescap_preprocess() {
	// //return array("MM_preloadImages('myimages.png', 'myimages2.png')");
 // 	$path = current_path();

 // 	$alias = drupal_lookup_path('alias', $path, NULL);

	// $items = array();

	// if($alias == 'catalog/user'){
		
 //    //array_unshift($vars['user_login'], 'user-login');
	// //drupal_goto("user/login");


	// 	$items['user_login'] = array(
	// 		'render element' => 'form',
	// 		'path' => drupal_get_path('theme', 'portescap') . '/templates/registration',
	// 		'template' => 'user-login',
	// 		'preprocess functions' => array(
	// 		   'portescap_preprocess_user_login'
	// 		),
	// 	);
	// }
 // } 





?>

