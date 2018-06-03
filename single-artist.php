<?php
    the_post();
    global $post, $wp_query;
    if($post->post_parent){
        header('Location: '.get_page_link($post->post_parent).'#!'.$post->post_name);
    }
?>

<?php get_header(); ?>
<?php $artist = get_the_title(); ?>

<div class="wrap site-page-news">
    <section class="slider darken" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-collection.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <h2 class="slider-title"><?php the_title(); ?></h2>
                <h4 class="bold"><?php echo post_term('countries'); ?>, <?php trans('b.', 'ولد عام'); ?> <?php the_field('year'); ?></h4>
                <?php the_content(); ?>
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
            <div class="section-header">
                <h3 class="title"><?php trans('Artworks', 'الأعمال الفنية'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($artworks->have_posts()): $artworks->the_post(); ?>
                    <div class="col-lg-3">
                        <a id="<?php global $post; echo $post->post_name; ?>" href="<?php echo get_the_post_thumbnail_url(); ?>" 
                           data-fancybox="artwork"
                           data-caption="<?php the_title(); ?>"
                           data-artist="<?php echo $artist; ?>"
                           data-year="<?php the_field('year'); ?>"
                           data-content="<?php the_content(); ?>"
                           class="box purple color-white">

                            <div class="img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                            <div class="content flex">
                                <h3 class="title">
                                    <?php the_title(); ?>
                                    <div class="small"><?php the_field('year'); ?></div>
                                </h3>
                                <div class="icon"><i class="far fa-plus-square"></i></div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>

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
        $artists = new WP_Query(array(
            'post_type' => 'artist',
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
                <h3 class="title"><?php trans('More From' , 'المزيد من'); ?> <?php echo post_term('countries'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($artists->have_posts()): $artists->the_post(); ?>
                    <div class="col-lg-3">
                        <a href="<?php the_permalink(); ?>" class="box purple color-white">
                            <div class="img" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)"></div>
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