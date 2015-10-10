<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	$sql = "SELECT news_id,COUNT(news_id) FROM click_count GROUP BY news_id ORDER BY COUNT(news_id) DESC LIMIT 3";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$ext = array_column($results, 'news_id');

	// for ($i=0; $i<3; ++$i){
	// 	$rank($i) = "SELECT * FROM news,category,img where show_flg = 1
	//  	AND news.category_id = category.category_id AND news.news_id = img.news_id AND news.news_id = $ext($i)";
	// 	$stmt($i) = $pdo->prepare($rank($i));
	// 	$stmt($i)->execute();
	// 	$rank_r($i) = $stmt($i)->fetchAll(PDO::FETCH_ASSOC);
	// }

	$rank0 = "SELECT * FROM news,category,img where show_flg = 1
	 	AND news.category_id = category.category_id AND news.news_id = img.news_id AND news.news_id = $ext[0]";
		$stmt0 = $pdo->prepare($rank0);
	$stmt0->execute();
	$rank_r0 = $stmt0->fetchAll(PDO::FETCH_ASSOC);

	$rank1 = "SELECT * FROM news,category,img where show_flg = 1
		AND news.category_id = category.category_id AND news.news_id = img.news_id AND news.news_id = $ext[1]";
	$stmt1 = $pdo->prepare($rank1);
	$stmt1->execute();
	$rank_r1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

	$rank2 = "SELECT * FROM news,category,img where show_flg = 1
		AND news.category_id = category.category_id AND news.news_id = img.news_id AND news.news_id = $ext[2]";
	$stmt2 = $pdo->prepare($rank2);
	$stmt2->execute();
	$rank_r2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	$rank_r = [$rank_r0, $rank_r1, $rank_r2];
	$pdo = null;
 ?>

<div class="col-xs-12 col-sm-3 text-center">
	<h2>Popularity</h2>

	<?php 
	    // echo '<pre>';
	    // print_r($rank_r);
	    // echo '</pre>';

		foreach($rank_r as $row_2) {
    		foreach ( $row_2 as $row ) {
				$update_date = $row["update_date"];
			    $news_id = $row["news_id"];
			    $news_title = $row["news_title"];
			    $news_detail = $row["news_detail"];
			    $category_id = $row["category_id"];
			    $category_name = $row["category_name"];
			    $img = $row["img"];
			    $alt = $row["alt"];
			    echo '<a href="news.php?id=' .$news_id. '">';
			    echo '<div class="htumbnail text-center">';
			    echo '<img src="img/' .$img. '" height="100" width="150" class="img-rounded">';
			    echo '<div class="caption">';
			    echo '<p>' .$news_title. '</p></div></div></a>';
		    }
		}
	?>

</div>