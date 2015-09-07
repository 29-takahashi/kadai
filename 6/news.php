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
        $sql = "SELECT * FROM news";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
?>

<section class="news contents-box">
    <h2 class="section-title text-center">
        <span class="section-title__yellow">News</span>
        <span class="section-title-ja text-center">
            <?php
                if (isset($_GET["id"])){
                    echo date('Y/m/d', strtotime($update_date));
                }
            ?>
        </span>
    </h2>
    <article class="news-detail">
        <dl class="clearfix">
            <?php
                if (isset($_GET["id"])){
                    echo '<dd class="news-title">' . $news_title . "</dd>";
                    echo "<dd>" . $news_detail . "</dd>";
                    echo '<p class="view-detail text-right"><a href="news.php">ニュース一覧を見る</a></p>';
                } else{
                    foreach($results as $row) {
                        $date = $row["update_date"];
                        $l_id = $row["news_id"];
                        echo '<dt class="news-date">';
                        echo date('Y/m/d', strtotime($date)) . '：</dt>';
                        echo '<dd class="news-description"><a href="news.php?id=' . $l_id . '">';
                        echo mb_substr($row["news_title"], 0, 10) . '</a></dd>';
                    }
                }
                $pdo = null;
            ?>
        </dl>
    </article>
</section>

<?php include("footer.php"); ?>