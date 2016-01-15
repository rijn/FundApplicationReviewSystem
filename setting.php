<?php

require_once "wechat.api.php";
$wechatObj   = new wechatCallbackapi();
$signPackage = $wechatObj->GetSignPackage();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta content="yes" name="apple-touch-fullscreen" />
        <meta content="telephone=no,email=no" name="format-detection" />
        <meta content="fullscreen=yes,preventMove=no" name="ML-Config" />

        <title>南邮官方微信平台</title>

        <link rel="Shortcut Icon" href="favicon.ico">
        <link rel="Bookmark" href="favicon.ico">

        <link href="./css/style.min.css?v=<?=VERSION?>" rel="stylesheet">

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?f069a69d80fe5f077665f049f0c3e563";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>


    </head>
