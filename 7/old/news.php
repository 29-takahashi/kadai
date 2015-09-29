<?php
    include("header.php");
    if (isset($_GET["id"])){
        $news_id = $_GET["id"];
        // include("func.php");
        
        // $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
        // $sql = "SELECT * FROM news,category,img where news_id = $news_id AND news.category_id = category.category_id AND news.news_id = img.news_id";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute();
        // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // foreach($results as $row) {
        //     $update_date = $row["update_date"];
        //     $news_title = $row["news_title"];
        //     $news_detail = $row["news_detail"];
        // }
    }
    // else {
    //     $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    //     $sql = "SELECT * FROM news,category,img where show_flg = 1 AND news.category_id = category.category_id AND news.news_id = img.news_id";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute();
    //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    include("func.php");
?>

<div class="container">
        <?php
            if (isset($_GET["id"])){
                $pdo2 = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                $sql2 = "SELECT * FROM news,category,img where news.news_id = $news_id AND news.category_id = category.category_id AND news.news_id = img.news_id";
                $stmt2 = $pdo2->prepare($sql2);
                $stmt2->execute();
                $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                echo '<pre>';
                var_dump($results2);
                echo '</pre>';
                $test = $results2[0]["img"];
                echo '表示されるかな？' .$test;

                foreach($results2 as $row2) {
                    $img = $row2["img"];
                    $news_title = $row2["news_title"];
                    $update_date = $row2["update_date"];
                    $news_detail = $row2["news_detail"];
                    echo '<div class="test"><h2>' .$news_title. '<small> [';
                    echo date('Y/m/d', strtotime($update_date)). ']</small></h2>';
                    echo '<p class="kiji"><img width="250 height="150" src="img/' .$img. '">' .$news_detail. '</p>';
                    echo '<p class="text-right"><a href="news.php"> ニュース一覧</a></p></div>';
                }
            } else{
                echo '<h2>News All</h2><ul>';
                foreach($results as $row) {
                    $l_id = $row["news_id"];
                    $news_title = $row["news_title"];
                    $update_date = $row["update_date"];
                    $category_name = $row["category_name"];
                    $img = $row["img"];
                    echo '<li class="pero">';
                    echo '<a href="news.php?id=' .$l_id. '"><img width="70" height="50" src="img/' .$img. '">';
                    echo mb_substr($news_title, 0, 50) . '</a><br><small>→';
                    echo date('Y/m/d', strtotime($update_date)). '：[' .$category_name. ']</small></li>';
                }
                echo '</ul>';
            }
            $pdo = null;
        ?>
</div>

<?php include("footer.php"); ?>