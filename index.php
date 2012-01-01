<?php
include('db_connect.php');

$files = mysql_query("SELECT * FROM {$config['db_table_name']}");
while($file = mysql_fetch_array($files)) {
  $id = $file['id'];
  echo "<tr>";
  printf("<td class='id'>%s</td>",        $file['id']);
  printf("<td class='name'>%s</td>",      $file['name']);
  printf("<td class='type'>%s</td>",      $file['type']);
  printf("<td class='size'>%.2d kB</td>", $file['size']/1000);
  echo "  <td>";
  echo "    <ul class='actions'>";
  echo "      <li class='action download'><a href='download.php?id={$id}' onclick='downloader.download({$id}); return false;'>pobierz</a></li>";
  echo "      <li class='action convert'><a href='convert.php?id={$id}' onclick='converter.convert({$id}); return false;'>konwertuj</a></li>";
  echo "      <li class='action destroy'><a href='destroy.php?id={$id}' onclick='destroyer.destroy({$id}); return false;'>usuń</a></li>";
  echo "    </ul>";
  echo "  </td>";
  echo "</tr>\n";
}

include('db_disconnect.php');
?>
