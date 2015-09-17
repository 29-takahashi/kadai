<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");    
    }
?>

<h1>管理画面</h1>
<ul>
    <li><a href="news_list.php">一覧</li></a>
    <li><a href="search.php">検索</li></a>
    <li><a href="input.php">入力</a></li>
</ul>
<a href="session_clear.php">ログオフ</a>