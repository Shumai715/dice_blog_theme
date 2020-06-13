<?php get_header(); ?>
    <!-- ▼ 記事一覧部分開始 ▼ -->
    <main>
      <div class="article-table">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
          <?php the_post(); ?>
      <!-- ▼ 記事1つ分開始 ▼ -->
      <article <?php post_class() ?>>
        <div class="article-thumbnail">
          <a href="<?php the_permalink(); ?>">
            <a href="<?php the_permalink(); ?>">
              <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
              <?php else: ?>
                <img src="<?php echo esc_url(get_theme_file_uri('images/no_image_square.jpg')); ?>" alt="">
              <?php endif; ?>
          </a>
        </div>
        <div class="article-object">
          <ul class="day-category">
            <li class="li-day">
              <time class="day"><?php the_time('Y年n月j日'); ?>
            </li>
            <li>
              <div class="article-category">
                <?php
                  $category = get_the_category();
                    if ( $category[0] ) {
                      echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
                    }
                  ?>
              </div>
            </li>
          </ul>
          <a href="<?php the_permalink(); ?>"><h3 class="article-title"><?php the_title(); ?></h3></a>
          <div class="article-summary"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
          <?php if(has_tag() == true): ?>
          <ul class="tag-ul">
             <li>
               <div class="tagcard">
                 <ul class="tag-card-ul">
                     <?php the_tags('<span class="tag">', '&nbsp;', '</span>');?>
                 </ul>
               </div>
             </li>

          </ul> <!-- tag-ul タグ部分終了 -->
        <?php else: ?>
        <?php endif; ?>
        </div>
      </article>
      <!-- ▲ 記事1つ分終了 ▲ -->
    <?php endwhile; ?>

    <?php the_posts_pagination( array('screen_reader_text'=>' ')); ?>
      <?php else: ?>
        <p>当てはまる情報はまだありません。</p>
      <?php endif; ?>
    </div>
    </main>
    <!-- ▲ 記事部分終了 ▲ -->

    <!-- ▼ サイドバー終了 ▼ -->
    <?php get_sidebar(); ?>
    <!-- ▲ サイドバー終了 ▲ -->

<?php get_footer(); ?>
