<?php include("header.php"); ?>

<!-- 任意のID指定。クラスとデータ属性の指定。 -->
<div id="carousel-example" class="carousel slide" data-ride="carousel">
	<!-- インジケーターの設置。下部の○●ボタン。 -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example" data-slide-to="1"></li>
		<li data-target="#carousel-example" data-slide-to="2"></li>
		<li data-target="#carousel-example" data-slide-to="3"></li>
		<li data-target="#carousel-example" data-slide-to="4"></li>
		<li data-target="#carousel-example" data-slide-to="5"></li>
		<li data-target="#carousel-example" data-slide-to="6"></li>
	</ol>

	<!-- スライドの内容 -->
	<div class="carousel-inner">
		<?php
			$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
			$sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id ORDER BY update_date DESC LIMIT 7";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $row) {
			    $date = $row["update_date"];
			    $l_id = $row["news_id"];
			    $title = $row["news_title"];
			    $detail = $row["news_detail"];
			    $category_name = $row["category_name"];
			    $img = $row["img"];
			    if ($row === reset($results)){
				    echo '<div class="item active">';
			    } else {
				    echo '<div class="item">';
			    }
			    echo '<a href="news.php?id=' .$l_id. '">';
			    // echo '<img src="img/c_img.jpg" class="img-responsive" alt="画像">';
			    echo '<img src="img/' .$img. '" class="img-responsive" alt="画像">';
			    echo '<div class="carousel-caption"><h2>' .$title. '</h2><p>';
			    echo mb_substr($detail, 0, 20). '</p><p>';
			    echo date('Y/m/d', strtotime($date)). '[' .$category_name. ']</p></div></a>';
			    echo '</div>';
			}
			$pdo = null;
    	?>
    </div>
	<!-- 左右の移動ボタン -->
	<a class="left carousel-control" href="#carousel-example" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	</a>
</div>

<!-- 	<div id="green">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
    			<p>カテゴリ</p>
			</div>
		</div>
	</div>
</div> -->

<?php include("footer.php"); ?>