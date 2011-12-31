<?
include('config.php');

$file_name = $_SERVER['HTTP_X_FILE_NAME'];
if ($file_name) {
  file_put_contents($config['path'] . $file_name, file_get_contents('php://input'));
  error_log("Saved: $file_name");
}

?>
