# ドキュメント参考ＵＲＬ
[こちらから参照してください。]http://133.130.106.164/Tech-Noodle-Api/public/noodle/test

## テストURL
[AWS](http://133.130.106.164/Tech-Noodle-Api/public/noodle/list)

### 店舗検索パラメータ
name => 店舗名  
prefecture => 都道府県  
region => 市区村町  
station => 駅名  
tag => ジャンル  
limit => 件数　(default:60件)  
offset => 0から始める (default:0)  
** ※順番任意 **


### 口コミ投稿パラメータ
user_name => ユーザ名  
review => 口コミ本体  
shop_id => 店舗ID  
rank    => ランキング
例：
```
#店舗一覧取得
http://133.130.106.164/Tech-Noodle-Api/public/noodle/list?prefecture=東京&name=東京

#店舗口コミ取得
http://133.130.106.164/Tech-Noodle-Api/public/review/review?id=[shop_id]
```

### 管理画面

[管理画面](http://133.130.106.164/Tech-Noodle-Api/public/noodle/login)  
[フロントテストリン](http://133.130.106.164/Tech-Noodle-Api/public/noodle/test)  
[json取得api](http://133.130.106.164/Tech-Noodle-Api/public/noodle/list)  
[店舗口コミ取得](http://133.130.106.164/Tech-Noodle-Api/public/review/review)  
[口コミ投稿](http://133.130.106.164/Tech-Noodle-Api/public/review/create)  

###clone
`git clone --recursive https://github.com/Tech-C-2015/Tech-Noodle-Api`
