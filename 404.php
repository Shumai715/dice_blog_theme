<?php get_header(); ?>
<main class="article-page">
  <article class="error404-page">
    <h1>404 Not found.</h1>
    <div class="article-content">
      <p>大変申し訳ございません。<br>
        お探しのページは削除されたか、URLが間違っている可能性があります。</p>
      <p>URLをご確認いただき、トップページまたは上部ナビゲーションメニューからお探しのページへアクセスしてください。</p>
      <p class="go-to-top"><a href="<?php echo esc_url( home_url('/')); ?>">&raquo;TOPページへ戻る</a></p>
    </div>
  </article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
