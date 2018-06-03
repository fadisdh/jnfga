<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-gallery.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <section class="site-section nom nop bg-purple">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('Navigate', 'مباني المتحف الوطني'); ?></h3>
            </div>
        </div>
        <div class="map">
            <?php include('map.php'); ?>
        </div>
    </section>

    <?php 
        $sections = new WP_Query(array(
            'post_type' => 'gallery',
            'post_parent' => 0,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        ));
    ?>

    <?php while($sections->have_posts()): $sections->the_post(); ?>
    <section id="<?php echo get_post_field('post_name', get_post()); ?>" class="site-section purple nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header white">
                    <h3 class="title"><?php the_title(); ?></h3>
                </div>
            </div>
        </div>
        <div class="carousel">
            <a class="arrow left">
                <img src="<?php echo IMG_URL ?>/arrow-left.svg" alt="">
            </a>
            <a class="arrow right">
                <img src="<?php echo IMG_URL ?>/arrow-right.svg" alt="">
            </a>

            <?php
                 $slides = new WP_Query(array(
                    'post_type' => 'gallery',
                    'post_parent' => get_the_ID(),
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    'posts_per_page' => -1
                ));
            ?>
            <div class="slides" data-rtl="<?php echo ar() == true; ?>">
                <?php while($slides->have_posts()): $slides->the_post(); ?>
                <div class="slide full-img s600" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL.'/section-area.jpg'; ?>)">
                    <div class="container color-white">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="site-text">
                                    <?php the_content(); ?>
                                </div>
                                <?php if(get_trans_field('action_text')): ?>
                                <div class="actions">
                                    <a target="<?php the_field('action_target'); ?>" href="<?php the_field('action_url'); ?>" class="site-btn white"><?php trans_field('action_text'); ?></a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-5"></div>
                            <div class="col-lg-3">
                                <div class="site-text">
                                    <?php echo $sections->post->post_content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
</div><!-- .wrap -->

<?php get_footer();