<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider darken" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/default-header-news.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <h2 class="slider-title"><?php the_title(); ?></h2>
                <h4><?php trans_date(get_the_date()); ?></h4>
                <?php trans_field('brief'); ?>
            </div>
        </div>
    </section>

    <?php 
        $artworks = new WP_Query(array(
            'post_type' => 'artist',
            'post_parent' => get_the_ID(),
            'posts_per_page' => -1
        ));
    ?>
    <section class="site-section news-section">
        <div class="container">
            <div class="site-text multicol4 multicol0-m">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>

    <?php if(get_trans_field('external_links')): ?>
    <section class="site-esction">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('External Links', 'روابط خارجية'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="site-text big">
                <?php trans_field('external_links'); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div><!-- .wrap -->

<?php get_footer();