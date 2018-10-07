<html>

<head>
<meta charset="UTF=8">
</head>

<body>

<form action="mission_2-1.php"method="POST">

名前:<input type="text"name="name"/><br>

コメント:<input type="text"name="comment"/><br>

<input type="submit"/>

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

fclose($fp);}

?>

</body>

</html>
