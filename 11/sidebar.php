<div class="col-xs-12 col-sm-3 text-center">
	<h2>Popularity</h2>
	<?php
		sidebar(); //sidebarランキング関数呼び出し
		foreach($results as $row) {
		    h_insert($row); //変数代入関数呼び出し
		    echo '<a href="news.php?id=' .$news_id. '">';
		    echo '<div class="htumbnail text-center">';
		    echo '<img src="img/' .$img. '" height="100" width="150" class="img-rounded img-responsive center-block">';
		    echo '<div class="caption">';
		    category_icon($category_id); //カテゴリーアイコン表示関数呼び出し
		    echo '<p><small>' .$news_title. '</small></p></div></div></a>';
		}
	?>
</div>