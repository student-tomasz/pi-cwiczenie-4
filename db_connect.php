<?php

include('config.php');

$db = mysql_connect($config['db_host'], $config['db_user'], $config['db_pass']);
if (!$db) {
  error_log('Didn\'t connect to the database: ' . mysql_error());
  die(1);
}
mysql_select_db($config['db_name'], $db);

?>
