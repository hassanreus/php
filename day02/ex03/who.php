#!/usr/bin/php
<?php
if ($argc == 1){
      $tmp = fopen("/var/run/utmpx", "r");
      date_default_timezone_set("Europe/paris");
      while (!feof($tmp))
      {
          $data = fread($tmp, 628);
          if (strlen($data) == 628)
          {
			  $data = unpack("a256username/a4id/a32line/i/itypeoflogin/itime", $data);
              if ($data['typeoflogin'] == 7)
              {
                  echo trim($data['username']) . " ";
                  echo trim($data['line']) . "  ";
                  $time = date("M j H:i", $data['time']);
                  echo $time . " \n";
			  }
          }
      }
    fclose($tmp);
  }
?>
