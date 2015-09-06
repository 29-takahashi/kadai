<?php include("header.php"); ?>

<?php
    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM news";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="news contents-box">
    <h2 class="section-title text-center">
        <span class="section-title__yellow">News</span>
        <span class="section-title-ja text-center">
            <?php
                echo $row["create_date"];
            ?>
        </span>
    </h2>
    <article class="news-detail">
        <dl class="clearfix">
            <?php
                foreach($results as $row) {
                    echo '<dd class="news-title">' . $row["news_title"] . "</dd>";
                    echo "<dd>" . $row["news_detail"] . "</dd>";
                }
                $pdo = null;
            ?>

        </dl>
    </article>
</section>

<?php include("footer.php"); ?>