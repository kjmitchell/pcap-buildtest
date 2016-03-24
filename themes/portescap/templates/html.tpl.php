<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <meta http-equiv="cleartype" content="on" />
  <meta name="MobileOptimized" content="width" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="HandheldFriendly" content="true" />
  <?php print $styles; ?>
  <link type="text/css" id="responsive-stylesheet" rel="stylesheet" href="/sites/all/themes/portescap/css/mobile.css" />
  <script type="text/javascript">var badIE = false; var IE8 = false;</script>
  <!--[if IE 7]>
  	<link rel="stylesheet" type="text/css" href="/sites/all/themes/portescap/css/ie7.css" />
	<script type="text/javascript">var badIE = true;</script>


<![endif]-->
  <!--[if IE 8]>
  	<link rel="stylesheet" type="text/css" href="/sites/all/themes/portescap/css/ie8.css" />
  	<script type="text/javascript">var IE8 = true;</script>

<![endif]-->

  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>><!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQR7LP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQR7LP');</script>
<!-- End Google Tag Manager -->
<?php if($language->language == 'zh-hans' || $language->language == 'cn') { ?>
<p style="display:none;">
<script>
var_hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?f952cc8ccea224c8110173df8a8256b7";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm,s);
})();
</script>
</p>
<?php } ?>



  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
<?php global $user;
if(drupal_is_front_page() && $language->language == 'en') {
		include 'portal.php';	
}
?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

<script type="text/javascript">stLight.options({publisher: "dr-dca5d7e2-51a7-d2ee-9017-9a51f792d43", doNotHash:true,
doNotCopy:true,hashAddressBar:false});</script>

<!-- Start of Async HubSpot Analytics Code
    <script type="text/javascript">
        (function(d,s,i,r) {
            if (d.getElementById(i)){return;}
            var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
            n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/315275.js';
            e.parentNode.insertBefore(n, e);
        })(document,"script","hs-analytics",300000);
    </script>
End of Async HubSpot Analytics Code -->
<!-- baidu tracking
<p style="display:none;">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3e22bf2e13a1a710741f552381a80e7f' type='text/javascript'%3E%3C/script%3E"));
</script>
</p>
End baidu tracking -->



</body>



</html>
