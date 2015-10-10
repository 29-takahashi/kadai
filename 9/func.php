<?php
	//DBAccess&プリペア&実行関数
	function db_start($sql){
		global $results;
		$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");	
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	//カテゴリーアイコン表示関数
	function category_icon($category_id){
		global $category_name;
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
	}
	//変数代入関数
	function h_insert($row){
		global $update_date, $news_id, $news_title, $news_detail, $category_id, $category_name, $img, $alt;
		$update_date = $row["update_date"];
	    $news_id = $row["news_id"];
	    $news_title = $row["news_title"];
	    $news_detail = $row["news_detail"];
	    $category_id = $row["category_id"];
	    $category_name = $row["category_name"];
	    $img = $row["img"];
	    $alt = $row["alt"];
	}
	//indexページのカルーセル部分、ニュース記事表示
	function news_index(){
		global $results, $update_date, $news_id, $news_title, $news_detail, $category_id, $category_name, $img, $alt;
		$sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id ORDER BY update_date DESC LIMIT 7";
		db_start($sql);
		foreach($results as $row) {
			//変数代入関数呼び出し
			h_insert($row);
		    if ($row === reset($results)){
			    echo '<div class="item active">';
		    } else {
			    echo '<div class="item">';
		    }
		    echo '<a href="news.php?id=' .$news_id. '">';
		    echo '<img src="img/' .$img. '" alt="' .$alt. '">';
		    echo '<div class="carousel-caption"><h2>' .$news_title. '</h2><p>';
		    echo date('Y/m/d', strtotime($update_date));
		    category_icon($category_id);
		    echo '</p></div></a></div>';
		}
		$pdo = null;
	}
	//newsページ部表示
	function news_view(){
    	global $results, $update_date, $news_id, $news_title, $news_detail, $category_id, $category_name, $img, $alt;
	    if (isset($_GET["id"])){
	    	$news_id = $_GET["id"];

	    	//人気記事カウントアップ
	    	$sql = "INSERT INTO click_count(count_id,news_id, click_date) VALUES (NULL, '" .$news_id. "', sysdate())";
	    	db_start($sql);
	    	//記事詳細表示
		    $sql = "SELECT * FROM news,category,img where news.news_id = $news_id AND show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id";
		    //db関数呼び出し
		    db_start($sql);
		    echo '<div class="col-xs-12 col-sm-9">';
		    foreach($results as $row) {
		    	//変数代入関数呼び出し
		    	h_insert($row);
			    echo '<div class="pero"><h2>' .$news_title. '</h2><p>';
			    echo date('Y/m/d', strtotime($update_date));
			    category_icon($category_id);
			    echo '</p><p class="kiji"><img class="img-responsive" width="250" height="150" src="img/' .$img. '">' .$news_detail. '</p>';
			    echo '<div class="text-right"><a href="news.php"><button class="btn btn-default">ニュース一覧</button></a></div></div>';
			}
			echo '</div>';
	    } 
	    //ニュース記事一覧表示
	    else{
		    $sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id";
		    db_start($sql);
		    echo '<div class="col-xs-12 col-sm-9">';
		    foreach($results as $row) {
		    	//変数代入関数呼び出し
		    	h_insert($row);
		        echo '<a href="news.php?id=' .$news_id. '"><div class="thumbnail"><img width="250" height="150" src="img/' .$img. '">';
		        echo '<div class="caption"><h2>';
		        echo mb_substr($news_title, 0, 50) . '</h2><p>';
		        echo date('Y/m/d', strtotime($update_date));
		        category_icon($category_id);
		        echo '</p></div></div></a>';
		    }
			echo '</div>';
		}
	    $pdo = null;    
	}
?>