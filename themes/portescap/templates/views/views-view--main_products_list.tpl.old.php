<div id="main-products-list">	<style type="text/css">#content h5.left p { font-size:24px; margin-bottom:0;} </style>
	<?php
	$n = 0;

	foreach($view->result as $group) {
		/*
		echo '<pre>';
		print_r($group);
		echo '</pre>';
		*/
		$theTitle = '';
		$theImage = '';
		$theNote = '';

		$theTitle = $group->node_title;
		if(!empty($group->_field_data['nid']['entity']->field_front_facing_title['und'][0]['safe_value'])) {
			$theTitle = $group->_field_data['nid']['entity']->field_front_facing_title['und'][0]['safe_value'];
		}

		$theImage = file_create_url($group->_field_data['nid']['entity']->field_image['und'][0]['uri']);
		if(!empty($group->_field_data['nid']['entity']->field_note['und']['0']['safe_value'])) {
			$theNote = $group->_field_data['nid']['entity']->field_note['und']['0']['safe_value'];
		}
		$theGroupId = $group->_field_data['nid']['entity']->nid;
		$theGroupOptions = array('absolute' => TRUE);
		$thePath = url('node/' . $theGroupId, $theGroupOptions);
		$n++;

		?>

		<a href="<?php echo $thePath; ?>">
		<div class="fl-left product-item product-<?php echo $n; ?>" style="background-image:url('<?php echo $theImage; ?>');">
			<div class="product-item-inner">
				<h5 class="left"><?php echo $theTitle; ?></h5>
				<div class="note left">
					<?php if($theNote != '') { echo $theNote; } ?>
				</div>
				<div class="desktop-only">
					<span de="GEHEN" en="GO" class="go"><?php print t('GO'); ?></span>
				</div>
			</div>
		</div>
		</a>
	<?php } ?>

</div>