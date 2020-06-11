<?php
//コンテンツ幅をセット
if ( ! isset($content_width) ) {
  $content_width = 740;
}

function custom_theme_setup(){
  //head内のフィードリンクを出力
  add_theme_support('automatic-feed-links');

  //タイトルタグを動的に出力
  add_theme_support('title-tag');

  //ブロックエディター用のCSSを有効化
  add_theme_support('wp-block-styles');

  //埋め込みコンテンツをレスポンシブ対応に
  add_theme_support('responsive-embeds');

  //アイキャッチ画像を有効化
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(231, 177, false);
}
add_action('after_setup_theme', 'custom_theme_setup');

function diceblog_scripts(){
  wp_enqueue_style(
    'base-style',               //ハンドル名
    get_stylesheet_uri(),    //ファイルのパス
    array(),                 //依存関係
    '1.0',                    //バージョン指定
    'all'
  );
}
add_action('wp_enqueue_scripts', 'diceblog_scripts');
// スクリプト(jQuery)読み込み
function add_script(){
  wp_enqueue_script(
    'my_script',
    get_template_directory_uri(),
     '/js/my_script.js',
     array('jquery'),
     '',
     true
   );
}
add_action( 'wp_enqueue_scripts', 'add_script' );

function categories_pre() {
    $pre_post = get_previous_post();//前記事の情報を取得
    $cats = get_the_category($pre_post->ID);//前記事のカテゴリ名を取得
    echo esc_html($cats[0]->name);
}

//後記事のカテゴリ名を取得する関数
function categories_next() {
    $next_post = get_next_post();//後記事の情報を取得
    $cats = get_the_category($next_post->ID);//後記事のカテゴリ名を取得
    echo esc_html($cats[0]->name);
}


//前記事のサムネを取得
function thumbnail_pre() {
    $prevPost = get_previous_post(false);
    $prevThumbnail = get_the_post_thumbnail($prevPost->ID, array(120,80) );
    echo previous_post_link($prevThumbnail);
}
//後記事のサムネを取得
function thumbnail_next() {
    $nextPost = get_next_post(false);
    $nextThumbnail = get_the_post_thumbnail($nextPost->ID, array(120,80) );
    echo next_post_link($nextThumbnail);
}

//前後記事のURLを取得
function twpp_get_adjacent_post_url( $previous = true ) {
  $post = get_adjacent_post( false, '', $previous );
  $url  = '';
  if( !empty( $post ) ) {
    $url = get_permalink( $post->ID );
  }
  echo $url;
}

function custom_widget_register(){
  register_sidebar( array(
    'name'          => 'サイドバーウィジェットエリア',
    'id'            => 'sidebar-widget',
    'description'   => 'ブログページのサイドバーに表示されます。',
    'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="c-widget__title">',
    'after_title'   => '</h4>'
  ) );
}
add_action('widgets_init', 'custom_widget_register');

// パンくずリスト//
function breadcrumb(){
  $sep = '<li class="sep">></li>';
  $home = '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="' .get_bloginfo('url') .'"><span itemprop="name">HOME</span> ></a></li><meta itemprop="position" content="1" />';

  echo '<ol  itemscope itemtype="http://schema.org/BreadcrumbList">';

  if (is_front_page()) {

  }
  else if ( is_category() || is_tag() ) {
      echo $home;
      the_archive_title('<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><span itemprop="name">', '</span><meta itemprop="position" content="2" /></li>');
  }

  else if(is_archive()){

  }
  else if(is_single()){
    $cat = get_the_category();
    if( isset($cat[0]->cat_ID) ) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while ($cat_id != 0){
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.$cat_link.'"><span itemprop="name">'.$cat->name.' </span>></a><meta itemprop="position" content="2" /></li>' );
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach($cat_list as $value){
      echo $value;
    }

    the_title('<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><span itemprop="name">', '</span><meta itemprop="position" content="3" /></li>');
  }
  else if(is_page()){
    echo $home;
    echo $sep;
    the_title('<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><span itemprop="name">', '</span><meta itemprop="position" content="3" /></li>');
  }
  else if(is_search()){

  }
  else{

  }
  echo '</ol>';

}

function custom_archive_title($title){
    $titleParts=explode(': ',$title);
    if($titleParts[1]){
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title','custom_archive_title');


//---------------------------------------//
// 内部リンクのブログカード化（ショートコード）
// ここから
//---------------------------------------//

// 記事IDを指定して抜粋文を取得する
function ltl_get_the_excerpt($post_id){
  global $post;
  $post_bu = $post;
  $post = get_post($post_id);
  setup_postdata($post_id);
  $output = get_the_excerpt();
  $post = $post_bu;
  return $output;
}

//内部リンクをはてなカード風にするショートコード
function nlink_scode($atts) {
	extract(shortcode_atts(array(
		'url'=>"",
		'title'=>"",
		'excerpt'=>""
	),$atts));

	$id = url_to_postid($url);//URLから投稿IDを取得

	$img_width ="90";//画像サイズの幅指定
	$img_height = "90";//画像サイズの高さ指定
	$no_image = 'noimageに指定したい画像があればここにパス';//アイキャッチ画像がない場合の画像を指定

	//タイトルを取得
	if(empty($title)){
		$title = esc_html(get_the_title($id));
	}
    //抜粋文を取得
	if(empty($excerpt)){
		$excerpt = esc_html(ltl_get_the_excerpt($id));
	}

    //アイキャッチ画像を取得
    if(has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id),array($img_width,$img_height));
        $img_tag = "<img src='" . $img[0] . "' alt='{$title}' width=" . $img[1] . " height=" . $img[2] . " />";
    }else{
    $img_tag ='<img src="'.$no_image.'" alt="" width="'.$img_width.'" height="'.$img_height.'" />';
    }

	$nlink .='
<div class="blog-card">
  <a href="'. $url .'">
      <div class="blog-card-thumbnail">'. $img_tag .'</div>
      <div class="blog-card-content">
          <div class="blog-card-title">'. $title .' </div>
          <div class="blog-card-excerpt">'. $excerpt .'</div>
      </div>
      <div class="clear"></div>
  </a>
</div>';

	return $nlink;
}

add_shortcode("nlink", "nlink_scode");
//---------------------------------------//
// ここまで
// 内部リンクのブログカード化（ショートコード）
//---------------------------------------//
