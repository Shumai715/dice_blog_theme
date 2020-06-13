<?php get_header("3"); ?>
    <main class="article-page">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): ?>
          <?php the_post(); ?>
    <article class="<?php post_class(); ?>">
      <header class="article-header">
        <div class="article-meta flex-page">
          <div class="entry-ul">
            <ul>
              <li class="entry-day"><time><?php the_time('Y年n月j日'); ?></time>/ 最終更新日:<time class="renewal-day"><?php the_modified_date('Y年n月j日') ?></time></li>
              <li class="entry-author"><?php the_author(); ?></li>
            </ul>
            </div>
        </div>
        <div class="entry-h1"><h1><?php the_title(); ?></h1></div>
      </header>
      <div class="article-content">
        <?php the_content(); ?>
      </div>

    </article>
    <?php endwhile; ?>
  <?php endif; ?>
    </main>
    <!-- ▼ サイドバー開始 ▼ -->
    <?php get_sidebar(); ?>
    <!-- ▲ サイドバー終了 ▲ -->
    <?php get_footer(); ?>
