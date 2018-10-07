<html>

<head>
<meta charset="UTF=8">
</head>

<body>

<form action="mission_1-6.php"method="POST">
<input type="text"name="comment"value="コメント"/>
<input type="submit"/>
</form>

<?php
$data=$_POST["comment"];

$filename="mission_1-6_tanaka.txt";

if(!empty($_POST["comment"])){$fp=fopen($filename,"a");

fwrite($fp,"$data"."\n");

fclose($fp);}
?>

</body>

</html>