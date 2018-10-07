<html>

<head>
<meta charset="UTF=8">
</head>

<body>

<form action="mission_2-2.php"method="POST">

<input type="text"name="name"value="名前"/><br>

<input type="text"name="comment"value="コメント"/>

<input type="submit"/><br>

</form>

<?php

$name=$_POST["name"];

$comment=$_POST["comment"];

if($name==""){echo"";}

else{$filename="mission_2-1_tanaka.txt";

$fp=fopen($filename,"a");

$count=count(file($filename))+1;

$date=date("Y年m月d日 H:i:s");

fwrite($fp,"$count"."<>"."$name"."<>"."$comment"."<>"."$date"."\n");

fclose($fp);

$contents=file($filename);

foreach($contents as $content){$i=explode("<>",$content);

echo $i[0]." ".$i[1]." ".$i[2]." ".$i[3]."<br>";}}

?>

</body>

</html>