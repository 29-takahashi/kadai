<?php
	$config = "config.php";
	// ライブラリを読み込む
	require_once("Hybrid/Auth.php");
	try {
		// 初期化
		$hybridauth = new Hybrid_Auth($config);
		
		// 認証処理
		$twitter = $hybridauth->authenticate( "Twitter" );
		
		// 認証した $twitterインスタンスからユーザー情報を取得
 		$user_profile = $twitter->getUserProfile();
 		var_dump($user_profile);
 		echo "<hr>";
 		echo "Hi there! " . $user_profile->displayName;
 	} catch ( Exception $e ) {
 		echo "Ooophs, we got an error: " . $e->getMessage();
 	}
?>