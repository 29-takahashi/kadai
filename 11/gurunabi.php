<?php
require("config.php");
/*****************************************************************************************
 　ぐるなびWebサービスのレストラン検索APIで緯度経度検索を実行しパースするプログラム
 　注意：緯度、経度、範囲の値は固定で入れています。
*****************************************************************************************/
 
//エンドポイントのURIとフォーマットパラメータを変数に入れる
$uri   = "http://api.gnavi.co.jp/RestSearchAPI/20150630/" .$key_id. "&format=json&lunch=1&no_smoking=1&kids_menu=1";
//APIアクセスキーを変数に入れる 
$acckey = $key_id;

//返却値のフォーマットを変数に入れる
$format= "json";
//緯度・経度、範囲を変数に入れる
//緯度経度は日本測地系で日比谷シャンテのもの。範囲はrange=1で300m以内を指定している。
$lat   = 35.664035;
$lon   = 139.698212;
$range = 1;
 
//URL組み立て
$url  = sprintf("%s%s%s%s%s%s%s%s%s%s%s", $uri, "?format=", $format, "&keyid=", $acckey, "&latitude=", $lat,"&longitude=",$lon,"&range=",$range);
//API実行
$json = file_get_contents($url);
//取得した結果をオブジェクト化
$obj  = json_decode($json);
 
//結果をパース
//トータルヒット件数、店舗番号、店舗名、最寄の路線、最寄の駅、最寄駅から店までの時間、店舗の小業態を出力
foreach((array)$obj as $key => $val){
   if(strcmp($key, "total_hit_count" ) == 0 ){
       echo "total:".$val."<br>";
   }
 
   if(strcmp($key, "rest") == 0){
      foreach((array)$val as $restArray){
        echo '<div class="col-xs-12 col-sm-4"><div class="thumbnail">';
        // if(checkString($restArray->{'id'}))   echo $restArray->{'id'}."\t<br>";
        if(checkString($restArray->{'image_url'}->{'shop_image1'}))    echo '<img src="' .(string)$restArray->{'image_url'}->{'shop_image1'}. '" class=" class="img-responsive center-block"></a>';
        echo '<div class="caption">';
        if(checkString($restArray->{'name'})) echo '<h3 class="media-heading">' .$restArray->{'name'}. '</h3>';
        echo '<h4>';
        foreach((array)$restArray->{'code'}->{'category_name_s'} as $v){
            if(checkString($v)) echo $v."\t";
        }
        echo '</h4>';
        if(checkString($restArray->{'address'})) echo $restArray->{'address'}."\t<br>";
        if(checkString($restArray->{'access'}->{'line'}))    echo (string)$restArray->{'access'}->{'line'}."\t";
        if(checkString($restArray->{'access'}->{'station'})) echo (string)$restArray->{'access'}->{'station'}."\t";
        if(checkString($restArray->{'access'}->{'walk'}))    echo (string)$restArray->{'access'}->{'walk'}."分\t<br>";
        if(checkString($restArray->{'tel'})) echo $restArray->{'tel'}."\t<br>";
        echo '</div></div></div>';
      }
   }
}
 
//文字列であるかをチェック
function checkString($input)
{
  if(isset($input) && is_string($input)) {
      return true;
  }else{
      return false;
  }
}
?>