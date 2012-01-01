<?php
include('db_connect.php');

if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
  // TODO: sanitize
  $file = array(
    'name' => $_SERVER['HTTP_X_FILE_NAME'],
    'size' => $_SERVER['HTTP_X_FILE_SIZE'],
    'type' => $_SERVER['HTTP_X_FILE_TYPE'],
    'path' => ''
  );

  $sql = "INSERT INTO $config[db_table_name] (name, size, type) VALUES ('$file[name]', '$file[size]', '$file[type]')";
  if (!mysql_query($sql, $connection)) {
    error_log('Didn\'t write to the database: ' . mysql_error());
    die(1);
  }

  $file['path'] = $config['path'] . mysql_insert_id();
  if (!file_put_contents($file['path'], file_get_contents('php://input'))) {
    error_log('Didn\'t write to the server.');
    die(1);
  }
}

include('db_disconnect.php');
?>
