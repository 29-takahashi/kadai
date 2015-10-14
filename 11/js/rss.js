// 初期設定
var disp_entry_count = 6; //表示させたい記事の数
 
// RSS URL
var site = new Array();
 
site[0] = { 
 title:'mamapicks',
 url:'http://mamapicks.jp/index.rdf',
 disp_entry:6 // 取得する記事の数
};
 
site[1] = { 
 title:'Gigazin',
 url:'http://feed.rssad.jp/rss/gigazine/rss_2.0',
 disp_entry:0 // 取得する記事の数
};
 
site[2] = {
 title:'ウェブソク',
 url:'http://news.7zz.jp/feed',
 disp_entry:0 // 取得する記事の数
};
 
var channel = new Array();
var entry = new Array();
var entries = new Array();
var Feed = "";
 
google.load("feeds", "1");
function init() {
 
 var site_count = 0;
 
 for (var i=0; i<site.length; i++){
 
 // 読み込むRSSを設定
 var feed = new google.feeds.Feed(site[i]['url']);
 feed.setNumEntries(site[i]['disp_entry'])
 feed.load(function(rss) {
 if (!rss.error) {
 
 // RSSからサイトの情報を配列に格納
 channel['title'] = rss.feed.title;
 channel['link'] = rss.feed.link;
 channel['favicon'] = "http://favicon.hatena.ne.jp/?url=" + channel['link'];
 channel['description'] = rss.feed.description;
 channel['author'] = rss.feed.author;
 
 // RSSから記事の情報を配列に格納
 for (var j=0; j<rss.feed.entries.length; j++){
 
 var feed_entry = rss.feed.entries[j];
 var entry = {
 site_title : channel['title'],
 site_link : channel['link'],
 site_favicon : channel['favicon'],
 title : feed_entry.title,
 link : feed_entry.link,
 content : feed_entry.content,
 contentSnippet : feed_entry.contentSnippet,
 publishedDate : feed_entry.publishedDate
 };
 
 var date = new Date(entry['publishedDate']);
 entry['time'] = date.getTime();
 var yy = date.getYear();
 var mm = date.getMonth() + 1;
 var dd = date.getDate();
 if (yy < 2000) { yy += 1900; }
 if (mm < 10) { mm = "0" + mm; }
 if (dd < 10) { dd = "0" + dd; }
 entry['date'] = yy + "年" + mm + "月" + dd + "日";
 
 entry['img'] = entry['content'].match(/src="(.*?)"/igm);
 
 if (entry['img'] != null) {
 for (var k=0; k<entry['img'].length; k++){
 entry['img'][k] = entry['img'][k].replace(/src=/ig, "");
 entry['img'][k] = entry['img'][k].replace(/"/ig, "");
 }
 }
 entries.push(entry);
 }
 }
 site_count++;
 if (site.length == site_count){ disp(); }
 });
 }
}
 
function disp() {
 
 //日付順に並べ替え
 entries.sort (function (b1, b2) { return b1.time < b2.time ? 1 : -1; } );

 // 記事をhtmlに整形
 for (var l=0; l<disp_entry_count; l++){
	 if (entries.length < l+1){ break; }
	 Feed += '<div class="col-xs-12 col-sm-4"><div class="thumbnail" style="height: 570px;">';
	 if (entries[l]['img'] != null) { Feed += '<a href="' + entries[l]['link'] + '"><img src="' + entries[l]['img'][0] + '" class="img-responsive center-block"></a>'; }
	 Feed += '<div class="caption"><h3><a href="'+ entries[l]['link'] + '">' + entries[l]['title'] + '</a></h3>'
	 + '<p>' + entries[l]['contentSnippet'].substr(0, 100) + '...</p></div></div></div>';
	 }
	 // 表示するタグに追加
	 $('#topics').append( Feed );
}
 
google.setOnLoadCallback(init);