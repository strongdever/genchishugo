<?php

	/*
	Template Name: Front Page Template
	*/

	if ( ! defined( 'ABSPATH' ) ) exit;
	get_header();

?>

    <main id="top-page">
        <div class="top-bar font-20-700">
            不安な時に大事なのは、“先読み”よりも“仲間”だ<span></span>加藤 宗兵衛
        </div>

        <?php
            $args = [
                'post_type' => 'news',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => 3,
                'orderby' => 'post_date',
                'order' => 'DESC'
            ];
            $custom_query = new WP_Query( $args );
        ?>

        <?php if( $custom_query->have_posts() ): ?>
        <section class="news">
            <div class="container">
                <h2 class="head-title font-32-700">お知らせ</h2>
                <div class="link-wrapper">
                    <p class="label font-18-500">学びや出会いのイベント開催情報</p>
                    <a class="font-16-700 btn-rightarrow" href="<?php echo HOME . 'news'; ?>">
                        お知らせ一覧
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M14.2806 8.78318L9.78063 13.2832C9.63973 13.4241 9.44863 13.5032 9.24938 13.5032C9.05012 13.5032 8.85902 13.4241 8.71813 13.2832C8.57723 13.1423 8.49807 12.9512 8.49807 12.7519C8.49807 12.5527 8.57723 12.3616 8.71813 12.2207L11.9375 9.00255H2.75C2.55109 9.00255 2.36032 8.92353 2.21967 8.78288C2.07902 8.64223 2 8.45146 2 8.25255C2 8.05364 2.07902 7.86287 2.21967 7.72222C2.36032 7.58157 2.55109 7.50255 2.75 7.50255H11.9375L8.71937 4.28255C8.57848 4.14165 8.49932 3.95056 8.49932 3.7513C8.49932 3.55204 8.57848 3.36095 8.71937 3.22005C8.86027 3.07915 9.05137 3 9.25062 3C9.44988 3 9.64098 3.07915 9.78187 3.22005L14.2819 7.72005C14.3518 7.78982 14.4073 7.87272 14.4451 7.96399C14.4829 8.05525 14.5023 8.15309 14.5022 8.25187C14.502 8.35066 14.4824 8.44845 14.4444 8.53962C14.4064 8.6308 14.3507 8.71357 14.2806 8.78318Z"
                                fill="#104A00" />
                        </svg>
                    </a>
                </div>
                <div class="news-wrapper">
                    <ul class="news-list">
                        <?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                        <li class="news-item">
                            <a href="<?php the_permalink(); ?>">
                                <p class="date font-15-500"><?php the_time('Y年m月d日'); ?></p>
                                <?php $post_cats = get_the_terms(get_the_ID(), 'news-category'); ?>
                                <?php if( $post_cats ) : ?>
                                <div class="categories">
                                    <?php foreach( $post_cats as $post_cat ) : ?>
                                    <p class="btn category active"><span><?php echo $post_cat->name; ?></span></p>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                                <p class="title font-16-700"><?php the_title(); ?></p>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="activities">
            <div class="container">
                <h2 class="head-title font-32-700">みんなの活動</h2>
                <div class="link-wrapper">
                    <p class="label font-18-500">学びと出会いからはじまったみんなの活動を紹介</p>
                    <a class="font-16-700 btn-rightarrow" href="">
                        みんなの活動一覧
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M14.2806 8.78318L9.78063 13.2832C9.63973 13.4241 9.44863 13.5032 9.24938 13.5032C9.05012 13.5032 8.85902 13.4241 8.71813 13.2832C8.57723 13.1423 8.49807 12.9512 8.49807 12.7519C8.49807 12.5527 8.57723 12.3616 8.71813 12.2207L11.9375 9.00255H2.75C2.55109 9.00255 2.36032 8.92353 2.21967 8.78288C2.07902 8.64223 2 8.45146 2 8.25255C2 8.05364 2.07902 7.86287 2.21967 7.72222C2.36032 7.58157 2.55109 7.50255 2.75 7.50255H11.9375L8.71937 4.28255C8.57848 4.14165 8.49932 3.95056 8.49932 3.7513C8.49932 3.55204 8.57848 3.36095 8.71937 3.22005C8.86027 3.07915 9.05137 3 9.25062 3C9.44988 3 9.64098 3.07915 9.78187 3.22005L14.2819 7.72005C14.3518 7.78982 14.4073 7.87272 14.4451 7.96399C14.4829 8.05525 14.5023 8.15309 14.5022 8.25187C14.502 8.35066 14.4824 8.44845 14.4444 8.53962C14.4064 8.6308 14.3507 8.71357 14.2806 8.78318Z"
                                fill="#104A00" />
                        </svg>
                    </a>
                </div>
                <div class="activities-wrapper">
                    <ul class="activities-list">
                        <li class="activity-item new">
                            <a href="">
                                <h3 class="title font-18-700">営業スキルを向上させる教材をつくっています</h3>
                                <p class="content font-15-400">
                                    オンラインで誰でも営業力がつくるための映像コンテンツの提供を行っています。オンラインでビジネススキルを付けることで、ここに説…</p>
                                <p class="company-province font-15-700">株式会社○○/<span>新潟県</span></p>
                                <div class="categories">
                                    <h4 class="btn category active"><span>補助金・助成金</span></h4>
                                </div>
                            </a>
                        </li>
                        <li class="activity-item new">
                            <a href="">
                                <h3 class="title font-18-700">営業スキルを向上させる教材をつくっています</h3>
                                <p class="content font-15-400">
                                    オンラインで誰でも営業力がつくるための映像コンテンツの提供を行っています。オンラインでビジネススキルを付けることで、ここに説…</p>
                                <p class="company-province font-15-700">株式会社○○/<span>新潟県</span></p>
                                <div class="categories">
                                    <h4 class="btn category active"><span>補助金・助成金</span></h4>
                                </div>
                            </a>
                        </li>
                        <li class="activity-item new">
                            <a href="">
                                <h3 class="title font-18-700">営業スキルを向上させる教材をつくっています</h3>
                                <p class="content font-15-400">
                                    オンラインで誰でも営業力がつくるための映像コンテンツの提供を行っています。オンラインでビジネススキルを付けることで、ここに説…</p>
                                <p class="company-province font-15-700">株式会社○○/<span>新潟県</span></p>
                                <div class="categories">
                                    <h4 class="btn category active"><span>補助金・助成金</span></h4>
                                    <h4 class="btn category active"><span>補助金・助成金</span></h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="search-pannel">
            <div class="container">
                <h2 class="head-title font-32-700">みんなの活動検索</h2>
                <p class="description font-18-500">興味・関心のあるみんなの活動を探し、コンタクトをとってみよう</p>
                <div class="search-wrapper">
                    <ul class="pannel-list">
                        <li class="pannel-item">
                            <p class="label font-20-700">関わっている社会課題から探す</p>
                            <ul class="check-list by-social-issues">
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name=""
                                            value="">&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name=""
                                            value="">&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <li class="pannel-item">
                            <p class="label font-20-700">活動の種類から探す</p>
                            <ul class="check-list by-social-issues">
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <li class="pannel-item">
                            <p class="label font-20-700">所在地から探す</p>
                            <ul class="check-list by-social-issues">
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                                <li class="check-item">
                                    <label class="font-15-400">
                                        <input type="checkbox" class="work-scope" id="" name="" value=""
                                            checked>&nbsp;&nbsp;地方創生
                                    </label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-green" href=""><span>検索する</span></a>
            </div>
        </section>

        <section class="learning-value">
            <div class="container">
                <h2 class="head-title font-32-700">価値向上を学ぶ</h2>
                <p class="description font-18-500">社会課題を知り、未来を予測するための学びを提供</p>
                <div class="special-wrapper">
                    <div class="link-wrapper">
                        <p class="part-title font-24-700">特集</p>
                        <a class="font-16-700 btn-rightarrow" href="">
                            特集一覧
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M14.2806 8.78318L9.78063 13.2832C9.63973 13.4241 9.44863 13.5032 9.24938 13.5032C9.05012 13.5032 8.85902 13.4241 8.71813 13.2832C8.57723 13.1423 8.49807 12.9512 8.49807 12.7519C8.49807 12.5527 8.57723 12.3616 8.71813 12.2207L11.9375 9.00255H2.75C2.55109 9.00255 2.36032 8.92353 2.21967 8.78288C2.07902 8.64223 2 8.45146 2 8.25255C2 8.05364 2.07902 7.86287 2.21967 7.72222C2.36032 7.58157 2.55109 7.50255 2.75 7.50255H11.9375L8.71937 4.28255C8.57848 4.14165 8.49932 3.95056 8.49932 3.7513C8.49932 3.55204 8.57848 3.36095 8.71937 3.22005C8.86027 3.07915 9.05137 3 9.25062 3C9.44988 3 9.64098 3.07915 9.78187 3.22005L14.2819 7.72005C14.3518 7.78982 14.4073 7.87272 14.4451 7.96399C14.4829 8.05525 14.5023 8.15309 14.5022 8.25187C14.502 8.35066 14.4824 8.44845 14.4444 8.53962C14.4064 8.6308 14.3507 8.71357 14.2806 8.78318Z"
                                    fill="#104A00" />
                            </svg>
                        </a>
                    </div>
                    <ul class="special-list">
                        <li class="special-item">
                            <h4 class="label font-18-700">インタビュー</h4>
                        </li>
                        <li class="special-item">
                            <h4 class="label font-18-700">今から起こる世の中のこと</h4>
                        </li>
                    </ul>
                </div>
                <div class="improvement-pro">
                    <div class="link-wrapper">
                        <p class="part-title font-24-700">価値向上プログラム</p>
                        <a class="font-16-700 btn-rightarrow" href="">
                            価値を高める学び一覧
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M14.2806 8.78318L9.78063 13.2832C9.63973 13.4241 9.44863 13.5032 9.24938 13.5032C9.05012 13.5032 8.85902 13.4241 8.71813 13.2832C8.57723 13.1423 8.49807 12.9512 8.49807 12.7519C8.49807 12.5527 8.57723 12.3616 8.71813 12.2207L11.9375 9.00255H2.75C2.55109 9.00255 2.36032 8.92353 2.21967 8.78288C2.07902 8.64223 2 8.45146 2 8.25255C2 8.05364 2.07902 7.86287 2.21967 7.72222C2.36032 7.58157 2.55109 7.50255 2.75 7.50255H11.9375L8.71937 4.28255C8.57848 4.14165 8.49932 3.95056 8.49932 3.7513C8.49932 3.55204 8.57848 3.36095 8.71937 3.22005C8.86027 3.07915 9.05137 3 9.25062 3C9.44988 3 9.64098 3.07915 9.78187 3.22005L14.2819 7.72005C14.3518 7.78982 14.4073 7.87272 14.4451 7.96399C14.4829 8.05525 14.5023 8.15309 14.5022 8.25187C14.502 8.35066 14.4824 8.44845 14.4444 8.53962C14.4064 8.6308 14.3507 8.71357 14.2806 8.78318Z"
                                    fill="#104A00" />
                            </svg>
                        </a>
                    </div>
                    <ul class="improvement-list">
                        <li class="improvement-item">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/img/improvement01.png">
                            <h4 class="label font-20-700">社会課題に取り組む</h4>
                        </li>
                        <li class="improvement-item">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/img/improvement02.png">
                            <h4 class="label font-20-700">独自の価値を発掘する</h4>
                        </li>
                        <li class="improvement-item">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/img/improvement03.png">
                            <h4 class="label font-20-700">社会性を獲得する</h4>
                        </li>
                        <li class="improvement-item">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/img/improvement04.png">
                            <h4 class="label font-20-700">広報活動を強化する</h4>
                        </li>
                    </ul>
                </div>
                <div class="process-wrapper">
                    <div class="link-wrapper">
                        <p class="part-title font-24-700">自身と自社の価値を向上する活動プロセス</p>
                    </div>
                    <ul class="process-list">
                        <li class="process-item">
                            <div class="step-label">Step. 1</div>
                            <div class="step-content">
                                <h5 class="step-title font-20-700">学ぶ</h5>
                                <p class="content  font-15-400">
                                    自身の事業、活動している<br>
                                    場面で起きている社会課題を<br>
                                    学ぶ
                                </p>
                            </div>
                        </li>
                        <li class="process-item">
                            <div class="step-label">Step. 2</div>
                            <div class="step-content">
                                <h5 class="step-title font-20-700">行動を開始する</h5>
                                <p class="content  font-15-400">
                                    自事業や活動内容に社会課題を<br>
                                    絡ませ、自身も社会課題の<br>
                                    解決を担う
                                </p>
                            </div>
                        </li>
                        <li class="process-item">
                            <div class="step-label">Step. 3</div>
                            <div class="step-content">
                                <h5 class="step-title font-20-700">周知させる</h5>
                                <p class="content  font-15-400">
                                    事業計画書にて目標を決め、<br>
                                    活動内容や結果について<br>
                                    広報活動を行う
                                </p>
                            </div>
                        </li>
                        <li class="process-item">
                            <div class="step-label">Step. 4</div>
                            <div class="step-content">
                                <h5 class="step-title font-20-700">社会的信頼を得る</h5>
                                <p class="content font-15-400">
                                    ・活動がメディアに掲載<br>
                                    ・自治体や国からの後押し<br>
                                    ・志を共にした仲間との出会い<br>
                                    ・事業や活動の成長がさらに加速
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="example-section">
            <div class="container">
                <h2 class="head-title font-32-700">社会的企業への転換例</h2>
                <div class="link-wrapper">
                    <p class="part-title font-18-500">社会的企業への転換に成功した企業様を紹介します</p>
                    <a class="font-16-700 btn-rightarrow" href="">
                        事例紹介
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path
                                d="M14.2806 8.78318L9.78063 13.2832C9.63973 13.4241 9.44863 13.5032 9.24938 13.5032C9.05012 13.5032 8.85902 13.4241 8.71813 13.2832C8.57723 13.1423 8.49807 12.9512 8.49807 12.7519C8.49807 12.5527 8.57723 12.3616 8.71813 12.2207L11.9375 9.00255H2.75C2.55109 9.00255 2.36032 8.92353 2.21967 8.78288C2.07902 8.64223 2 8.45146 2 8.25255C2 8.05364 2.07902 7.86287 2.21967 7.72222C2.36032 7.58157 2.55109 7.50255 2.75 7.50255H11.9375L8.71937 4.28255C8.57848 4.14165 8.49932 3.95056 8.49932 3.7513C8.49932 3.55204 8.57848 3.36095 8.71937 3.22005C8.86027 3.07915 9.05137 3 9.25062 3C9.44988 3 9.64098 3.07915 9.78187 3.22005L14.2819 7.72005C14.3518 7.78982 14.4073 7.87272 14.4451 7.96399C14.4829 8.05525 14.5023 8.15309 14.5022 8.25187C14.502 8.35066 14.4824 8.44845 14.4444 8.53962C14.4064 8.6308 14.3507 8.71357 14.2806 8.78318Z"
                                fill="#104A00" />
                        </svg>
                    </a>
                </div>
                <ul class="example-list">
                    <li class="example-item">
                        <h4 class="title font-18-700">ここにタイトルが入ります</h4>
                        <p class="content font-15-400">オンラインで誰でも営業力がつくるための映像コンテンツの提供を行っています。オンラインでビジネススキルを付けることで、ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。ここに説明が入りま…</p>
                        <p class="company-province font-15-700">株式会社○○/新潟県</p>
                    </li>
                    <li class="example-item">
                        <h4 class="title font-18-700">ここにタイトルが入ります</h4>
                        <p class="content font-15-400">オンラインで誰でも営業力がつくるための映像コンテンツの提供を行っています。オンラインでビジネススキルを付けることで、ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。ここに説明が入りま…</p>
                        <p class="company-province font-15-700">株式会社○○/新潟県</p>
                    </li>
                </ul>
            </div>
        </section>

        <section class="last-section">
            <div class="container">
                <p class="description font-17-700">人の配置に問題があるかもしれません</p>
                <ul class="contents-list">
                    <li class="contents-item">
                        <p class="desc font-24-700">いざという時、&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;エゴグラム<br>
                            メンバーが動いてくれない</p>
                    </li>
                    <li class="contents-item">
                        <h5 class="title font-20-700">健康経営の実践</h5>
                        <p class="desc font-24-700">オフィスDEクリニック</p>
                    </li>
                </ul>
            </div>
        </section>
    </main>

<?php get_footer(); ?>