<?php
	$targetPage = 'http://www.portescap.com';
	if(!empty($node->field_target_page['und'][0]['value'])) {
		$targetPage = $node->field_target_page['und'][0]['value'];
	}
?>
<?php header( 'Location:' . $targetPage ); ?>
<div id="page-redirect">
	<h1><?php print t('One moment while you are redirected to your page.'); ?></h1>
	<p><?php print t('If you are not redirected immediately, click'); ?> <a href="<?php echo $targetPage; ?>"><?php print t('here'); ?></p>
</div>