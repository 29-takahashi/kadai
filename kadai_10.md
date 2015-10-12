#課題10：LINE風チャットApp

![line](http://pero.jpn.org/wp/wp-content/uploads/kadai/line.jpg "line")

##主旨
**「MILKCOCOA」**のをAPIを利用して、リアルタイムチャットを作成。

##機能について
0. 「 名前 + 日時 + メッセージ 」
1. 「メッセージ送信履歴はDBに残す」 ※削除ボタンでメッセージ全削除
2. 「メッセージ表示領域を超えた処理」 ※自動スクロール 、表示方法をソート?
3. 「メッセージ送信ボタン」は大きめに装飾あれば良いと思わる機能「文字色」、「アイコン」、「翻訳」とか?

##はまった所
1. 「datastore」からデータ取得する際に、orderで昇順、降順という概念が、直感的でなかった為、ソートされてんのかされてないのか？がわからなかった。
>>**のびすけさんの解説で理解**

2.  LINE風にしたかったので、CSSで吹き出し的な描写を実装してみたが、交互に左右からの吹き出しされる様にやってみたが、見事に片方だけにしか実装出来なかった・・・
本当は、jQueryで追加した要素を偶数・奇数判定したかった。
>>これは投稿者名ごとにCSSを充てることでとりあえず・・・やり過ごしたｗ
>>CSS3の擬似クラス**「nth-child(odd)」**、**「nth-child(even)」**で出来た♪

3. データの一括削除ボタンの実装・・・動きゃしないｗ
>>参考にした「MILKCOCOA」のAPI仕様が古かっただけ(^_^;)

↓これが古いヤツ（β版だったらしい）

```jQuery:index.html
dataStore.query().done(function(data){
    data.forEach(function(value){
        dataStore.remove(value.id);
    });
});
```

↓これが新しいヤツ

```jQuery:index.html
dataStore.stream().next(function(data){
    data.forEach(function(value){
        dataStore.remove(value.id);
    });
});
```

[indexへ戻る](README.md "indexへ戻る")