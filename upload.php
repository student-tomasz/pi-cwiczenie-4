<?php
include_once('sanitize.php');
include_once('connect.php');

if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
  $file = array(
    'name' => sanitize($_SERVER['HTTP_X_FILE_NAME']),
    'type' => sanitize($_SERVER['HTTP_X_FILE_TYPE']),
    'path' => ''
  );

  $sql = "INSERT INTO {$config['db_table_name']} (name, type) VALUES ('{$file['name']}', '{$file['type']}')";
  if (!mysql_query($sql, $connection)) {
    // error_log('Didn\'t write to the database: ' . mysql_error());
    die(1);
  }

  $file['path'] = $config['path'] . mysql_insert_id();
  if (!file_put_contents($file['path'], file_get_contents('php://input'))) {
    // error_log('Didn\'t write to the server.');
    die(1);
  }
}

include_once('disconnect.php');
?>
