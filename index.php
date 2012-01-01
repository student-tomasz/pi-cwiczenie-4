<?php
include('db_connect.php');

$files = mysql_query("SELECT * FROM {$config['db_table_name']}");
while($file = mysql_fetch_array($files)) {
  echo "<tr>";
  echo "<td>{$file['id']}</td>";
  echo "<td>{$file['name']}</td>";
  echo "<td>{$file['type']}</td>";
  printf("<td>%.2d kB</td>", $file['size']/1000);
  echo "<td>&nbsp;</td>";
  echo "</tr>\n";
}

include('db_disconnect.php');
?>
