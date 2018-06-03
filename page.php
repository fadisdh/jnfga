<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider darken" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'header'); ?>)">
        <div class="content container">
            <div class="text">
                <h2 class="slider-title"><?php the_title(); ?></h2>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="site-text multicol2 multicol0-m">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</div><!-- .wrap -->

<?php get_footer();