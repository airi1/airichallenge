<?php
$filename='mission_1-2_tanaka.txt';
$fp=fopen($filename,'w');
fwrite($fp,'Hello World');
fclose($fp);
?>