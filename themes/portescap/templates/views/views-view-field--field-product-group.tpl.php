<?php
	$node = $row->_field_data['product_id']['entity']->field_product_group['und'][0]['nid'];
	$translatedNode = translation_node_get_translations($node);
	$currentlanguage = i18n_langcode();


	/*if($translatedNode[$currentlanguage]->status == 1) { */
		$burst = '';
		if(!empty($row->field_field_new[0]['raw']['value'])) {
			$burst = 'yes';
		}
		$nodepath = $row->field_field_product_group[0]['rendered']['#href'];
		$theTitle = $row->field_field_product_group[0]['rendered']['#title'];
		$languagepaths = translation_path_get_translations($nodepath);
		$path = $languagepaths[$currentlanguage];
		$options = array('absolute' => TRUE);
		$theUrl = url($path, $options);
		if($path) { ?>
			<span class="new-product-burst <?php echo $burst; ?>"></span><a href="<?php echo $theUrl; ?>"><?php echo $theTitle; ?></a>
		<?php } else {
			print $output; /* drupal views default output for field */
		}
	/*} else {
		echo '<a href="hide" class="hide"></span>';
	} */
?>