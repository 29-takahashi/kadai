<?php
	include("check.php");
	include("header.php");
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
	<p><input type="submit" value="登録" class="btn btn-success btn-xs" /></p>
</form>

<?php include("footer.php"); ?>