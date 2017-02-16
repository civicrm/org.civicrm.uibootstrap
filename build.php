#!/usr/bin/php
<?php

// Download the original source and patch it to work with
// CiviCRM 4.6/4.7 + org.civicrm.shoreditch.

if (PHP_SAPI !== 'cli') {
  die("build.php can only be run from command line.");
}

if (!file_exists('js') || !is_dir('js')) {
  mkdir('js');
}

$files = array(
  'js/ui-bootstrap-tpls.js' => 'https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.js',
  'js/ui-bootstrap-tpls.min.js' => 'https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.14.3.min.js',
);

foreach ($files as $file => $url) {
  echo "Build \"$file\" from \"$url\"\n";
  $data = file_get_contents($url);

  // org.civicrm.shoreditch does not support Bootstrap CSS in the body.
  $data = str_replace("'body'", "CRM['ui.bootstrap'].sel", $data);
  $data = str_replace('"body"', "CRM['ui.bootstrap'].sel", $data);

  file_put_contents($file, $data);
}
