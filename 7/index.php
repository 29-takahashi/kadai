<?php include("header.php"); ?>

<!-- 任意のID指定。クラスとデータ属性の指定。 -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-9">
			<div id="carousel-example" class="carousel slide" data-ride="carousel">
				<!-- インジケーターの設置。下部の○●ボタン。 -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example" data-slide-to="1"></li>
					<li data-target="#carousel-example" data-slide-to="2"></li>
					<li data-target="#carousel-example" data-slide-to="3"></li>
					<li data-target="#carousel-example" data-slide-to="4"></li>
					<li data-target="#carousel-example" data-slide-to="5"></li>
					<li data-target="#carousel-example" data-slide-to="6"></li>
				</ol>

				<!-- スライドの内容 -->
				<div class="carousel-inner">
					<?php
						include("func.php");
						news_index();
			    	?>
			    </div>
				<!-- 左右の移動ボタン -->
				<a class="left carousel-control" href="#carousel-example" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</div>
		<?php include("sidebar.php") ?>
	</div>
</div>

<div id="green">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
    			<p>test</p>
			</div>
		</div>
	</div>
</div>

<div id="hello">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
    			<p>test</p>
			</div>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>