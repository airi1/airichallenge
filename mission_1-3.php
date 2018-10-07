<?php
$filename='mission_1-2_tanaka.txt';
$fp=fopen($filename,'r');
$txt=fgets($fp);
echo$txt.'<br>';
fclose($fp);
?>