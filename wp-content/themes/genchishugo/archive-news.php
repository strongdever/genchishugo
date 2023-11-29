<?php get_header(); ?>
<?php

$path_parts = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$path_parts = pathinfo($path_parts);

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$cat_slug = get_query_var('news-category') ? get_query_var('news-category') : "";

?>

    <main id="news-page">
        <div class="breadcrump font-20-700">
            <a class="home link" href="<?php echo HOME; ?>">
                <img src="<?php echo T_DIRE_URI; ?>/assets/img/home-icon.svg">
            </a>
            <img class="right-symbol" src="<?php echo T_DIRE_URI; ?>/assets/img/right-symbol.svg">
            <p class="current-page">お知らせ</p>
        </div>

        <?php $args = [
            'post_type' =>  'news',
            'post_status'   =>  'publish',
            'paged' => $paged,
            'posts_per_page' =>  7,
            'orderby'   =>  'post_date',
            'order' =>  'DESC',
        ];

        $tax_query = [];

        if( $cat_slug ) {
            $tax_query[] = [
                'taxonomy' => 'news-category',
                'field' => 'slug',
                'terms' => $cat_slug
            ];
        }
    
        if ( !empty($tax_query) ) {
            $args['tax_query'] = $tax_query;
        }

        $custom_query = new WP_Query( $args );
        ?>

        <?php if( $custom_query->have_posts() ) : ?>
        <section class="news">
            <div class="container">
                <h2 class="head-title font-32-700">お知らせ</h2>
                <?php
                $cats_arg = [
                    'taxonomy'  =>  'news-category',
                    'hide_empty' => false,
                ];
                $cats = get_terms($cats_arg);
                ?>
                <?php if( $cats ) : ?>
                <ul class="category-list">
                    <li class="category-item">
                        <a class="btn category <?php echo $cat_slug ? '' : 'active'; ?>" href="<?php echo HOME . 'news'; ?>"><span>全て</span></a>
                    </li>
                    <?php foreach( $cats as $cat ) : ?>
                    <li class="category-item">
                        <a class="btn category <?php echo $cat_slug==$cat->slug ? 'active' : ''; ?>" href="<?php echo get_term_link($cat); ?>"><span><?php echo $cat->name; ?></span></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <div class="include-sidebar">
                    <div class="left-side">
                        <ul class="news-list">
                            <?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                            <li class="news-item">
                                <a href="<?php the_permalink(); ?>">
                                    <p class="date font-15-500"><?php the_time('Y年m月d'); ?></p>
                                    <?php $post_cats = get_the_terms(get_the_ID(), 'news-category'); ?>
                                    <?php if( $post_cats ) : ?>
                                    <div class="categories">
                                        <?php foreach( $post_cats as $post_cat ) : ?>
                                        <p class="btn category active"><span><?php echo $post_cat->name; ?></span></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                    <p class="title font-16-700">8月22日、〇〇教授を囲む会を開催します、お申し込み受付中です。</p>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="pagination">
                        <?php custom_pagination($custom_query->max_num_pages, $paged, $custom_query->found_posts); ?>
                        </div>
                    </div>
                    <div class="right-sidebar">
                        <ul class="side-list">
                            <li class="side-item font-24-700">
                                補助金・助成金<br>
                                支援します
                            </li>
                            <li class="side-item font-24-700">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

    </main>

	<?php get_footer(); ?>