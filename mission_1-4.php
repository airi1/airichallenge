<html>

<head>

<meta charset="UTF-8">

</head>

<body>

<form action="mission_1-4.php"method="POST">
<input type="text"name="comment"value="コメント"/>
<input type="submit"/>
</form>

<?php
$data=$_POST["comment"];
echo"ご入力ありがとうございます。<br>";
echo date("Y年m月d日 H時i分")."に".$data."を受け付けました。";
?>

</body>

</html>