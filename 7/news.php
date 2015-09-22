<?php
    include("header.php");
    if (isset($_GET["id"])){
        $news_id = $_GET["id"];
        $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
        $sql = "SELECT * FROM news where news_id = $news_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $row) {
            $update_date = $row["update_date"];
            $news_title = $row["news_title"];
            $news_detail = $row["news_detail"];
        }
    } else {
        $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
        $sql = "SELECT * FROM news where show_flg = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
?>

<div class="container">
        <?php
            if (isset($_GET["id"])){
                echo '<h2>' .$news_title. '<small> [';
                echo date('Y/m/d', strtotime($update_date)). ']</small></h2>';
                echo "<p>" .$news_detail. "</p>";
                echo '<p class="text-right"><a href="news.php"> ニュース一覧</a></p>';
            } else{
                echo '<h2>News All</h2>';
                foreach($results as $row) {
                    $l_id = $row["news_id"];
                    $news_title = $row["news_title"];
                    $update_date = $row["update_date"];
                    echo '<p>';
                    echo date('Y/m/d', strtotime($update_date)). '：';
                    echo '<a href="news.php?id=' .$l_id. '">';
                    echo mb_substr($news_title, 0, 40) . '</a></p>';
                }
            }
            $pdo = null;
        ?>
</div>

<?php include("footer.php"); ?>