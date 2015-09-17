<?php
    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM news";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>一覧</title>
</head>

<body>
    <h1>一覧</h1>
    <ul>
        <?php
            foreach($results as $row) {
                $date = $row["update_date"];
                $l_id = $row["news_id"];
                echo '<li>';
                echo date('Y/m/d', strtotime($date)). '：';
                echo '<a href="update.php?id=' . $l_id . '">';
                echo mb_substr($row["news_title"], 0, 40) . '</a></li>';
            }
            $pdo = null;
        ?>
    </ul>
    <hr>
    <p><a href="index.php">管理</a></p>
</body>
</html>