<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:locale" content="ja_JP">

    <!-- SEO Meta Tags -->
    <meta name="keywords" content="現地集合" />
    <meta name="description" content="学べる出会いは現地集合" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:title" content="学べる出会いは現地集合" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="現地集合" />
    <meta property="og:description" content="学べる出会いは現地集合" />
    
    <title>
      <?php
      if(is_front_page() || is_home()) {
        echo get_bloginfo('name');
      } else{
          wp_title('|',true,'right');
          echo bloginfo('name'); 
      }
      ?>      
    </title>
	<link rel="shortcut icon" href="<?php echo T_DIRE_URI; ?>/favicon.ico">
    <link rel="icon" type="image/png" href="<?php echo T_DIRE_URI; ?>/favicon.ico">
    <link rel="apple-touch-icon" type="image/png" href="<?php echo T_DIRE_URI; ?>/favicon.ico">
    <?php wp_head(); ?>
</head>

<?php 
  global $post;
  
  if( $post->post_type != "page" ) {
    $post_slug = $post->post_type;
  } else {
    $post_slug = $post->post_name;
  }
  if( is_single() ) {
    $category_arr = get_the_category( $post->ID );
    $post_slug = $category_arr[0]->slug;
  }
?>

<?php
$path_parts = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$path_parts = pathinfo($path_parts);
?>
<?php if(is_single()): ?>
<body <?php body_class();?> id="body<?php echo get_post_type(); ?>">
<?php else: ?>
<body <?php body_class();?> id="body<?php echo $path_parts['filename']; ?>">
<?php endif; ?>

    <header class="header">
        <div class="header-wrapper">
            <h1 class="header-logo">
                <a href="<?php echo HOME; ?>">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/img/logo.svg" alt="">
                </a>
            </h1>
            <div class="right-wrapper">
                <nav class="header-nav">
                    <ul class="nav-menu">
                        <li>
                            <a href="<?php echo HOME . 'news'; ?>" class="menu-link active">
                                <span>お知らせ</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo HOME . 'activities'; ?>" class="menu-link">
                                <span>みんなの活動</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo HOME . 'learning'; ?>" class="menu-link">
                                <span>価値向上を学ぶ</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo HOME . 'raise-money'; ?>" class="menu-link">
                                <span>資金を調達</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="btn-wrapper">
                    <a class="btn btn-register" href="<?php echo HOME . 'register'; ?>"><span>会員登録</span></a>
                    <a class="btn btn-login" href="./login"><span>ログイン</span></a>
                </div>
            </div>
        </div>
    </header>
    <div id="mobile-nav">
        <nav class="mobile-nav-container">
            <ul class="mobile-nav-menu">
                <li>
                    <a href="<?php echo HOME . 'news'; ?>" class="menu-link active">
                        <span>お知らせ</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo HOME . 'activities'; ?>" class="menu-link">
                        <span>みんなの活動</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo HOME . 'learning'; ?>" class="menu-link">
                        <span>価値向上を学ぶ</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo HOME . 'raise-money'; ?>" class="menu-link">
                        <span>資金を調達</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>