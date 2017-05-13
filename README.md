# 使い方

## 共通ファイル読み込み
libの中のcommon.phpを読み込みます。
```php
require_once(__DIR__ . '/lib/common.php');
```

## インスタンス化とXML読み込み
$xmlには xmlのURLを指定してください。
```php
$simple_feed = new SimpleFeed();

$simple_feed_data = $simple_feed->load($xml);
```

## キャッシュ時間を変更
SimpleFeedの引数に秒数を指定してください。
```php
$time = 60 * 60;
$simple_feed = new SimpleFeed($time);
```

## パーミッションに注意
lib/cache ディレクトリにファイルがキャッシュされます。パーミッション設定を調整してください。