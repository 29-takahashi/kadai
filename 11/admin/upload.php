<?php
 //**********************************************************
 // *  index.php
 // *  FileUpLoad
 //**********************************************************
//最初に受け取るパラーメータや使用する変数を記述しておきましょう。
session_start();

include("include/func.php");
$img = '';

//FileUpload処理
if (!isset($_FILES['upfile']['error']) || !is_int($_FILES['upfile']['error']) ||     !isset($_POST["file_upload_flg"]) || $_POST["file_upload_flg"]!="1") {
  //echo 'パラメータが不正です';
  if( isset($_GET["img"]) ) {
    $img = '<img src="upload/'.urldecode($_GET["img"]).'" >';
  }

}else{
  $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ

  //File名の変更※
  $file_name = $_FILES["upfile"]["name"]; //"1.jpg"ファイル名取得
  $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
  $uniq_name = date("YmdHis").session_id() . "." . $extension;  //ユニークファイル名作成
 //$uniq_name = fileUniqRename($_FILES["upfile"]["name"]);    //func.phpに関数を用意！

  // FileUpload [--Start--]
  if ( is_uploaded_file( $tmp_path ) ) {
    if ( move_uploaded_file( $tmp_path, "upload/".$uniq_name ) ) {
         chmod( "upload/".$uniq_name, 0644 );
         // $fview =  $uniq_name."をアップロードしました。";
         header( "Location: index.php?img=".urlencode($uniq_name) );
         exit;
    } else {
        $fview = "";
        echo "Error:アップロードできませんでした。";
    }

  }
  // FileUpload [--End--]
}
?>