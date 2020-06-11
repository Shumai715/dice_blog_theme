<?php get_header("2"); ?>
    <main class="article-page">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): ?>
          <?php the_post(); ?>
          <div class="breadcrumb">
            <?php breadcrumb() ?>
          </div>
    <article <?php post_class(); ?>
      <header class="article-header">
        <div class="article-meta">
          <div class="entry-ul">
            <ul>
              <li class="entry-day"><time><?php the_time('Y年n月j日'); ?></time>/ 最終更新日:<time class="renewal-day"><?php the_modified_date('Y年n月j日') ?></time></li>
              <li class="entry-author"><?php the_author(); ?></li>
            </ul>
            </div>
          <div class="article-category"><?php the_category(); ?></div>
        </div>
        <div class="entry-h1"><h1><?php the_title(); ?></h1></div>
      </header>
      <div class="article-content">
        <?php the_content(); ?>
      </div>
      <div class="article-footer">
        <div class="article-footer-cate">
          <span class="article-footer-p"><p>カテゴリー</P></span>
          <?php the_category(); ?>
        </div>
        <div class="article-footer-tag">
          <div class="article-footer-p"><p>タグ</p></div>
          <?php if(has_tag() == true): ?>
          <ul class="tag-ul">
             <li>
               <div class="tagcard">
                 <ul class="tag-card-ul article-footer-tagcard">
                     <?php the_tags('<span class="tag">', '&nbsp;', '</span>');?>
                 </ul>
               </div>
             </li>

          </ul> <!-- tag-ul タグ部分終了 -->
        <?php else: ?>
        <?php endif; ?>
        </div>
    </article>

  <nav class="post-nav_img-to-navigation">
    <?php if(get_previous_post()): ?>
    <div class="post-nav post-nav-prev">
      <div class="post-nav-thumbnail-cat">
        <a href="<?php twpp_get_adjacent_post_url(true); ?>">
          <?php $pre_post = get_previous_post();?>
          <?php if(has_post_thumbnail($pre_post)): ?>
          <?php thumbnail_pre()?>
        <?php else: ?>
          <img src="<?php echo esc_url(get_theme_file_uri('images/no_image_square.jpg')); ?>" alt="">
        <?php endif; ?>
          <p class="post-nav-category">
          <?php categories_pre();?>
          </p>
        </a>
      </div>
      <div class="post-nav-text">
        <p>前の記事</p>
        <div class="post-nav-title"><?php previous_post_link(); ?></div>
      </div>
    </div>
  <?php else: ?>
  <?php endif; ?>
  <?php if(get_next_post()): ?>
    <div class="post-nav post-nav-next">
      <div class="post-nav-text">
        <p>次の記事</p>
        <div class="post-nav-title"><?php next_post_link(); ?></div>
      </div>
      <div class="post-nav-thumbnail-cat">
        <a href="<?php twpp_get_adjacent_post_url(false); ?>">
          <?php $next_post = get_next_post();?>
          <?php if(has_post_thumbnail($next_post)): ?>
          <?php thumbnail_next()?>
        <?php else: ?>
          <img src="<?php echo esc_url(get_theme_file_uri('images/no_image_square.jpg')); ?>" alt="">
        <?php endif; ?>
        <p class="post-nav-category">
          <?php categories_next();?>
        </p>
      </a>
      </div>
    </div>
  <?php endif; ?>

  </nav>
    <?php endwhile; ?>
  <?php endif; ?>
    </main>
    <!-- ▼ サイドバー開始 ▼ -->
    <?php get_sidebar(); ?>
    <!-- ▲ サイドバー終了 ▲ -->
    <?php get_footer(); ?>
