<?php
/* let's hide some fields we don't want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_challenge']);
hide($content['field_image']);
hide($content['field_benefits']);
hide($content['field_customization_options']);
hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_thumbnail']);


$pageType = '';
if(!empty($node->field_solution_['und'][0]['value'])) {
	$pageType = 'solution';
}
/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/

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
<div id="application-solution">

	<div class="row-fluid mobile-only">
		<div class="span12">
			<?php if($pageType == '') { ?>
			<h2 class="translate" en="Industries">Industries</h2>
			<?php } else { ?>
			<h2 class="translate" en="Solutions">Solutions</h2>
			<?php } ?>
		</div>
	</div>

	<div class="row-fluid bordered">
		<div class="span12 title">
			<h1 class="fl-left left"><?php echo $node->title; ?></h1>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span10">
			<div class="row-fluid">
				<div class="span4 left">
					<div class="desktop-only">
						<?php print render($content['field_image']); ?>
					</div>
					<div class="mobile-only full">
						<?php print render($content['field_thumbnail']); ?>
					</div>
				</div>

				<div class="span7">
					<div id="challenge" class="left">
						<?php print render($content['field_challenge']); ?>
					</div>
					<div id="benefits" class="bordered">
						<div class="left">
							<?php print render($content['field_benefits']); ?>
						</div>
					</div>
					<div class="bordered" id="options">
						<div class="left">
							<?php print render($content['field_customization_options']); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div id="content_lower_move"></div>
				</div>
			</div>
		</div>

		<div class="span2 right">
			<div class="desktop-only">
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
						<a href="<?php echo $relatedThree; ?>" target="<?php echo $relatedThreeTarget; ?>"><span class="go fl-right">GO</span></a>
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
					<h4 class="translate" en="Quick Downloads">Quick Downloads</h4>
					<?php print render($content['field_related_documents']); ?>
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
