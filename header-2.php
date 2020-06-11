<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>
    <script src="https://kit.fontawesome.com/779a82068f.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
  </head>

  <!-- ボディー開始 -->
  <body <?php body_class(); ?>>

    <!-- ▼ ヘッダー開始 ▼ -->
    <header class="top-header">
      <div class="header-h1-img">
        <a href="<?php echo esc_url( home_url('/')); ?>"><p><span class="header-title">ダイス🎲ブログ</span></p><p class="header-content">声優ラジオやゲーム、旅行が趣味のオタクの日記</p></a>
        <img class="top-img" src="<?php echo esc_url(get_theme_file_uri('images/top-img.png')); ?>" alt="<?php bloginfo('name'); ?>">
      </div>
        <nav>
         <ul class="top-nav">
          <li class="top-item"><a href="<?php echo esc_url( home_url('/')); ?>">HOME</a></li>
          <li class="top-item"><a href="<?php echo esc_url( home_url('/category/ラジオ')); ?>">ラジオ</a></li>
          <li class="top-item"><a href="<?php echo esc_url( home_url('/category/ゲーム')); ?>">ゲーム</a></li>
          <li class="top-item"><a href="<?php echo esc_url( home_url('/category/旅行記・お出かけ日記')); ?>">旅行記</a></li>
          <li class="top-item"><a href="<?php echo esc_url( home_url('/category/ライブ・イベント')); ?>">ライブ・イベント</a></li>
         </ul>
      </nav>

  </header>
  <!-- ▲ ヘッダー終了 ▲ -->
