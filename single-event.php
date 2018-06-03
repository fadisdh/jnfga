<?php get_header(); ?>
<?php the_post(); ?>
<?php $artist = get_the_title(); ?>

<div class="wrap site-page-news">
    <section class="slider darken" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/default-news.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <h2 class="slider-title"><?php the_title(); ?></h2>
                <h6 class="bold"><?php the_field('from'); ?> - <?php the_field('to'); ?></h6>
                <h6 class="bold"><?php the_field('time'); ?></h6>
                <?php trans_field('brief'); ?>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('About', 'عن المتحف'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="site-text  multicol2 big multicol0-m">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Event Photos', 'الصور'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="site-text">
                <?php the_field('gallery'); ?>
            </div>
        </div>
    </section>

    <?php if(get_trans_field('external_links')): ?>
    <section class="site-section">
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

    <?php 
        $events = new WP_Query(array(
            'post_type' => 'event',
            'terms'   => wp_get_post_terms(get_the_ID()),
            'posts_per_page' => 4,
            'post_parent' => 0,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
        ));
    ?>
    <section class="site-section">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Similar Events', 'فعاليات مماثلة'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($events->have_posts()): $events->the_post(); ?>
                    <div class="col-lg-3">
                        <a href="<?php the_permalink() ?>" class="box <?php echo strtolower(get_post_terms('event_types')); ?>">
                            <div class="img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                            <div class="content">
                                <div class="big"><?php the_field('from'); ?> - <?php echo the_field('to'); ?></div>
                                <div class="small"><?php the_field('time'); ?></div>
                                <h3 class="big bold"><?php the_title(); ?></h3>
                                <div class="small"><?php echo get_post_terms('event_types'); ?></div>

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