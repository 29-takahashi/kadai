<?php
	include("check.php");
	include("header.php");

	//画像アップロード処理
	$msg = null;
	if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
		$old_name = $_FILES['image']['tmp_name'];
		$new_name = date("YmdHis");
		$new_name .= mt_rand();
		switch (exif_imagetype($_FILES['image']['tmp_name'])) {
			case IMAGETYPE_JPEG:
				$new_name .= '.jpg';
				break;
			case IMAGETYPE_GIF:
				$new_name .= '.gif';
				break;
			case IMAGETYPE_PNG:
				$new_name .= '.png';
				break;
			default:
				header('Location: input.php');
				exit();
		}

		if(move_uploaded_file($old_name, 'upload/' .$new_name)){
			$msg = 'アップロードしました。';
		} else{
			$msg = 'アップロードできませんでした。';
		}
	}

	//画像フォルダ内を一覧表示
	$images = array();
	if($handle = opendir('./upload')){
		while ($entry = readdir($handle)){
			if($entry != "." && $entry != ".."){
				$images[] = $entry;
			}
		}
		closedir($handle);
	}
?>

<form action="input_execute.php" method="post">
	<div class="form-group">
		<label for="news_title">タイトル:</label>
		<input type="text" name="news_title" class="form-control" />
	</div>
	<div class="form-group">
		<label for="news_detail">内容:</label>
		<input type="text" name="news_detail" size="80" class="form-control" />
	</div>
	<div class="form-group">
		<label for="category_id">カテゴリー:</label>
		<input type="checkbox" name="category_id" value="1" /> 政治
		<input type="checkbox" name="category_id" value="2" /> 経済
		<input type="checkbox" name="category_id" value="3" /> スポーツ
		<input type="checkbox" name="category_id" value="4" /> 恋愛
	</div>
	<div class="form-group">
		<label for="show_flg">フラグ:</label>
		<input type="radio" name="show_flg" value="1" /> 表示
		<input type="radio" name="show_flg" value="0" /> 非表示
	</div>
	<div class="form-group">
		<label for="author">著者:</label>
		<input type="text" name="author" class="form-control" />
	</div>

	<?php
		if(count($images) > 0){
			foreach ($images as $img) {
				echo '<img width="150" height="150" src="./upload/' .$img. '">';
			}
		} else{
			echo '<p>画像はまだありません。</p>';
		} 
	?>

	<p><input type="submit" value="登録" class="btn btn-success btn-xs" /></p>
</form>

<?php
	if($msg){
		echo '<p>' .$msg. '</p>';
	} 
?>

<form action="input.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="img">画像：</label>
		<input type="file" name="image">
		<input type="submit" value="アップロード" class="btn btn-warning btn-xs">	
	</div>
</form>

<?php include("footer.php"); ?>