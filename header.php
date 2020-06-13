<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="主に、声優ラジオやイベントの感想、ゲームのレビュー、旅行記や雑談などいろいろなことを書くブログサイト。">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>
    <script src="https://kit.fontawesome.com/779a82068f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri() ); ?>">
    <?php wp_head(); ?>
  </head>

  <!-- ボディー開始 -->
  <body <?php body_class(); ?>>

    <!-- ▼ ヘッダー開始 ▼ -->
    <header class="top-header">
      <div class="the-top">
        <a href="https://dice-blog.com/"><h1>ダイス🎲ブログ</h1></a>
      </div>

      <div class="header-img">
        <img class="top-img" src="<?php echo esc_url(get_theme_file_uri('images/top-img.png')); ?>" alt="<?php bloginfo('name'); ?>">
      </div>
        <nav>
         <ul class="top-nav">
           <li class="top-item"><a href="https://dice-blog.com/">HOME</a></li>
           <li class="top-item"><a href="https://dice-blog.com/entry/category/%e3%83%a9%e3%82%b8%e3%82%aa">ラジオ</a></li>
           <li class="top-item"><a href="https://dice-blog.com/entry/category/%e3%82%b2%e3%83%bc%e3%83%a0">ゲーム</a></li>
           <li class="top-item"><a href="https://dice-blog.com/entry/category/%e6%97%85%e8%a1%8c%e8%a8%98%e3%83%bb%e3%81%8a%e5%87%ba%e3%81%8b%e3%81%91%e6%97%a5%e8%a8%98">旅行記</a></li>
           <li class="top-item"><a href="https://dice-blog.com/entry/category/%e3%83%a9%e3%82%a4%e3%83%96%e3%83%bb%e3%82%a4%e3%83%99%e3%83%b3%e3%83%88">ライブ・イベント</a></li>
         </ul>
      </nav>

  </header>
  <!-- ▲ ヘッダー終了 ▲ -->
