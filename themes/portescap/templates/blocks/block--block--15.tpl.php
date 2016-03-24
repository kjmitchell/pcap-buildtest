<div id="block-block-15">
	<div class="clearfix">
		<div class="fl-left tab active" en="Specifications + Detail" tab="1"><?php print t('Specification + Detail'); ?>
		</div>

		<div class="fl-left tab" en="Resources" tab="2"><?php print t('Resources'); ?>
		</div>

		<div class="fl-right">
			<span class="button small" id="metric"><?php print t('Metric'); ?></span><span class="button small" id="us"><?php print t('English&nbsp;'); ?></span>
		</div>

	</div>
</div>

<?php /* temporary javascript; move to sym-custom.js or module. */ ?>

<script type="text/javascript">
function tabControl(el) {
	var theTarget = Number(el.attr('tab'));
	jQuery('.region-product-page-specs .block-views').each(function() {
		jQuery(this).hide();
		if(jQuery(this).attr('tab') == theTarget) {
			jQuery(this).show();
		}
	});
}
jQuery(document).ready(function() {
	jQuery('.region-product-page-specs .tab').click(function() {
		if(!(jQuery(this).hasClass('active'))) {
			jQuery('.tab').each(function() {
				jQuery(this).removeClass('active');
			});
			jQuery(this).addClass('active');
		}
		tabControl(jQuery(this));
		//alert('test');
	});
	var tabNum = 0;
	jQuery('.region-product-page-specs .block-views').each(function() {
		tabNum++;
		jQuery(this).attr('tab',tabNum);
		if(jQuery(this).attr('tab') != '1') {
			jQuery(this).hide();
		}
	});
});


</script>