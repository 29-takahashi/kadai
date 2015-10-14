#課題11：ぐるなびAPIを利用

![ぐるなびAPI](http://pero.jpn.org/wp/wp-content/uploads/kadai/gurunabi.jpg "ぐるなびAPI")

##主旨
**「ぐるなびAPI」**のAPIを利用して、何かしら創るw

##やってみたこと
0. PHP授業で作成した「ニュースCMS」をベースに、「ぐるなびAPI」などを利用・実装。
1. そもそものテーマを「子育て」・「パパ」・「夫婦仲」にしていく。（※過程）
2. 人気記事にカテゴリラベル追加、DB抽出＆ソートを関数化、外部ファイル化。
3. 「ぐるなびAPI」よりデータ抽出、整形出力。
	1. リクエストに、ランチ、禁煙、キッズメニュー、抽出件数=20。
	2. Bootstrapにて「サムネール」出力。
	3. JQueryライブラリ「tile.js」にてボックス要素の高さを調整。
	4. 店舗写真があるものだけにフィルタリング。（if文）
	5. Bootstrap「グリフアイコン」の利用！かわいい♪
	6. サムネールのDIV全体に各ぐるなびページへのリンク設置。
	7. ジオロケーションで取得した緯度経度を、ぐるなびAPIへ渡してリクエスト。
4. 「Google AJAX Feed API」を利用して外部RSS読込。
	1. 複数サイトのRSS読込が出来る仕様を導入。（コピペ）
	2. ぐるなびAPI同様にBootstrapにて「サムネール」出力。

##はまった所
* 「JavaScript」で取得したジオロケーションのデータをPHPへうまく渡すことが出来ずにはまった(^_^;)

>> どうやらまた、グローバル変数と、ローカル変数でつまずく(^_^;)今度はJavaScriptｗ
方法的にはかなり強引だけども・・・動きましたので・・・ね！

**【JavaScript変数 → PHP変数】**

```PHP:index.html
$lat = '<script type="text/javascript">document.write(lat);</script>';
```

* せっかく導入したサムネイルのブロック要素の高さを合わせてくれる「JQueryライブラリ」を活用しようと「Google AJAX Feed API」で読込んだ部分にも適応させようとするが・・・何故か出来ない！

>> 普通にCSSで高さを指定ｗ

* 以前に習った「ジオロケーション」を再度利用しようと試みるも・・・まったく覚えていない！ｗ

>>記憶力の低さは今に始まった事ではないが、あまりにもショボイ！結局調べ調べ進める(T_T)

* どうやら文字列型変数を数値型として処理をさせようとしていたらしく、怒られるｗ

>> intval()を利用して数値型へ変換(^O^)


[indexへ戻る](README.md "indexへ戻る")