<?php
/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_related_documents']);

hide($content['field_diagram_image']);
hide($content['field_basics']);
hide($content['field_supporting_image']);

hide($content['field_additional_information_label']);

hide($content['field_additional_image']);
hide($content['field_image_cpation']);

$additionalImage1 = '';
$additionalImage2 = '';
$additionalImage3 = '';
$additionalImage4 = '';
$additionalImage5 = '';
$additionalImage6 = '';

if(!empty($node->field_additional_image['und'][0]['filename'])) {
	$additionalImage1 = file_create_url($node->field_additional_image['und'][0]['uri']);
	$Caption1 = $node->field_image_caption['und'][0]['value'];
}
if(!empty($node->field_additional_image['und'][1]['filename'])) {
	$additionalImage2 = file_create_url($node->field_additional_image['und'][1]['uri']);
	$Caption2 = $node->field_image_caption['und'][1]['value'];
}
if(!empty($node->field_additional_image['und'][2]['filename'])) {
	$additionalImage3 = file_create_url($node->field_additional_image['und'][2]['uri']);
	$Caption3 = $node->field_image_caption['und'][2]['value'];
}
if(!empty($node->field_additional_image['und'][3]['filename'])) {
	$additionalImage4 = file_create_url($node->field_additional_image['und'][3]['uri']);
	$Caption4 = $node->field_image_caption['und'][3]['value'];
}
if(!empty($node->field_additional_image['und'][4]['filename'])) {
	$additionalImage5 = file_create_url($node->field_additional_image['und'][4]['uri']);
	$Caption5 = $node->field_image_caption['und'][4]['value'];
}
if(!empty($node->field_additional_image['und'][5]['filename'])) {
	$additionalImage6 = file_create_url($node->field_additional_image['und'][5]['uri']);
	$Caption6 = $node->field_image_caption['und'][5]['value'];
}


/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/

$pageWidth = 'span12';
if(!empty($node->field_related_links['und'][0]['nid']) || !empty($node->field_related_documents['und'][0]['nid'])) {
	$pageWidth = 'span10';
}

$relatedOne = '';
$relatedTwo = '';
$relatedThree = '';
$relatedFour = '';
$relatedDocs = '';
if(!empty($node->field_related_documents['und'][0]['nid'])) {
	$relatedDocs = 'true';
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

?>

<div id="why-a-product">
	<div class="row-fluid">
		<div class="<?php echo $pageWidth; ?>">
			<h1><?php echo $node->title; ?></h1>
			<?php
			print render($content['field_diagram_image']);
			print render($content['field_basics']);
			print render($content['field_supporting_image']);
			print render($content['field_features_tables']);
			?>

			<?php print render($content['field_additional_information_lab']); ?>
			<div class="additional-information clearfix">

				<?php if($additionalImage1 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage1; ?>" /><br/>
							<small><?php echo $Caption1; ?></small>
						</div>
					</div>
				<?php } ?>
				<?php if($additionalImage2 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage2; ?>" /><br/>
							<small><?php echo $Caption2; ?></small>
						</div>
					</div>
				<?php } ?>
				<?php if($additionalImage3 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage3; ?>" /><br/>
							<small><?php echo $Caption3; ?></small>
						</div>
					</div>
				<?php } ?>
				<?php if($additionalImage4 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage4; ?>" /><br/>
							<small><?php echo $Caption4; ?></small>
						</div>
					</div>
				<?php } ?>
				<?php if($additionalImage5 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage5; ?>" /><br/>
							<small><?php echo $Caption5; ?></small>
						</div>
					</div>
				<?php } ?>
				<?php if($additionalImage6 != '') { ?>
					<div class="fl-left additional-item">
						<div class="additional-item-inner">
							<img src="<?php echo $additionalImage6; ?>" /><br/>
							<small><?php echo $Caption6; ?></small>
						</div>
					</div>
				<?php } ?>

			</div>
			<?php print render($content); ?>
		</div>



		<?php if($pageWidth == 'span10') { ?>
			<div class="span2">
				<div class="related-wrapper desktop-only">

				<?php if($relatedOne != '') { ?>
					<div class="related-item first clearfix">
						<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><h4 class="fl-left"><?php echo $relatedOneText; ?></h4></a>
						<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><span class="go fl-right">GO</span></a>
					</div>
				<?php } ?>
				<?php if($relatedTwo != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><h4 class="fl-left"><?php echo $relatedTwoText; ?></h4></a>
						<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><span class="go fl-right">GO</span></a>
					</div>
				<?php } ?>
				<?php if($relatedThree != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><h4 class="fl-left"><?php echo $relatedThreeText; ?></h4></a>
						<a href="/<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><span class="go fl-right">GO</span></a>
					</div>
				<?php } ?>
				<?php if($relatedFour != '') { ?>
					<div class="related-item clearfix">
						<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><h4 class="fl-left"><?php echo $relatedFourText; ?></h4></a>
						<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><span class="go fl-right">GO</span></a>
					</div>
				<?php } ?>

				<?php if($relatedDocs != '') { ?>
				<div class="related-item quick-downloads clearfix">
					<h4>Quick Downloads</h4>
					<?php print render($content['field_related_documents']); ?>
				</div>
				<?php } ?>

			</div>
			</div>

		<?php } ?>

</div>
