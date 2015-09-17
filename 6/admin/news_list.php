<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");    
    }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1>一覧</h1>
                <ul class="list-group">
                    <?php
                        foreach($results as $row) {
                            $date = $row["update_date"];
                            $l_id = $row["news_id"];
                            echo '<li class="list-group-item">';
                            echo date('Y/m/d', strtotime($date)). '：';
                            echo '<a href="update.php?id=' . $l_id . '">';
                            echo mb_substr($row["news_title"], 0, 40) . '</a></li>';
                        }
                        $pdo = null;
                    ?>
                </ul>
                <hr>
                <p><a href="index.php"><button class="btn btn-primary btn-xs">管理</button></a>
                <a href="session_clear.php"><button class="btn btn-danger btn-xs">ログオフ</button></a></p>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>