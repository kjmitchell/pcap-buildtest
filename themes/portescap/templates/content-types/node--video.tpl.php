<?php
/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_video_embed_code']);
hide($content['field_header_image']);
hide($content['field_header_copy']);
hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_related_documents']);
hide($content['field_intro']);
/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/
$pageWidth = 'span12';
if(!empty($node->field_related_links['und'][0]['nid']) || !empty($node->field_related_documents['und'][0]['nid'])) {
	$pageWidth = 'span10';
}
$headerSize = 'large';
if(!empty($node->field_header_size['und'][0]['value'])) {
	$headerSize = $node->field_header_size['und'][0]['value'];
}


$relatedOne = '';
$relatedTwo = '';
$relatedThree = '';
$relatedFour = '';
$relatedDocs = '';
if(!empty($node->field_related_documents['und'][0]['nid'])) {
	$relatedDocs = 'true';
}

$pageType = '';
if(!empty($node->field_site_section['und'][0]['value'])) {
	$pageType = $node->field_site_section['und'][0]['value'];
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

<div id="video-page">
	<div class="row-fluid">
		<div class="<?php echo $pageWidth; ?>">
			<div class="desktop-only">
			<?php
				if(!empty($node->field_header_image['und'][0]['filename'])) { ?>
					<?php $theImage = file_create_url($node->field_header_image['und'][0]['uri']); ?>
						<div class="header-image <?php echo $pageType; ?> <?php echo $headerSize; ?>" style="background-image:url('<?php echo $theImage; ?>');">
							<div class="header-image-inner">
								<h1 class="left red"><?php echo $node->title; ?></h1>
								<div class="left red">
									<?php print render($content['field_header_copy']); ?>
								</div>
							</div>
						</div>
					<?php } else {	?>
						<h1 class="left"><?php echo $node->title; ?></h1>
						<div class="left">
							<?php print render($content['field_header_copy']); ?>
						</div>
					<?php } ?>
			</div>
			<h2 class="mobile-only"><?php echo $node->title; ?></h2>
			<div class="left right">
				<div class="row-fluid">
					<div class="span12">
						<?php print render($content['field_intro']); ?>
					</div>
				</div>

				<div class="row-fluid video-area">
					<div class="span3">
						<div class="video-filter" style="color:#ED1c24;">
							<div class="video-filter-inner">

								<span class="video-button filter-item active" value="all" en="All videos"><?php print t('All videos'); ?></span>
								<span class="video-button filter-item" value="Motor technology" en="Motor Technology"><?php print t('Motor Technology'); ?></span>
								<span class="video-button filter-item" value="Applications" en="Applications"><?php print t('Applications'); ?></span>
								<span class="video-button filter-item" value="Portescap capabilities and facilities" en="Capabilities and Facilities"><?php print t('Capabilities and Facilities'); ?></span>
								<span class="video-button filter-item" value="Education" en="Educational Videos"><?php print t('Educational Videos'); ?></span>
							</div>
						</div>
					</div>

					<div class="span9">
						<div class="video-wrapper">
							<?php print render($content['field_video_embed_code']); ?>
							<div id="content_lower_move"></div>
						</div>
					</div>
				</div>
				<!-- END layout rework -->
				<?php print render($content); ?>

			</div>
		</div>

		<?php if($pageWidth == 'span10') { ?>
			<div class="span2">
				<div class="side-wrapper desktop-only">

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

				<?php if($relatedDocs != '') { ?>
				<div class="related-item quick-downloads clearfix">
					<h4><?php print t('Quick Downloads'); ?></h4>
					<?php print render($content['field_related_documents']); ?>
				</div>
				<?php } ?>
				</div>

			</div>

		<?php } ?>
	</div>
</div>
