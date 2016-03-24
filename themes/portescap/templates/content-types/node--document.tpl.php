<?php

/* lets hide some fields we dont want to be printed with render(content)
in this way, we can still use that function to render any orphans
without rendering all the fields we need to control or position manually */

unset($content['links']['node']['#links']['node-readmore']);
hide($content['field_file']);


/* some additional variables */
$filePath = '';
if(!empty($node->field_file['und'][0]['uri'])) {
	$filePath = file_create_url($node->field_file['und'][0]['uri']);
}


$theIcon = '';
$docType = '';
if(!empty($node->field_document_type['und'][0]['value'])) {
	$docType = $node->field_document_type['und'][0]['value'];
}
switch ($docType) {
    case "Manual":
        $theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
        break;
    case "Spec Sheet":
        $theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
        break;
    case "Literature":
       	$theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
        break;
    case "Drawing":
    	$theIcon = '/sites/all/themes/portescap/images/dxf_icon.jpg';
    	break;
   	case "White Paper":
   		$theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
   		break;
   	case "Press Release":
   		$theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
   		break;
   	case "Standards":
   		$theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
   		break;
   	case "Other":
   		$theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
   		break;
    case "":
        $theIcon = '/sites/all/themes/portescap/images/pdf_icon.jpg';
        break;
}
$hasHtml = 'none';
if(!empty($node->field_html_version['und'][0]['nid'])) {
	$hasHtml = 'true';
	$theDocHtmlNid = $node->field_html_version['und'][0]['nid'];
	$translatedNode = translation_node_get_translations($theDocHtmlNid);
	$docNid = node_load($theDocHtmlNid);
	$currentlanguage = i18n_langcode();
	if($currentlanguage != 'en' && !empty($translatedNode[$currentlanguage]) && $translatedNode[$currentlanguage]->status == 1) {
		$localizedNode = $translatedNode[$currentlanguage]->nid;
		$options = array('absolute' => TRUE);
		$wpHtmlPage = url('node/' . $localizedNode, $options);
		$theIcon2 = '/sites/all/themes/portescap/images/html_icon.jpg';
	} elseif($currentlanguage == $docNid->language) {
		$theLoadedDoc = node_load($theDocHtmlNid);
		if($theLoadedDoc->status == 1) {
			$localizedNode = $theDocHtmlNid;
			$options = array('absolute' => TRUE);
			$wpHtmlPage = url('node/' . $localizedNode, $options);
			$theIcon2 = '/sites/all/themes/portescap/images/html_icon.jpg';
		} else {
			$localizedNode = $theDocHtmlNid;
			$hasHtml = 'none';
			$wpHtmlPage = $filePath;
		}
	} else {
		$localizedNode = $theDocHtmlNid;
		$hasHtml = 'none';
		$wpHtmlPage = $filePath;
	}

} else {
	$wpHtmlPage = $filePath;
}

if($teaser): ?>
	<div class="document">
		<div class="document-inner">
			<div class="fl-left document-image">



				<?php if($hasHtml != 'none') { ?>
						<a href="<?php echo $wpHtmlPage; ?>" target="_blank"><img src="<?php echo $theIcon2; ?>" /></a>
				<?php } else { ?>
						<a href="<?php echo $filePath; ?>" target="_blank"><img src="<?php echo $theIcon; ?>" /></a>
				<?php } ?>
			</div>

			<div class="document-body fl-left">
				<h4 class="red"><a href="<?php echo $wpHtmlPage; ?>" target="_blank" class="red"><?php echo $node->title; ?></a></h4>
				<?php print render($content); ?>
			</div>
		</div>
	</div>
<?php else:
	 header( 'Location:' . $filePath ) ;
endif; ?>
