<?php

// include_once "config.php";

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

        <title>国自基金申报资格审查系统</title>

        <link rel="Shortcut Icon" href="favicon.ico">
        <link rel="Bookmark" href="favicon.ico">

        <link rel="stylesheet" type="text/css" href="dist/semantic.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
        <script type="text/javascript" src="dist/jquery-2.1.4.min.js"></script>

        <script type="text/javascript" src="dist/semantic.min.js"></script>

  <script>
  $(document)
    .ready(function() {

      // fix main menu to page on passing
      // $('.main.menu').visibility({
      //   type: 'fixed'
      // });

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });
    })
  ;
  </script>

<!-- Statistic code -->

    </head>
<body>

    <header>
        <img src="./images/logo.gif">
        <span>国自基金申报资格审查系统</span>
    </header>


  <div class="ui blue borderless main inverted menu">
      <a href="list.php" class="item">项目清单</a>
      <a href="teacher.php" class="item">添加教师</a>
      <a href="#" class="item">青年候选</a>
      <a href="#" class="item">面上候选</a>
      <a href="#" class="ui right floated dropdown item">
        账户设置 <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">密码设置</div>
          <div class="item">登出</div>
        </div>
      </a>
  </div>