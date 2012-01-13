<?php

$config = array(
  'development' => array(
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'root',
    'db_name' => 'pi',
    'db_table_name' => 'cudzilot_cw4',
    'path' => '/Users/Tomasz/Studies/semestr-3/programowanie-internetowe/cwiczenie-4/uploads/'
  ),
  'production' => array(
    'db_host' => 'db',
    'db_user' => 'pi_inf',
    'db_pass' => 'polska1',
    'db_name' => 'pi_inf',
    'db_table_name' => 'cudzilot_cw4',
    'path' => '/home/stud/cudzilot/WWW/pi/cw4/uploads/'
  )
);
$config = $config['development'];

?>
