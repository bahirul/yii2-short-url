yii2-short-url
==============

Simple Yii2 component to short URL or expand URL using google API Url Shortener.


Component Configuration
-----
- create folder components in your yii2
- move GoogleShortUrl.php into components folder
- add component class to web.php in config folder
```
....
'components' => [
        'google' => [
            'class' => 'app\components\GoogleShortUrl'
        ],
        .......
];
....

```
Simple Usage
------------
```

$short = Yii::$app->google->shortUrl('http://example.com');
$expand = Yii::$app->google->expandUrl($short);

```
Other Information
-----------------
See google API URL Shortner docs https://developers.google.com/url-shortener/
