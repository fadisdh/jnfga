<?php get_header(); ?>

<div class="wrap site-page-news">
    <?php $header = get_page_by_path('collection'); ?>
    <section class="slider" style="background-image: url(<?php echo IMG_URL; ?>/header-collection.jpg)">
        <div class="content container">
            <div class="text">
                <?php echo $header->post_content; ?>
            </div>
        </div>
    </section>

    <section class="site-section news-section">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php echo ar() ? the_field('ar_name', get_queried_object()) : single_cat_title(); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while(have_posts()): the_post(); ?>
                    <div class="col-lg-3">
                        <a href="<?php the_permalink(); ?>" class="box purple color-white">
                            <div class="img" style="background-image:url(<?php echo IMG_URL; ?>/now1.jpg)"></div>
                            <div class="content flex">
                                <h3 class="title"><?php the_title(); ?></h3>
                                <div class="icon"><i class="fas <?php echo ar() ? 'fa-chevron-left' : 'fa-chevron-right'; ?>"></i></div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>

</div><!-- .wrap -->

<?php get_footer();