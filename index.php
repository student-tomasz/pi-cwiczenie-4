<?php
include_once('connect.php');

$files = mysql_query("SELECT * FROM {$config['db_table_name']}");
while($file = mysql_fetch_array($files)) {
  $id = $file['id'];
  $file_path = $config['path'] . $id;
  echo "<tr>";
  printf("<td class='id'>%s</td>",        $id);
  printf("<td class='name'>%s</td>",      $file['name']);
  printf("<td class='type'>%s</td>",      mime_content_type($file_path));
  printf("<td class='size'>%.2d kB</td>", filesize($file_path)/1000);
  echo "  <td>";
  echo "    <ul class='actions'>";
  echo "      <li class='action download'><a href='download.php?id={$id}'>pobierz</a></li>";
  echo "      <li class='action convert'><a href='convert.php?id={$id}' onclick='converter.convert({$id}); return false;'>konwertuj</a></li>";
  echo "      <li class='action destroy'><a href='destroy.php?id={$id}' onclick='destroyer.destroy({$id}); return false;'>usuń</a></li>";
  echo "    </ul>";
  echo "  </td>";
  echo "</tr>\n";
}

include('disconnect.php');
?>
