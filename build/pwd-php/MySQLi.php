<?php
  //THIS PHP FILE IS MEANT TO CHECK IF YOU HAVE MYSQLI WHICH IS USED FOR THE DATABASE CONNECTION, IF DONT PLEASE FOLLOW THE INSTRUCTIONS:
  /*
  Copy and paste php.ini-production file, changing its name for php.ini (root directory of PHP)
  Change following lines:

  ;extension=mysqli
  ;extension=/path/to/extension/mysqli.so

  to anything like this:

  extension="C:\PATH\php\ext\php_mysqli.dll"
  extension_dir="C:\PATH\php\ext"
  */
  if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
  } else {
    echo 'Phew we have it!';
  }
?>