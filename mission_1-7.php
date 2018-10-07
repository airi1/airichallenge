<html>

<head>
<meta charset="UTF=8">
</head>

<body>

<form action="mission_1-7.php"method="POST">
<input type="text"name="comment"value="コメント">
<input type="submit"value="送信">
</form>

<?php

$data=$_POST["comment"];

$filename="mission_1-6_tanaka.txt";

if(!empty($_POST["comment"])){$fp=fopen($filename,"a");

fwrite($fp,"$data"."\n");

fclose($fp);

$ret_array=file($filename);

for($i=0; $i< count($ret_array); ++$i){

echo($ret_array[$i]."<br/>\n");}}

else{echo "";}

?>