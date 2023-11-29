<?php get_header(); ?>

    <main id="single-news">
        <div class="breadcrump font-20-700">
            <a class="home link" href="<?php echo HOME; ?>">
                <img src="<?php echo T_DIRE_URI; ?>/assets/img/home-icon.svg">
            </a>
            <img class="right-symbol" src="<?php echo T_DIRE_URI; ?>/assets/img/right-symbol.svg">
            <a class="link" href="<?php echo HOME . 'news'; ?>">お知らせ</a>
            <img class="right-symbol" src="<?php echo T_DIRE_URI; ?>/assets/img/right-symbol.svg">
            <p class="current-page"><?php the_title(); ?></p>
        </div>

        <section class="news-content">
            <div class="container">
                <div class="include-sidebar">
                    <div class="left-side">
                        <h3 class="title font-24-700">
                            <?php the_title(); ?>
                        </h3>
                        <div class="category-date">
                            <?php $post_cats = get_the_terms(get_the_ID(), 'news-category'); ?>
                            <?php if( $post_cats ) : ?>
                            <div class="categories">
                                <?php foreach( $post_cats as $post_cat ) : ?>
                                <p class="btn category active"><span><?php echo $post_cat->name; ?></span></p>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <p class="date font-15-400"><?php the_time('Y年m月d日'); ?></p>
                        </div>
                        <div class="news-detail font-16-400">
                            <?php the_content(); ?>
                        </div>
                        <a class="btn-leftarrow" href="<?php echo HOME . 'news'; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M4.46938 8.5306L9.46938 13.5306C9.61027 13.6715 9.80137 13.7506 10.0006 13.7506C10.1999 13.7506 10.391 13.6715 10.5319 13.5306C10.6728 13.3897 10.7519 13.1986 10.7519 12.9993C10.7519 12.8001 10.6728 12.609 10.5319 12.4681L6.0625 7.99997L10.5306 3.5306C10.6004 3.46083 10.6557 3.37801 10.6935 3.28686C10.7312 3.19571 10.7507 3.09801 10.7507 2.99935C10.7507 2.90069 10.7312 2.80299 10.6935 2.71184C10.6557 2.62069 10.6004 2.53786 10.5306 2.4681C10.4609 2.39833 10.378 2.34299 10.2869 2.30524C10.1957 2.26748 10.098 2.24805 9.99938 2.24805C9.90071 2.24805 9.80302 2.26748 9.71187 2.30524C9.62071 2.34299 9.53789 2.39833 9.46813 2.4681L4.46813 7.4681C4.39829 7.53786 4.34291 7.62072 4.30516 7.71193C4.26741 7.80313 4.24804 7.9009 4.24816 7.99961C4.24828 8.09832 4.26788 8.19604 4.30584 8.28715C4.3438 8.37827 4.39937 8.461 4.46938 8.5306Z" fill="#104A00"/>
                            </svg>
                            お知らせ一覧
                        </a>
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

    </main>

	<?php get_footer(); ?>