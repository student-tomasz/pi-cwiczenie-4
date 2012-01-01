<?php
include_once('connect.php');

$files = mysql_query("SELECT * FROM {$config['db_table_name']}");
while($file = mysql_fetch_array($files)) {
  $id = $file['id'];
  $file_path = $config['path'] . $id;
  echo "<tr>";
  printf("<td class='id'>%s</td>",        $id);
  printf("<td id='file-{$id}-name' class='name'>%s</td>",      $file['name']);
  printf("<td class='type'>%s</td>",      mime_content_type($file_path));
  printf("<td class='size'>%.2d kB</td>", filesize($file_path)/1000);
  echo "  <td class='actions'>";
  echo "    <ul class='actions'>";
  if (strpos(mime_content_type($file_path), 'text') === 0) {
    echo "    <li class='action convert'><a href='convert.html?id={$id}' onclick='converter.showDialog({$id}); return false;'>konwertuj</a></li>";
  }
  echo "      <li class='action download'><a href='download.php?id={$id}'>pobierz</a></li>";
  echo "      <li class='action destroy'><a href='destroy.php?id={$id}' onclick='destroyer.destroy({$id}); return false;'>usuń</a></li>";
  echo "    </ul>";
  echo "  </td>";
  echo "</tr>\n";
}

include('disconnect.php');
?>
