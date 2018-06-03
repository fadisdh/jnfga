<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-news.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php 
        $news = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => -1
        ));
    ?>
	<section class="site-section news-section filterable" data-count="8">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('News', 'الأخبار'); ?></h3>
                <div class="actions">
                    <a href="" class="action outline active" data-action=""><?php trans('All', 'الجميع'); ?></a>
                    <a href="" class="action" data-action="article"><?php trans('Our Atricles', 'مقالات المتحف'); ?></a>
                    <a href="" class="action green" data-action="media"><?php trans('In The Media', 'في الاعلام'); ?></a>
                </div>
            </div>
        </div>

        <div class="container hd">
            <div class="actions center-m">
                <a href="" class="action outline active" data-action=""><?php trans('All', 'الجميع'); ?></a>
                <br>
                <a href="" class="action" data-action="article"><?php trans('Our Atricles', 'مقالات المتحف'); ?></a>
                <a href="" class="action green" data-action="media"><?php trans('In The Media', 'في الاعلام'); ?></a>
            </div>
            <div class="s15"></div>
        </div>

        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($news->have_posts()): $news->the_post(); ?>
                    <div class="col-lg-3 item" data-filter="<?php echo get_field('link') ? 'media' : 'article'; ?>">
                        <a <?php echo get_field('link') ? 'target="_blank"' : ''; ?> href="<?php get_field('link') ? the_field('link') : the_permalink(); ?>" class="box <?php echo get_field('link') ? 'green media' : 'article'; ?>">
                            <div class="img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                            <div class="content">
                                <h3 class="big"><?php the_title(); ?></h3>
                                <div class="space3"></div>
                                <div class="small"><?php echo trans_date(get_the_date()); ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="site-btns">
                <a href="" class="site-btn more"><?php trans('VIEW MORE', 'عرض المزيد'); ?></a>
            </div>
        </div>
    </section>

    <?php 
        $prs = new WP_Query(array(
            'post_type' => 'pr',
            'posts_per_page' => -1
        ));
    ?>
    <section class="site-section pr-section purple filterable" data-count="9">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('Press Releases', 'التحارير الصحفية'); ?></h3>
            </div>
        </div>

        <div class="box-list">
            <div class="container">
                <div class="row">
                    <?php while($prs->have_posts()): $prs->the_post(); ?>
                    <div class="col-lg-4 item" data-filter>
                        <div class="text-box">
                            <div class="date"><?php trans_Date(get_the_date()); ?></div>
                            <div class="title"><?php the_title(); ?></div>
                            <a target="_blank" href="<?php echo the_field('file'); ?>" class="site-btn white action"><?php trans('DOWNLOAD PDF', 'تحميل ملف  PDF'); ?></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="site-btns">
                    <a href="" class="site-btn more"><?php trans('VIEW MORE', 'عرض المزيد'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section site-presskit">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Press Kit', 'عدة الصحافة'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="presskit text-purple">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="site-text">
                            <?php echo page_content('news/press-kit-info'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="site-text">
                            <?php echo page_content('news/press-kit-files'); ?> 
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="site-text">
                            <?php echo page_content('news/press-kit-zip'); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- .wrap -->

<?php get_footer();
