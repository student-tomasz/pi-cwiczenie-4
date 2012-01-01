<?php
include('db_connect.php');

$id = $_REQUEST['id'];

if (!mysql_query("DELETE FROM {$config['db_table_name']} WHERE id='{$id}'", $connection)) {
  error_log('Didn\'t delete from the database: ' . mysql_error());
}
if (!unlink($config['path'] . "{$id}")) {
  error_log('Didn\'t delete from the server.');
}

include('db_disconnect.php');
?>

