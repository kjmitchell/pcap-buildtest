<?php
/* let's hide some fields we don't want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_heading']);
if(isset($node->field_heading['und'][0]['value'])) {
	$heading = $node->field_heading['und'][0]['value'];
} else {
	$heading = $node->title;
}
hide($content['field_main_features_1']);
hide($content['field_main_features_2']);
hide($content['field_main_features_3']);
hide($content['field_main_features_4']);
hide($content['field_main_features_5']);
hide($content['field_main_features_6']);
hide($content['field_main_features_7']);
hide($content['field_main_features_8']);
hide($content['field_main_features_9']);
hide($content['field_main_features_10']);
hide($content['field_customization_options_1']);
hide($content['field_customization_options_2']);
hide($content['field_customization_options_3']);
hide($content['field_customization_options_4']);
hide($content['field_customization_options_5']);
hide($content['field_customization_options_6']);
hide($content['field_customization_options_7']);
hide($content['field_customization_options_8']);
hide($content['field_customization_options_9']);
hide($content['field_customization_options_10']);
hide($content['field_applications_1']);
hide($content['field_applications_2']);
hide($content['field_applications_3']);
hide($content['field_applications_4']);
hide($content['field_applications_5']);
hide($content['field_applications_6']);
hide($content['field_applications_7']);
hide($content['field_applications_8']);
hide($content['field_applications_9']);
hide($content['field_applications_10']);
hide($content['field_linked_applications']);

hide($content['field_solution_info']);
hide($content['field_main_product_image']);
$imgsrc = file_create_url($node->field_main_product_image['und'][0]['uri']);

hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_related_drives']);
hide($content['field_related_encoders']);
hide($content['field_related_gearheads']);
hide($content['field_related_motors']);
$relatedOne = '';
$relatedTwo = '';
$relatedThree = '';
$relatedFour = '';


$relatedDrives = '';
$relatedEncoders = '';
$relatedGearheads = '';
$relatedMotors = '';
if(!empty($node->field_related_gearheads['und'][0]['nid'])) {
	$relatedGearheads = 'true';
}
if(!empty($node->field_related_drives['und'][0]['nid'])) {
	$relatedDrives = 'true';
}
if(!empty($node->field_related_encoders['und'][0]['nid'])) {
	$relatedEncoders = 'true';
}
if(!empty($node->field_related_motors['und'][0]['nid'])) {
	$relatedMotors = 'true';
}

$relatedOneTarget = '';
$relatedTwoTarget = '';
$relatedThreeTarget = '';
$relatedFourTarget = '';
if(!empty($node->field_related_links['und'][0]['nid'])) {
	$target = $node->field_related_links['und'][0]['nid'];
	$options = array('absolute' => TRUE);
	$nid = $target;
	$relatedOne = url('node/' . $nid, $options);
		/* $relatedOne = '/' . drupal_get_path_alias('node/' . $target); */
	$relatedOneText = $node->field_related_links_text['und'][0]['value'];
	$targetNode = node_load($target);
	if(!empty($targetNode->field_target_page['und'][0]['value'])) {
		$relatedOne = $targetNode->field_target_page['und'][0]['value'];
	}
	if(!empty($targetNode->field_target['und'][0]['value'])) {
		$relatedOneTarget = $targetNode->field_target['und'][0]['value'];
	}
}
if(!empty($node->field_related_links['und'][1]['nid'])) {
	$target = $node->field_related_links['und'][1]['nid'];
	$options = array('absolute' => TRUE);
	$nid = $target;
	$relatedTwo = url('node/' . $nid, $options);
		/* $relatedTwo = '/' . drupal_get_path_alias('node/' . $target); */
	$relatedTwoText = $node->field_related_links_text['und'][1]['value'];
	$targetNode = node_load($target);
	if(!empty($targetNode->field_target_page['und'][0]['value'])) {
		$relatedTwo = $targetNode->field_target_page['und'][0]['value'];
	}
	if(!empty($targetNode->field_target['und'][0]['value'])) {
		$relatedTwoTarget = $targetNode->field_target['und'][0]['value'];
	}
}
if(!empty($node->field_related_links['und'][2]['nid'])) {
	$target = $node->field_related_links['und'][2]['nid'];
	$options = array('absolute' => TRUE);
	$nid = $target;
	$relatedThree = url('node/' . $nid, $options);
		/* $relatedThree = '/' . drupal_get_path_alias('node/' . $target); */
	$relatedThreeText = $node->field_related_links_text['und'][2]['value'];
	$targetNode = node_load($target);
	if(!empty($targetNode->field_target_page['und'][0]['value'])) {
		$relatedThree = $targetNode->field_target_page['und'][0]['value'];
	}
	if(!empty($targetNode->field_target['und'][0]['value'])) {
		$relatedThreeTarget = $targetNode->field_target['und'][0]['value'];
	}
}
if(!empty($node->field_related_links['und'][3]['nid'])) {
	$target = $node->field_related_links['und'][3]['nid'];
	$options = array('absolute' => TRUE);
	$nid = $target;
	$relatedFour = url('node/' . $nid, $options);
		/* $relatedFour = '/' . drupal_get_path_alias('node/' . $target); */
	$relatedFourText = $node->field_related_links_text['und'][3]['value'];
	$targetNode = node_load($target);
	if(!empty($targetNode->field_target_page['und'][0]['value'])) {
		$relatedFour = $targetNode->field_target_page['und'][0]['value'];
	}
	if(!empty($targetNode->field_target['und'][0]['value'])) {
		$relatedFourTarget = $targetNode->field_target['und'][0]['value'];
	}
}
$mc_rightRailLink = false;
if(!empty($node->field_product_type['und'][0]['value'])) {
	$productType = $node->field_product_type['und'][0]['value'];
	global $user;
	$currentlanguage = i18n_langcode();
	if($productType != 'Disc Magnet Stepper') {
		$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_english.jpg" alt="MotionCompass" title="MotionCompass" />';
		$mc_link = 'http://motioncompass.com';
			switch($currentlanguage) {
			case 'pt':
				$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_portuguese.jpg" alt="MotionCompass" title="MotionCompass" />';
				break;
			case 'zh-hans':
				$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_chinese.jpg" alt="MotionCompass" title="MotionCompass" />';
				break;
			case 'ko':
				$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_korean.jpg" alt="MotionCompass" title="MotionCompass" />';
				break;
			case 'ja':
				$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_japanese.jpg" alt="MotionCompass" title="MotionCompass" />';
				break;
			case 'de':
				$mc_image = '<img src="/images/prt_318-MotionCompassRightRail_german.jpg" alt="MotionCompass" title="MotionCompass" />';
				break;
		}
		$mc_rightRailLink = true;
	}
}

$mc_rightRailLinkNEW = false;
if(!empty($node->field_product_type['und'][0]['value'])) {
	$productType = $node->field_product_type['und'][0]['value'];
	global $user;
	$currentlanguage = i18n_langcode();
	if($productType != 'Disc Magnet Stepper') {
		switch($currentlanguage) {
			case 'en':
				$mc_text1 = t('Reduce <br/>Design Time');
				$mc_text2 = t('Select Your Motor Online');
				break;
			case 'pt':
				$mc_text1 = t('Reduza o <br/>tempo&nbsp;de&nbsp;projeto');
				$mc_text2 = t('Selecione o<br/>seu motor online');
				break;
			case 'zh-hans':
				$mc_text1 = '缩小设计周期';
				$mc_text2 = '在线电机选型';
				break;
			case 'cn':
				$mc_text1 = '缩小设计周期';
				$mc_text2 = '在线电机选型';
				break;
			case 'ja':
				$mc_text1 = '設計時間の低減';
				$mc_text2 = 'オンラインで<br/>モータを選択';
				break;
			case 'ko':
				$mc_text1 = '<span style="font-weight:normal; font-size:17px;">디자인 시간 단축</span>';
				$mc_text2 = t('온라인모터선택');
				break;
			case 'de':
				$mc_text1 = 'Verkürzen<br/>Sie Ihre Entwicklungszeit';
				$mc_text2 = 'Wählen Sie ihren Antrieb online';
		}

		$mc_image = '<img src="/sites/all/themes/portescap/images/mc_rightrailimage.jpg" alt="MotionCompass" title="MotionCompass" />';
		$mc_link = 'http://motioncompass.com';
		$mc_rightRailLinkNEW = true;
	}
}

?>

<?php
/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/
?>
<div id="product">

	<div class="row-fluid mobile-only">
		<div class="span12">
			<h2><?php print t('Products'); ?></h2>
		</div>
	</div>

	<div class="row-fluid bordered">
		<div class="span12 title">
			<h1 class="fl-left left"><?php echo $heading; ?></h1>

		</div>
	</div>

	<div class="row-fluid">
		<div class="span5 left">
			<?php /* print render($content['field_main_product_image']); */?>
            <img src="<?php echo $imgsrc ?>" alt="<?php echo $node->title; ?> - <?php echo $heading; ?>" />
			<?php if($relatedDrives != '' || $relatedEncoders != '' || $relatedGearheads != '' || $relatedMotors != '') { ?>
			<div id="related-products" class="desktop-only">
				<h5><?php print t('Related Products:'); ?></h5>
				<div class="row-fluid">
					<?php if($relatedGearheads != '') { ?>
						<div class="span4">
							<h6 class="red"><?php print t('Gearheads'); ?></h6>
							<?php print render($content['field_related_gearheads']); ?>
						</div>
					<?php } ?>

					<?php if($relatedEncoders != '') { ?>
						<div class="span4">
							<h6 class="red"><?php print t('Encoders'); ?></h6>
							<?php print render($content['field_related_encoders']); ?>
						</div>
					<?php } ?>

					<?php if($relatedDrives != '') { ?>
						<div class="span4">
							<h6 class="red"><?php print t('Drives'); ?></h6>
							<?php print render($content['field_related_drives']); ?>
						</div>
					<?php } ?>

					<?php if($relatedMotors != '') { ?>
						<div class="span4">
							<h6 class="red"><?php print t('Motors'); ?></h6>
							<?php print render($content['field_related_motors']); ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="span5 left right">
			<?php
			if($heading != $node->title) {
				echo '<h2 class="large">'.$node->title.'</h2>';
			}
			?>
			<?php print render($content['field_solution_info']); ?>
		<h3><?php print t('Motor Highlights'); ?></h3>
		<ul>
			<?php print render($content['field_main_features_1']);
			print render($content['field_main_features_2']);
			print render($content['field_main_features_3']);
			print render($content['field_main_features_4']);
			print render($content['field_main_features_5']);
			print render($content['field_main_features_6']);
			print render($content['field_main_features_7']);
			print render($content['field_main_features_8']);
			print render($content['field_main_features_9']);
			print render($content['field_main_features_10']);
			?>
		</ul>

		<h3><?php print t('Customization Available'); ?></h3>
		<ul>
			<?php
				print render($content['field_customization_options_1']);
				print render($content['field_customization_options_2']);
				print render($content['field_customization_options_3']);
				print render($content['field_customization_options_4']);
				print render($content['field_customization_options_5']);
				print render($content['field_customization_options_6']);
				print render($content['field_customization_options_7']);
				print render($content['field_customization_options_8']);
				print render($content['field_customization_options_9']);
				print render($content['field_customization_options_10']);
			?>
		</ul>
		<?php if(!empty($node->field_linked_applications['und'][0]['nid']) || !empty($node->field_applications_1['und'][0]['value'])) { ?>
		<h3><?php print t('Applications'); ?></h3>
		<?php } ?>
		<ul>
		<?php
		print render($content['field_linked_applications']);
		print render($content['field_applications_1']);
		print render($content['field_applications_2']);
		print render($content['field_applications_3']);
		print render($content['field_applications_4']);
		print render($content['field_applications_5']);
		print render($content['field_applications_6']);
		print render($content['field_applications_7']);
		print render($content['field_applications_8']);
		print render($content['field_applications_9']);
		print render($content['field_applications_10']);
		?>
		</ul>

		</div>

		<div class="span2">
			<div class="desktop-only">
				<?php if($relatedOne != '') { ?>
					<div class="related-item first clearfix">
						<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><h4 class="fl-left"><?php echo $relatedOneText; ?></h4></a>
						<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedTwo != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><h4 class="fl-left"><?php echo $relatedTwoText; ?></h4></a>
						<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedThree != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><h4 class="fl-left"><?php echo $relatedThreeText; ?></h4></a>
						<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedFour != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><h4 class="fl-left"><?php echo $relatedFourText; ?></h4></a>
						<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($mc_rightRailLinkNEW == true) { ?>
					<div class="related-item clearfix motioncompass">
						<h4 style="max-width:none;"><?php echo $mc_text1; ?></h4>
						<a href="<?php echo $mc_link; ?>" target="_blank">
							<h4 style="max-width:none;">
								<?php echo $mc_text2; ?>
							</h4>
						</a>
						<a href="<?php echo $mc_link; ?>" target="_blank">
							<?php echo $mc_image; ?>
						</a>
					</div>
				<?php } else if($mc_rightRailLink == true) { ?>
					<div class="related-item clearfix motioncompass">
						<a href="<?php echo $mc_link; ?>" target="_blank">
							<?php echo $mc_image; ?>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>


	<div class="row-fluid bordered">
		<div class="span12 right left">
			<?php print render($content); ?>
		</div>
	</div>

</div>
