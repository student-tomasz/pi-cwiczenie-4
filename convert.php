<?php
include_once('sanitize.php');
include_once('config.php');

if (!isset($_REQUEST['id']) || !isset($_REQUEST['from']) || !isset($_REQUEST['to'])) {
  header('HTTP/1.0 400 Bad Request');
  exit();
}

$id = sanitize($_REQUEST['id']);
$from = sanitize($_REQUEST['from']);
$to = sanitize($_REQUEST['to']);

$file_path = $config['path'] . "{$id}";
if (file_exists($file_path)) {
  $converted = iconv($from, $to, file_get_contents($file_path));
  file_put_contents($file_path, $converted);
  // error_log("Converted: { id: {$id}, from: {$from}, to: {$to} }");
}
else {
  header('HTTP/1.0 404 Not Found');
  exit();
}

?>
