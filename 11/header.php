<?php include("func.php"); ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nice daddy</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.tile.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="js/rss.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      // チルドの高さ合わせJQueryライブラリにて利用
      $(function(){
        $('.sample').tile();
      });

      // ジオコード利用
      $(function(){
      if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(
              //位置情報取得成功
              function (pos){
                  var lat = pos.coords.latitude;
                  var lon = pos.coords.longitude;
                  // console.log(lat,lon);
                  <?php
                    $lat_b = '<script type="text/javascript">document.write(lat);</script>';
                    $lat = intval($lat_b); 
                    $lon_b = '<script type="text/javascript">document.write(lon);</script>';
                    $lon = intval($lon_b);
                  ?>
              },
              //取得失敗
              function (error){
                  var message = "";
                  switch (error.code) {
                     // 位置情報取得できない場合
                    case error.POSITION_UNAVAILABLE:
                         message = "位置情報の取得ができませんでした。";
                          break;
                   // Geolocation使用許可されない場合
                    case error.PERMISSION_DENIED:
                         message = "位置情報取得の使用許可がされませんでした。";
                         break;
                    // タイムアウトした場合 
                    case error.PERMISSION_DENIED_TIMEOUT:
                    message = "位置情報取得中にタイムアウトしました。";
                    break;
                  }
                  window.alert(message);
              }
          );
      } else{
          window.alert("本ブラウザではGeolocationが使えません"); //windowはなくても良い。
      }
    });

  </script>
  </head>

  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="index.php">Nice daddy</a></h1>
        </div>
        <div class="navbar-collapse collapse"><!-- nav-collapse -->
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="admin/">管理画面</a></li> -->
            <li>
              <form action="search_execute.php" method="get" class="navbar-form navbar-right">
                <div class="row">
                  <div class="col-xs-9">
                    <div class="form-group">
                      <input type="text" class="form-control" name="search" placeholder="Search news..." />
                    </div>
                  </div>
                  <div "col-xs-3">
                    <button class="btn btn-default">検索</button>
                  </div>
                </div>
              </form>	
            </li>
            <!-- <li><a href="#contact">Contack</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- /.container -->
    </div>