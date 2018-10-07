﻿<html>
	<head>
	<meta charset="UTF=8">
	</head>
<?php
	$name=$_POST["name"];  //送信された名前を変数nameに代入する。
	$comment=$_POST["comment"];  //送信されたコメントを変数commentに代入する。
	$delete=$_POST["delete"];  //送信された削除対象番号を変数deleteに代入する。
	$filename="mission_2-1_tanaka.txt";  //テキストファイルを変数filenameに代入する。
	$date=date("Y年m月d日 H:i:s");  //日付を変数dateに代入する。
	$count=count(file($filename))+1;  //テキストファイルに入っている番号+1をカウントしていく。
	$edit=$_POST["edit"];  //送信された編集対象番号を変数editに代入する。

	if(isset($edit)){  //editの値を受け取った場合に実行する。
		$contents=file($filename);
		foreach((array)$contents as $content){
			$i=explode("<>",$content);
			if(strcmp($edit,$i[0])==0){  //編集番号と投稿番号が一致した場合に実行する。
				$editname=$i[1];  //イコールの時の配列の値（名前）を変数editnameに代入する。
				$editcomment=$i[2];  //イコールの時の配列の値（コメント）を変数editcommentに代入する。
				$editnumber=$i[0];  //イコールの時の配列の値（番号）を変数editnumberに代入する。
			}
		}
	}
?>
<body>
	<form action="mission_2-4.php" method="POST">
	<input type="text" name="name" placeholder="名前" value="<?php echo $editname; ?>"><br>
	<input type="text" name="comment" placeholder="コメント" value="<?php echo $editcomment; ?>">
	<input type="hidden" name="editmode" value="<?php echo $editnumber; ?>">
	<input type="submit" value="送信"><br><br>
	</form>
	<form action="mission_2-4.php" method="POST">
	<input type="text" name="delete" placeholder="削除対象番号">
	<input type="submit" value="削除"><br><br>
	</form>

	<form action="mission_2-4.php" method="POST">
	<input type="text" name="edit" placeholder="編集対象番号">
	<input type="submit" value="編集"><br><br>
	</form>
<?php
	$editmode=$_POST["editmode"];
	if(isset($name)){ //nameの値を受け取った場合に実行する。
		if($editmode==null){  //編集番号が空の場合に実行する。
			$fp=fopen($filename,"a");  //テキストファイルを追記モードで開く。
			fwrite($fp,"$count"."<>"."$name"."<>"."$comment"."<>"."$date"."\n");  //テキストファイルに番号、名前、コメント、日付を書き込む。
			fclose($fp);  //テキストファイルを閉じる。
		}else{  //編集番号が空でない場合に実行する。
			$contents=file($filename);
			$fp=fopen($filename,"r+");  //テキストファイルを追記モードで開く。
			ftruncate($fp,0);  //テキストファイルを空にする。
			fclose($fp);  //テキストファイルを閉じる。
			foreach((array)$contents as $content){
				$i=explode("<>",$content);  //$i[0]=$count $i[1]=$name $i[2]=$comment $i[3]=$date
				if(strcmp($editmode,$i[0])==0){  //編集番号と投稿番号が一致した場合に実行する。
					$fp=fopen($filename,"a");  //テキストファイルを追記モードで開く。
					fwrite($fp,"$i[0]"."<>"."$name"."<>"."$comment"."<>"."$date"."\n");
					fclose($fp);
				}else{
					$fp=fopen($filename,"a");  //テキストファイルを追記モードで開く。
					fwrite($fp,"$i[0]"."<>"."$i[1]"."<>"."$i[2]"."<>"."$i[3]");
					fclose($fp);
				}
			}
		}
	}
	if(isset($delete)){ //deleteの値を受け取った場合に実行する。
		$contents=file($filename);
		$fp=fopen($filename,"r+");  //テキストファイルを追記モードで開く。
		ftruncate($fp,0);  //テキストファイルを空にする。
		fclose($fp);  //テキストファイルを閉じる。
		foreach((array)$contents as $content){
			$i=explode("<>",$content);  //$i[0]=$count $i[1]=$name $i[2]=$comment $i[3]=$date
			if(strcmp($delete,$i[0])==0){;  //削除番号と投稿番号が一致した場合に実行する。
			}else{
				$fp=fopen($filename,"a");  //テキストファイルを追記モードで開く。
				fwrite($fp,"$i[0]"."<>"."$i[1]"."<>"."$i[2]"."<>"."$i[3]");
				fclose($fp);
			}
		}
	}
	$contents=file($filename);  //ファイル関数でテキストファイルを読み込み、変数contentsに代入する。
	foreach($contents as $content){
		$i=explode("<>",$content);  //explode関数で0番目に番号、1番目に名前、2番目にコメント、3番目に日付のように配列にする。
		echo $i[0]." ".$i[1]." ".$i[2]." ".$i[3]."<br>";
	}
?>
</body>
</html>