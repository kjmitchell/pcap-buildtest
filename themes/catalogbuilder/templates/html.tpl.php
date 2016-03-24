<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" class="catalogbuilder">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <!-- HTML5 element support for IE6-8 -->

    <!--[if IE]>
    <![endif]-->

    <!--[if lt IE 10]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <?php print $page_top; ?>
    <?php print $page; ?>

    <?php print $page_bottom; ?>
    <?php print $scripts; ?>
  </body>
</html>
