<div id="video-thumbnail-list">
	<div class="row-fluid">
		<div class="desktop-only span1">
			<div class="vid-control vid-prev fl-left desktop-only">
		</div>
	</div>

	<div class="video-thumb-layer-outer fl-left span10">
		<div class="video-thumb-layer-inner">
			<?php
				foreach($view->result as $video_item) {
					$type = $video_item->_field_data['nid']['entity']->field_video_type['und'][0]['value'];
					$title = $video_item->node_title;
					if(!empty($video_item->_field_data['nid']['entity']->field_front_facing_title['und'][0]['value'])) {
						$title = $video_item->_field_data['nid']['entity']->field_front_facing_title['und'][0]['value'];
					}
					$default = '';
					if(!empty($video_item->_field_data['nid']['entity']->field_default['und'][0]['value'])) {
						$default = $video_item->_field_data['nid']['entity']->field_default['und'][0]['value'];
					}
					$img = file_create_url($video_item->_field_data['nid']['entity']->field_play_thumbnail['und'][0]['uri']);
					$theCode = '';
					if(!empty($video_item->_field_data['nid']['entity']->field_video_embed_code['und'][0]['value'])) {
						$theCode = $video_item->_field_data['nid']['entity']->field_video_embed_code['und'][0]['value'];
					}

					$nid = $video_item->_field_data['nid']['entity']->nid;
					$path = '/' . drupal_get_path_alias('node/' . $nid);
					?>

					<div class="span3 video-thumb desktop-only on <?php echo $default; ?>" type="<?php echo $type; ?>">
							<img src="<?php echo $img; ?>" alt="<?php echo $title; ?>" class="desktop-only" />
							<h4><?php echo $title; ?></h4>
							<div class="video-code" style="display:none;">
								<?php echo $theCode; ?>
							</div>
					</div>
				<?php } ?>
		</div>
	</div>

	<div class="desktop-only span1">
		<div class="vid-control vid-next fl-right desktop-only">
		</div>
	</div>
</div>


<div id="staging-area" style="display:none;">
</div>