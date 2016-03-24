<?php
/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['body']);
hide($content['field_intro']);
hide($content['field_image']);
hide($content['field_applicable_products']);
hide($content['field_related_links']);
hide($content['field_related_links_text']);
$productBackground = '';
if(!empty($node->field_image['und']['0']['filename'])) {
	$productBackground = file_create_url($node->field_image['und'][0]['uri']);
}
$relatedOne = '';
$relatedTwo = '';
$relatedThree = '';
$relatedFour = '';
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
<div id="product-group">

<div class="mobile-only" id="product-group-mobile">
	<div class="row-fluid">
		<div class="span12">
			<h2 class="translate" en="Products">Products</h2>
		</div>
	</div>

	<div class="row-fluid bordered">
		<div class="span12 title">
			<h1 class="fl-left left"><?php echo $node->title; ?></h1>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span6 left right">
			<?php print render($content['body']); ?>
		</div>

		<div class="span6 right">
			<?php print render($content['field_image']); ?>
		</div>
	</div>
</div>
<div class="desktop-only" id="product-group-desktop">
	<div class="row-fluid">
		<div class="span6 red-background">
			<div class="product-background" style="background-image:url('<?php echo $productBackground; ?>');">
				<div class="red-background-inner">
					<h1><?php echo $node->title; ?></h1>
					<div class="intro">
						<?php print render($content['field_intro']); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="span6">
			<?php print render($content['body']); ?>
		</div>
	</div>
</div>
	<div class="row-fluid bordered desktop-only">
		<div class="span12 left right">

			<?php if($relatedOne != '') { ?>
				<div class="related-item first fl-left">
					<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><h4 class="fl-left"><?php echo $relatedOneText; ?></h4></a>
					<a href="<?php echo $relatedOne; ?>" target="<?php echo $relatedOneTarget; ?>"><span class="go fl-right">GO</span></a>
				</div>
			<?php } ?>
			<?php if($relatedTwo != '') { ?>
				<div class="related-item fl-left">
					<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><h4 class="fl-left"><?php echo $relatedTwoText; ?></h4></a>
					<a href="<?php echo $relatedTwo; ?>" target="<?php echo $relatedTwoTarget; ?>"><span class="go fl-right">GO</span></a>
				</div>
			<?php } ?>
			<?php if($relatedThree != '') { ?>
				<div class="related-item fl-left">
					<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><h4 class="fl-left"><?php echo $relatedThreeText; ?></h4></a>
					<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><span class="go fl-right">GO</span></a>
				</div>
			<?php } ?>
			<?php if($relatedFour != '') { ?>
				<div class="related-item fl-left">
					<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><h4 class="fl-left"><?php echo $relatedFourText; ?></h4></a>
					<a href="<?php echo $relatedFour; ?>" target="<?php echo $relatedFourTarget; ?>"><span class="go fl-right">GO</span></a>
				</div>
			<?php } ?>

		</div>
	</div>

	<div class="row-fluid" style="display:none;">
		<div class="span12 right left">
					<?php
						if (!empty($node->field_applicable_products)) {
						$n = 0;
						foreach($node->field_applicable_products['und'] as $lineItem) {
							$productNid = $node->field_applicable_products['und'][$n]['nid'];
							$productNode = node_load($productNid);
							$options = array('absolute' => TRUE);
							$internalLink = url('node/' . $productNid, $options);
								/* $internalLink = '/' . drupal_get_path_alias('node/' . $productNid); */
							$specSheet = '';
							$dxfFile = '';
							if(!empty($productNode->field_specification_sheet['und'][0]['nid'])) {
								$specNode = node_load($productNode->field_specification_sheet['und'][0]['nid']);
								$specSheet = file_create_url($specNode->field_file['und'][0]['uri']);
								/* $specSheet = '/' . drupal_get_path_alias('node/' . $productNode->field_specification_sheet['und'][0]['nid']); */
							}
							if(!empty($productNode->field_drawing['und'][0]['nid'])) {
								$dxfNode = node_load($productNode->field_drawing['und'][0]['nid']);
								$dxfFile = file_create_url($dxfNode->field_file['und'][0]['uri']);
								/* $dxfFile = '/' . drupal_get_path_alias('node/' . $productNode->field_drawing['und'][0]['nid']); */
							}
							$n++
    					?>
    					<div class="line-item">

    					<?php if($specSheet != '') { ?>
     					<div class="spec-relocate" href="<?php echo $internalLink; ?>">
    						<a href="<?php echo $specSheet; ?>" target="_blank"><img src="/sites/all/themes/portescap/images/pdf_icon.jpg" /></a>
    					</div>
    					<?php } ?>

    					<?php if($dxfFile != '') { ?>

    					<div class="dxf-relocate" href="<?php echo $internalLink; ?>">
    						<a href="<?php echo $dxfFile; ?>" target="_blank"><img src="/sites/all/themes/portescap/images/dxf_icon.jpg" /></a>
    					</div>
    					<?php } ?>
    					</div>
    					<?php } } ?>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span12 right left">
			<?php print render($content); ?>
		</div>
	</div>
</div>

<?php
/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/
?>


