<?php

/*
 * Regions:
 * - $page['header_upper']: "Super header" above the main header
 * - $page['mobile_menu']: Specified area for the Mobile version of the main menu
 * - $page['header']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['footer_upper']: Items for footer upper.
 * - $page['footer']: Items for the footer region.
 */

 hide($content['field_mobile_highlights']);

?>


<div id="page">
	<div id="page-inner">

		<div id="header_upper" class="desktop-only">
			<div class="container">
				<div class="inner">
					<?php print render($page['header_upper']); ?>
				</div>
			</div>
		</div>

		<div id="header">
			<div class="container">
				<div class="inner">
					<?php if ($logo): ?>
						<a class="left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
							<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
						</a>
					<?php endif; ?>
					<div class="right fl-right mobile-only">
						<div id="mobile-menu-button">
							<span class="button mobile_menu"><?php print t('Menu'); ?></span>
						</div>
						<div id="contact-menu-button">
							<span class="button contact"><?php print t('Contact Us'); ?></span>
						</div>
					</div>
					<div class="main-menu-wrapper desktop-only">
						<?php print render($page['header']); ?>
					</div>
				</div>
			</div>
		</div>

		<div id="mobile_menu">
			<div class="container">
				<div class="inner">
					<?php print render($page['mobile_menu']); ?>
				</div>
				<div class="mobile-left">
					<?php print render($page['mobile_menu_left']); ?>
				</div>
				<div class="mobile-right">
					<?php print render($page['mobile_menu_right']); ?>
				</div>
			</div>
		</div>

		<div id="references" class="desktop-only">
			<div class="container">
				<div class="row-fluid">

				</div>
			</div>
		</div>



		<div id="homepage-slideshow">
			<div class="container">
				<div class="inner">
					<?php print views_embed_view('front_page_slide_show', $display_id = 'block'); ?>
				</div>
			</div>
		</div>

		<div id="homepage-title">
			<div class="container">
				<div class="inner">
					<h2 class="red"><?php echo $node->title; ?></h2>
				</div>
			</div>
		</div>

		<div id="content">
			<div class="container">
				<div class="inner">
					<?php print render($page['content']); ?>
				</div>
			</div>
		</div>

		<div id="homepage-highlights" class="desktop-only">
			<div class="container">
				<div class="inner">
					<?php print views_embed_view('homepage_highlights', $display_id = 'default'); ?>
				</div>
			</div>
		</div>

		<div id="footer_upper">
			<div class="container">
				<div class="inner">
					<?php print render($page['footer_upper']); ?>
				</div>
			</div>
		</div>

		<div id="footer">
			<div class="container">
				<div class="inner">
					<div class="fl-left left">
						<?php print render($page['footer_left']); ?>
					</div>
					<div class="fl-right right">
						<?php print render($page['footer_right']); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
</div>
