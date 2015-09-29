<?php

	function news_index(){
		$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
		$sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id ORDER BY update_date DESC LIMIT 7";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($results as $row) {
			$update_date = $row["update_date"];
		    $news_id = $row["news_id"];
		    $news_title = $row["news_title"];
		    $news_detail = $row["news_detail"];
		    $category_id = $row["category_id"];
		    $category_name = $row["category_name"];
		    $img = $row["img"];
		    $alt = $row["alt"];
		    if ($row === reset($results)){
			    echo '<div class="item active">';
		    } else {
			    echo '<div class="item">';
		    }
		    echo '<a href="news.php?id=' .$news_id. '">';
		    echo '<img src="img/' .$img. '" alt="' .$alt. '">';
		    echo '<div class="carousel-caption"><h2>' .$news_title. '</h2><p>';
		    echo date('Y/m/d', strtotime($update_date));

			switch ($category_id) {
			    case 1:
			        echo '<span class="label label-primary">' .$category_name. '</span>';
			        break;
			    case 2:
			        echo '<span class="label label-success">' .$category_name. '</span>';
			        break;
			    case 3:
			        echo '<span class="label label-info">' .$category_name. '</span>';
			        break;
		        case 4:
		        	echo '<span class="label label-warning">' .$category_name. '</span>';
		        	break;
			}
		    echo '</p></div></a></div>';
		}
		$pdo = null;
	}
	
	function news_view(){
	    if (isset($_GET["id"])){
	    	$news_id = $_GET["id"];
		    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
		    $sql = "SELECT * FROM news,category,img where news.news_id = $news_id AND show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute();
		    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    echo '<div class="col-xs-12 col-sm-9">';
		    foreach($results as $row) {
				$update_date = $row["update_date"];
			    $news_id = $row["news_id"];
			    $news_title = $row["news_title"];
			    $news_detail = $row["news_detail"];
			    $category_id = $row["category_id"];
			    $category_name = $row["category_name"];
			    $img = $row["img"];
			    $alt = $row["alt"];
			    echo '<div class="pero"><h2>' .$news_title. '</h2><p>';
			    echo date('Y/m/d', strtotime($update_date));
			    switch ($category_id) {
				    case 1:
				        echo '<span class="label label-primary">' .$category_name. '</span>';
				        break;
				    case 2:
				        echo '<span class="label label-success">' .$category_name. '</span>';
				        break;
				    case 3:
				        echo '<span class="label label-info">' .$category_name. '</span>';
				        break;
			        case 4:
			        	echo '<span class="label label-warning">' .$category_name. '</span>';
			        	break;
				}
			    echo '</p><p class="kiji"><img class="img-responsive" width="250" height="150" src="img/' .$img. '">' .$news_detail. '</p>';
			    echo '<div class="text-right"><a href="news.php"><button class="btn btn-default">ニュース一覧</button></a></div></div>';
			}
			echo '</div>';
	    } else{
		    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
		    $sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute();
		    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    echo '<div class="col-xs-12 col-sm-9">';
		    foreach($results as $row) {
				$update_date = $row["update_date"];
			    $news_id = $row["news_id"];
			    $news_title = $row["news_title"];
			    $news_detail = $row["news_detail"];
			    $category_id = $row["category_id"];
			    $category_name = $row["category_name"];
			    $img = $row["img"];
			    $alt = $row["alt"];
		        echo '<a href="news.php?id=' .$news_id. '"><div class="thumbnail"><img width="250" height="150" src="img/' .$img. '">';
		        echo '<div class="caption"><h2>';
		        echo mb_substr($news_title, 0, 50) . '</h2><p>';
		        echo date('Y/m/d', strtotime($update_date));
		        switch ($category_id) {
				    case 1:
				        echo '<span class="label label-primary">' .$category_name. '</span>';
				        break;
				    case 2:
				        echo '<span class="label label-success">' .$category_name. '</span>';
				        break;
				    case 3:
				        echo '<span class="label label-info">' .$category_name. '</span>';
				        break;
			        case 4:
			        	echo '<span class="label label-warning">' .$category_name. '</span>';
			        	break;
				}
		        echo '</p></div></div></a>';
		    }
			echo '</div>';
		}
	    $pdo = null;    
	}

?>