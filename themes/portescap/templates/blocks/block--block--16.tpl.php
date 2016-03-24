<div id="block-block-16" class="previous-page">
	<div class="row-fluid back mobile-only">
		<div class="span12">
			<?php
				$menuParent = menu_get_active_trail();
				//get rid of the last item in the array as it is the current page
				$menuParentPop = array_pop($menuParent);
				//Just grab the last item in the array now
				$menuParent = end($menuParent);
				//if it is not the home page and it is not an empty array
				if(!empty($menuParent) && $menuParent['link_path'] != ''){
					?> <a href="/<?php echo $menuParent['link_path']; ?>"><span><?php print t('Return to'); ?></span> <?php print $menuParent['title']; ?></a> <?php

				} else{

				}
				?>

		</div>
	</div>
</div>