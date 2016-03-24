<?php
/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_encoders_image']);
hide($content['field_encoders_summary']);
hide($content['field_encoders_related_link']);

hide($content['field_drives_image']);
hide($content['field_drives_summary']);
hide($content['field_drives_related_link']);

hide($content['field_gearhead_image']);
hide($content['field_gearheads_summary']);
hide($content['field_gearheads_related_link']);

hide($content['field_encoders_image']);
hide($content['field_encoders_summary']);
hide($content['field_encoders_related_link']);

hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_related_documents']);
hide($content['field_applicable_products']);

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

<div id="related-products-page">
	<div class="related-products-page-inner">
		<div class="row-fluid">
			<div class="span12">
				<h1 class="left"><?php echo $node->title; ?></h1>
			</div>
		</div>

		<div class="row-fluid">
			<div class="span10">
				<div class="row-fluid">
					<div class="span4">
						<?php
						print render($content['field_gearhead_image']); ?>
						<h2 class="red"><?php print t('Gearheads'); ?></h2>
						<?php print render($content['field_gearheads_summary']);
						print render($content['field_gearheads_related_link']);
						?>
					</div>

					<div class="span4">
						<?php
						print render($content['field_encoders_image']); ?>
						<h2 class="red"><?php print t('Encoders'); ?></h2>
						<?php print render($content['field_encoders_summary']);
						print render($content['field_encoders_related_link']);
						?>
					</div>

					<div class="span4">
						<?php
						print render($content['field_drives_image']); ?>
						<h2 class="red"><?php print t('Drives'); ?></h2>
						<?php print render($content['field_drives_summary']);
						print render($content['field_drives_related_link']);
						?>
					</div>
				</div>
			</div>

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
								$otherFile = '';
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
								if(!empty($productNode->field_3d_drawing['und'][0]['nid'])) {
								$otherNode = node_load($productNode->field_3d_drawing['und'][0]['nid']);
								$otherFile = file_create_url($otherNode->field_file['und'][0]['uri']);
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
    						<?php if($otherFile != '') { ?>
	    					<div class="3d-relocate" href="<?php echo $internalLink; ?>">
	    						<a href="<?php echo $otherFile; ?>" target="_blank"><img src="/sites/all/themes/portescap/images/stp_icon.jpg" /></a>
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

</div>

<?php 
	if(!empty($node->field_bulk_downloads['und'][0]['fid'])) {  ?>
		<div class="spec-zips" style="display:none;">
			<?php foreach($node->field_bulk_downloads['und'] as $zip) {
				$file = file_create_url($zip['uri']);
				$label = t('Download All Specification Sheets');
				$button = t('GO');
				echo '<span class="download-zip fl-right">'.$label.' <a href="'.$file.'" target="_blank"><span class="go">'.$button.'</span></a></span>';
				
			?>
			<?php } ?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('.view-product-model-lists').each(function() {
					theTarget = jQuery(this).find('h2');
					var theHTML = jQuery('.spec-zips .download-zip:nth-child(1)');
					theTarget.append(theHTML);
				});
			});
		</script>
	<?php }
?>