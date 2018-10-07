<html>

<head>
<meta charset="UTF-8">
</head>

<body>

<form action="mission_1-5.php"method="POST">
<input type="text"name="comment"value="コメント"/>
<input type="submit"/>
</form>

<?php
$data=$_POST["comment"];

$filename="mission_1-5_tanaka.txt";

if($data=="完成！"){echo"おめでとう！";

$fp=fopen($filename,"w");

fwrite($fp,"$data");

fclose($fp);}

if(!(empty($_POST["comment"]))&&!($data=="完成！")){echo"ご入力ありがとうございます。<br>";

echo date("Y年m月d日 H時i分")."に".$data."を受け付けました。";

$fp=fopen($filename,"w");

fwrite($fp,"$data");

fclose($fp);}

if(empty($_POST["comment"])){echo"";}
?>

</body>

</html>
