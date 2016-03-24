<?php
function portescap_breadcrumb($variables) {
  $sep = ' &gt; ';
  if (count($variables['breadcrumb']) > 0) {
    return implode($sep, $variables['breadcrumb']) . $sep;
  }
  else {
    return t("Home");
  }
}