<?php get_header(); ?>

    <main id="activities-page">
        <div class="breadcrump font-20-700">
            <a class="home link" href="<?php echo HOME; ?>">
                <img src="<?php echo T_DIRE_URI; ?>/assets/img/home-icon.svg">
            </a>
            <img class="right-symbol" src="<?php echo T_DIRE_URI; ?>/assets/img/right-symbol.svg">
            <p class="current-page">みんなの活動</p>
        </div>

        <section class="head-part">
            <div class="container">
                <h2 class="head-title font-32-700">みんなの活動</h2>
                <p class="top-desc font-18-500">
                    みんなの学びと出会から始まった、社会課題の解決を担った活動を紹介しています。<br>
                    それぞれの活動について、つながりたい、アイデアを提供したい等、質問や問い合わせが可能です。
                </p>
            </div>
        </section>

        <section class="search-section">
            <div class="container">
                <div class="include-sidebar">
                    <div class="left-side search-pannel">
                        <div class="search-bar">
                            <div class="search-symbol">
                                <img src="<?php echo T_DIRE_URI; ?>/assets/img/search-symbol.svg">
                            </div>
                            <input type="text" name="search-keys" id="search-keys" class="font-15-400" size="60" value="" placeholder="キーワードを入力" />
                        </div>
                        <div class="checkbox-wrapper">
                            
                            <ul class="business-list  checkbox-list">
                                <li class="item">
                                    <label class="desc-15-bold">
                                        <input type="checkbox" class="work-scope" id="<?php echo $child_cat->slug; ?>" name="work-scope[]" value="<?php echo $child_cat->name; ?>" <?php echo in_array($child_cat->name, $work_scopes) ? 'checked' : ''; ?>>&nbsp;&nbsp;<?php echo $child_cat->name; ?>
                                    </label>
                                </li>
                            </ul>
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

        <?php $args = [
            'post_type' =>  'activities',
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