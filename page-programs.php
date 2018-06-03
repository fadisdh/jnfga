<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-programs.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php 
        $events = new WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => 3
        ));
    ?>
	<section class="site-section nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header white">
					<h3 class="title"><?php trans('Happening Now', 'الآن في المتحف الوطني'); ?></h3>
                </div>
            </div>
        </div>
        <div class="full-boxes">
            <div class="row nom">
                <div class="col-lg-7 nop">
                    <?php $events->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="fullbox" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured'); ?>)">
                        <div class="content">
                            <div class="row nom">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4 bg-purple color-white">
                                    <div class="text">
                                        <p class="text-big"><?php trans_date(get_field('from')); ?> - <?php trans_date(get_field('to')); ?></p>
                                        <p class="text-small"><?php trans_time(get_field('time')); ?></p>
                                        <p class="text-big bold"><?php the_title(); ?></p>
                                        <p class="text-small"><?php echo post_term('event_types'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-purple color-white hm">
                                    <div class="text text-small justify">
                                        <?php trans_field('brief'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5 nop">
                    <?php $events->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="fullbox small" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured'); ?>)">
                        <div class="content">
                            <div class="row nom">
                                <div class="col-lg-4 bg-purple color-white">
                                    <div class="text">
                                        <p class="text-big"><?php trans_date(get_field('from')); ?> - <?php trans_date(get_field('to')); ?></p>
                                        <p class="text-small"><?php trans_time(get_field('time')); ?></p>
                                        <p class="text-big bold"><?php the_title(); ?></p>
                                        <p class="text-small"><?php echo post_term('event_types'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-8"></div>
                            </div>
                        </div>
                    </a>
                    <?php $events->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="fullbox small" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured'); ?>)">
                        <div class="content">
                            <div class="row nom">
                                <div class="col-lg-4 bg-purple color-white">
                                    <div class="text">
                                        <p class="text-big"><?php trans_date(get_field('from')); ?> - <?php trans_date(get_field('to')); ?></p>
                                        <p class="text-small"><?php trans_time(get_field('time')); ?></p>
                                        <p class="text-big bold"><?php the_title(); ?></p>
                                        <p class="text-small"><?php echo post_term('event_types'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-8"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
		</div>
    </section>

    <?php 
        $events = new WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => -1
        ));
    ?>
	<section class="site-section news-section filterable" data-count="8">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Explore Our Events', 'تصفحّوا برنامج فعالياتنا'); ?></h3>
            </div>
        </div>

        <div class="container filters" data-events-filters data-locale="<?php the_locale(); ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="date-selector">
                        <div class="row">
                            <div class="col-lg-1">
                                <a href="" class="arrow hm" data-prev>
                                    <img class="arrow" src="<?php echo IMG_URL; ?>/arrow-<?php echo ar() ? 'right' : 'left'; ?>-purple.svg" alt="">
                                </a>
                                <a href="" class="arrow hd" data-prev>
                                    <i class="fas fa-chevron-up"></i>
                                </a>
                            </div>
                            <div class="col-lg-2">
                                <div class="side" data-side1>March 2018</div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main">
                                    <div class="small"><?php echo trans('Currently Viewing', 'يعرض حاليًا'); ?></div>
                                     <div class="big" data-main>April 2018</div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="side" data-side2>May 2018</div>
                            </div>
                            <div class="col-lg-1">
                                <a href="" class="arrow hm" data-next>
                                    <img class="arrow" src="<?php echo IMG_URL; ?>/arrow-<?php echo ar() ? 'left' : 'right'; ?>-purple.svg" alt="">
                                </a>
                                <a href="" class="arrow hd" data-next>
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                    <div class="date-types">
                        <a id="type-month" class="active" href="javascript:void(0);"><?php trans('By Month', 'عرض الشهر'); ?></a>
                        <a id="type-day" href="javascript:void(0);" data-locale="<?php the_locale(); ?>"><?php trans('Choose Date', 'تحديد التاريخ'); ?> <i class="fas fa-chevron-down"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="search">
                        <input type="text" placeholder="<?php echo trans('Search', 'البحث'); ?>..." data-filter-search>
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="categories" data-filter-cats>
                        <label><input type="checkbox" checked value="Exhibitions"> <?php trans('Exhibitions' , 'المعارض'); ?></label>
                        <label><input type="checkbox" checked value="Talks"> <?php trans('Talks' , 'النقاشات والعروض'); ?></label>
                        <label><input type="checkbox" checked value="Screenings"> <?php trans('Screenings' , 'مصنع: إبداع وفكر معاصر'); ?></label>
                        <label><input type="checkbox" checked value="Workshops"> <?php trans('Workshops' , 'ورشات'); ?></label>
                        <label><input type="checkbox" checked value="On Tour"> <?php trans('On Tour' , 'جولة'); ?></label>
                        <label><input type="checkbox" checked value="Family & Kids"> <?php trans('Family & Kids' , 'الفعاليات العائلية'); ?></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="container events">
            <div class="box-list">
                <div class="row">
                    <?php while($events->have_posts()): $events->the_post(); ?>
                    <div class="col-lg-3 item" data-event="<?php the_title(); ?>" data-from="<?php the_field('from'); ?>" data-to="<?php the_field('to'); ?>" data-cat="<?php echo get_post_terms('event_types'); ?>">
                        <a href="<?php the_permalink() ?>" class="box <?php echo strtolower(get_post_terms('event_types')); ?>">
                            <div class="img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                            <div class="content">
                                <div class="big"><?php trans_date(get_field('from')); ?> - <?php trans_date(get_field('to')); ?></div>
                                <div class="small"><?php trans_time(get_field('time')); ?></div>
                                <h3 class="big bold"><?php the_title(); ?></h3>
                                <div class="small"><?php echo post_term('event_types'); ?></div>

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

    <section class="site-section purple nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header white">
                    <h3 class="title"><?php trans('Creation Factory', 'مصنع: إبداع وفكر معاصر'); ?></h3>
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
                    'post_type' => 'creation_factory',
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
</div><!-- .wrap -->

<?php get_footer();
