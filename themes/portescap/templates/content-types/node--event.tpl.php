<?php
/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

hide($content['field_related_links']);
hide($content['field_related_links_text']);
hide($content['field_related_documents']);
/*
echo '<pre>';
print_r($node);
echo '</pre>';
*/
$pageWidth = 'span12';
if(!empty($node->field_related_links['und'][0]['nid']) || !empty($node->field_related_documents['und'][0]['nid'])) {
	$pageWidth = 'span9';
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


if(!empty($node->field_related_links['und'][0]['nid'])) {
	$target = $node->field_related_links['und'][0]['nid'];
	$relatedOne = drupal_get_path_alias('node/' . $target);
	$relatedOneText = $node->field_related_links_text['und'][0]['value'];
}
if(!empty($node->field_related_links['und'][1]['nid'])) {
	$target = $node->field_related_links['und'][1]['nid'];
	$relatedTwo = drupal_get_path_alias('node/' . $target);
	$relatedTwoText = $node->field_related_links_text['und'][1]['value'];
}
if(!empty($node->field_related_links['und'][2]['nid'])) {
	$target = $node->field_related_links['und'][2]['nid'];
	$relatedThree = drupal_get_path_alias('node/' . $target);
	$relatedThreeText = $node->field_related_links_text['und'][2]['value'];
}
if(!empty($node->field_related_links['und'][3]['nid'])) {
	$target = $node->field_related_links['und'][3]['nid'];
	$relatedFour = drupal_get_path_alias('node/' . $target);
	$relatedFourText = $node->field_related_links_text['und'][3]['value'];
}
?>

<div id="event-page">
	<div class="row-fluid">
		<div class="<?php echo $pageWidth; ?>">

			<h1><?php echo $node->title; ?></h1>
			<div class="left">
				<?php print render($content); ?>
				<div id="content_lower_move"></div>
			</div>
		</div>

		<?php if($pageWidth == 'span9') { ?>
			<div class="span3">
				<div class="side-wrapper desktop-only">

				<?php if($relatedOne != '') { ?>
					<div class="related-item clearfix">
						<a href="/<?php echo $relatedOne; ?>"><h4 class="fl-left"><?php echo $relatedOneText; ?></h4></a>
						<a href="/<?php echo $relatedOne; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedTwo != '') { ?>
					<div class="related-item clearfix">
						<a href="/<?php echo $relatedTwo; ?>"><h4 class="fl-left"><?php echo $relatedTwoText; ?></h4></a>
						<a href="/<?php echo $relatedTwo; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedThree != '') { ?>
					<div class="related-item clearfix">
						<a href="/<?php echo $relatedThree; ?>"><h4 class="fl-left"><?php echo $relatedThreeText; ?></h4></a>
						<a href="/<?php echo $relatedTwo; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>
				<?php if($relatedFour != '') { ?>
					<div class="related-item clearfix">
						<a href="/<?php echo $relatedFour; ?>"><h4 class="fl-left"><?php echo $relatedFourText; ?></h4></a>
						<a href="/<?php echo $relatedTwo; ?>"><span class="go fl-right"><?php print t('GO'); ?></span></a>
					</div>
				<?php } ?>

				<?php if($relatedDocs != '') { ?>
				<div class="related-item clearfix">
					<?php print t('Quick Downloads'); ?>
					<?php print render($content['field_related_documents']); ?>
				</div>
				<?php } ?>
				</div>

			</div>

		<?php } ?>
	</div>
</div>