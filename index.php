<?php get_header(); ?>

<div class="wrap site-page-home">

	<section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? page_thumb('home', 'header') : IMG_URL . '/header-home.jpg'; ?>)">
		<div class="content container">
			<div class="text">
				<?php echo page_content('home'); ?>
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
					<div class="actions">
						<a class="action outline white link" href="<?php echo page_link('programs'); ?>"><?php trans('VIEW ALL EVENTS', 'عرض المزيد من الفعاليات'); ?></a>
					</div>
                </div>
            </div>
        </div>
        <div class="full-boxes">
            <div class="row nom">
                <div class="col-lg-7 nop">
                    <?php $events->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="fullbox" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured'); ?>)">
                        <div class="content">
                            <div class="center">
                                <div class="row nom">
                                    <div class="col-lg-6 bg-purple color-white">
                                        <div class="text">
                                            <p class="text-big"><?php trans_date(get_field('from')); ?> - <?php trans_date(get_field('to')); ?></p>
                                            <p class="text-small"><?php trans_time(get_field('time')); ?></p>
                                            <p class="text-big bold"><?php the_title(); ?></p>
                                            <p class="text-small"><?php echo post_term('event_types'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 bg-purple color-white hm">
                                        <div class="text text-small justify">
                                            <?php trans_field('brief'); ?>
                                        </div>
                                    </div>
                                </div>
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
		
		<div class="site-btns hd">
			<a href="<?php echo page_link('programs'); ?>" class="site-btn"><?php trans('VIEW ALL EVENTS', 'عرض المزيد من الفعاليات'); ?></a>
		</div>
    </section>

	<section class="site-section nom nop">
		<div class="abs z9">
			<div class="container">
				<div class="section-header">
					<h3 class="title"><?php trans('Visit Us', 'الدخول والموقع وساعات الدوام'); ?></h3>
				</div>
			</div>
		</div>
		<div class="abs hm">
            <div class="section-header-space"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="site-text color-purple">
							<?php echo page_content('home/home-info'); ?>
                        </div>
                    </div>
                    <div class="col-lg-9"></div>
                </div>
            </div>
        </div>

		<div class="row nom">
			<div class="col-lg-5 bg-whitish nop">
				<div class="container hd">
					<div class="section-header-space"></div>
					<div class="site-text color-purple">
						<?php echo page_content('home/home-info'); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-7 full-img nop">
				<div class="roadmap">
					<iframe src="https://snazzymaps.com/embed/70484" width="100%" height="550px" style="border:none;"></iframe>
				</div>
			</div>
		</div>
	</section>

    <?php 
        $artworks = new WP_Query(array(
            'post_type' => 'artist',
            'posts_per_page' => 10,
            'post_parent__not_in' => array(0)
        ));
    ?>
	<section class="site-section collection carousel nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header white">
					<h3 class="title"><?php trans('Our Collection', 'مجموعتنا الدائمة'); ?></h3>
					<div class="actions">
						<a class="action outline white link" href="<?php echo page_link('collection'); ?>"><?php trans('VIEW FULL COLLECTION', 'عرض المجموعة الكاملة'); ?></a>
					</div>
                </div>
            </div>
        </div>
        <a class="arrow left">
            <img src="<?php echo IMG_URL ?>/arrow-left.svg" alt="">
        </a>
        <a class="arrow right">
            <img src="<?php echo IMG_URL ?>/arrow-right.svg" alt="">
        </a>
        <div id="collection-slides" class="full-boxes slides" data-slides="2" data-rtl="<?php echo ar() == true; ?>">
            <?php while($artworks->have_posts()): $artworks->the_post(); ?>
            <div class="slide nop">
                <a href="<?php the_permalink($post->post_parent); ?>" class="fullbox" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'featured'); ?>)">
                    <div class="content">
                        <div class="row nom">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 bg-white color-purple">
                            <div class="text">
                                    <p class="text-small"><?php echo get_the_title($post->post_parent); ?></p>
                                    <p class="text-big bold"><?php the_title(); ?></p>
                                    <div class="text-small"><?php the_content(); ?></div>
                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
		</div>
		
		<div class="site-btns hd">
			<a href="<?php echo page_link('collection'); ?>" class="site-btn"><?php trans('VIEW FULL COLLECTION', 'عرض المجموعة الكاملة'); ?></a>
		</div>
    </section>
</div><!-- .wrap -->

<?php get_footer();
