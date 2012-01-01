<?php
include_once('sanitize.php');
include_once('connect.php');

$id = sanitize($_REQUEST['id']);
$file = mysql_fetch_array(mysql_query("SELECT * FROM {$config['db_table_name']} WHERE id='{$id}' LIMIT 0, 1"));
if ($file) {
  $file_path = $config['path'] . $file['id'];

  // example copied from http://php.net/manual/en/function.readfile.php
  if (file_exists($file_path)) {
    header('Content-Description: File Transfer');
    header('Content-Type: ' . mime_content_type($file_path));
    header('Content-Disposition: attachment; filename=' . basename($file['name']));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));
    ob_clean();
    flush();
    readfile($file_path);
    exit;
  }
}

include_once('disconnect.php');
?>
