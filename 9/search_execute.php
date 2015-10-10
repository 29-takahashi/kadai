<?php
	include("func.php");
	$search = $_GET["search"];
	$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
	// id を直接代入せず、:idを入れる
	$sql = "SELECT * FROM news WHERE news_title like '%{$search}%'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':id', $search, PDO::PARAM_INT);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// HTML出力用の変数 $view を宣言
	$view = "";
	// $view に表示する文字列を追記していく
	$view .= '<table class="table table-striped table-bordered">';
	foreach($results as $row) {
		$view .= "<tr>";
		$view .= '<td><a href="news.php?id=' .$row["news_id"]. '">' .$row["news_title"]. '</a></td>';
		$view .= '</tr>';
	}
	// table閉じタグで終了
	$view .= '</table>';
	$pdo = null;

	include("header.php");
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<h2>検索結果</h2>
			<?php echo $view ?>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?php include("sidebar.php") ?>
		</div>
	</div>
</div>

<?php include("footer.php") ?>