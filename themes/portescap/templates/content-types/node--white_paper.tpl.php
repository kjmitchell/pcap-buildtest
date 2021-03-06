<?php
	$originalPDF = '';
	if(!empty($node->field_english_pdf['und'][0]['nid'])) {
		$target = $node->field_english_pdf['und'][0]['nid'];
		$docNid = node_load($target);
		$originalPDF = file_create_url($docNid->field_file['und'][0]['uri']);
		/* $options = array('absolute' => TRUE);
		$originalPDF = url('node/' . $target, $options); */
	}

	$theImages = array();
	if(!empty($node->field_rail_images['und'][0]['uri'])) {
		$n = 0;
		foreach($node->field_rail_images['und'] as $railimage) {
			$imageSrc = file_create_url($railimage['uri']);
			$imageAlt = 'Portescap';
			$imageTitle = 'Portescap';
			if(!empty($railimage['alt'])) {
				$imageAlt = $railimage['alt'];
			}
			if(!empty($railimage['title'])) {
				$imageTitle = $railimage['title'];
			}
			$imageCaption = '';
			if(!empty($node->field_image_captions['und'][$n]['safe_value'])) {
				$imageCaption = $node->field_image_captions['und'][$n]['safe_value'];
			}
			$theMarkup = '<div class="image-figure"><img src="'.$imageSrc.'" alt="'.$imageAlt.'" title="'.$imageTitle.'" /><br/>'.$imageCaption.'</div>';
			array_push($theImages, $theMarkup);
			$n++;
		}
	}

$theIcon = '/sites/all/themes/portescap/images/html_icon.jpg';
$theIcon2 = '/sites/all/themes/portescap/images/pdf_icon.jpg';
$options = array('absolute' => TRUE);
$nid = $node->nid;
$filePath = url('node/' . $nid, $options);

if($teaser) { ?>
	<div class="document">
		<div class="document-inner">
			<div class="fl-left document-image">
				<a href="<?php echo $originalPDF; ?>" target="_blank"><img src="<?php echo $theIcon2; ?>" /></a>
				<a href="<?php echo $filePath; ?>" target="_blank"><img src="<?php echo $theIcon; ?>" /></a>
			</div>

			<div class="document-body fl-left">
				<h4 class="red"><a href="<?php echo $filePath; ?>" target="_blank" class="red"><?php echo $node->title; ?></a></h4>
			</div>
		</div>
	</div>

<?php } else { ?>

<style type="text/css">
	.border-right {
		border-right:1px solid #333;
	}
	
	table {
		width:100%!important;
	}
	
	table td, table th {
		width:auto!important;
	}	

	.field-name-field-rail-images .field-list-item {
		margin-top:10px;
	}
	
	#white-paper-content .border-right h3 {
		text-transform:uppercase;
	}

	#white-paper-content {
		padding-top:15px;
	}
	.field-name-field-related-links a {
		font-size:14px;
	}
	
	.rightr h3 {
		padding:3px 0 3px 3px;
		background:#e1e1e1;
	}
</style>

<div id="white-paper" class="left">
	<div class="row-fluid">
		<div class="span12">
			<h1><?php echo $node->title; ?></h1>
			<div class="wpdownload">
				<a href="<?php echo $originalPDF; ?>" target="_blank"><?php print t('Download a PDF of this whitepaper'); ?></a>
			</div>
		</div>
	</div>
	<div id="white-paper-content">
		<div class="row-fluid">
			<div class="span8">
				<div class="border-right">
					<?php print render($content['body']); ?>
					<div class="related-items clearfix">
					<?php
						if(!empty($node->field_related_links['und'][0]['nid'])) { echo '<h3>Related Links</h3>'; }
						print render($content['field_related_links']);
					?>
					</div>
				</div>
			</div>

			<div class="span4 rightr">
				<?php
				$n = 1;
				foreach($theImages as $image) {
					echo '<h3>Figure '.$n.'</h3>';
					echo $image;
					$n++;
				} ?>
			</div>

		</div>
	</div>
</div>

<?php } ?>