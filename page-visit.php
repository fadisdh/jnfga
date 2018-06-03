<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-visit.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <section class="site-section nom nop">
        <div class="abs z9">
            <div class="container">
                <div class="section-header">
                    <h3 class="title"><?php trans('Admissions, Location & Hours', 'الدخول والموقع وساعات الدوام'); ?></h3>
                </div>
            </div>
        </div>
        <div class="abs hm">
            <div class="section-header-space"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="site-text color-purple">
                                <?php echo page_content('visit/visit-info'); ?>
                            </div>
                        </div>
                        <div class="col-lg-9"></div>
                    </div>
                </div>
        </div>
        <div class="row nom">
            <div class="col-lg-5 bg-whitish">
                <div class="container hd">
                    <div class="section-header-space double"></div>
                    <div class="site-text color-purple">
                        <?php echo page_content('visit/visit-info'); ?>
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

    <section class="site-section nom nop">
        <div class="abs">
            <div class="s15"></div>
            <div class="container">
                <div class="section-header white">
                    <h3 class="title"><?php trans('What To Do', 'أفكار لزيارتنا'); ?></h3>
                </div>
            </div>
        </div>
        <div class="box-list">
            <div class="row nom">
                <div class="col-lg-6 full-box" style="background-image: url(<?php echo IMG_URL; ?>/visit-art.jpg)">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="content col-lg-6 color-white">
                            <div class="subtitle"><?php trans('Arts & Culture', 'ثقافة وفنون'); ?></div>
                            <div class="title"><?php trans('All About Art!', 'هوس الفن!'); ?></div>
                            <a href="<?php echo page_link('programs'); ?>" class="site-btn white"><?php trans('VIEW EXHIBITIONS', 'عرض المعارض'); ?></a>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="col-lg-6 full-box" style="background-image: url(<?php echo IMG_URL; ?>/visit-society.jpg)">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="content col-lg-6 color-white">
                            <div class="subtitle"><?php trans('Society', 'مجتمع'); ?></div>
                            <div class="title"><?php trans('Get Together', 'لنلتقي ونجتمع'); ?></div>
                            <a href="<?php echo page_link('programs'); ?>" class="site-btn white"><?php trans('VIEW FAMILY & KIDS', 'عرض الحديقة'); ?></a>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
                <div class="col-lg-6 full-box" style="background-image: url(<?php echo IMG_URL; ?>/visit-library.jpg)">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="content col-lg-6 color-white">
                            <div class="subtitle"><?php trans('Library & Café', 'المكتبة و الكافيه'); ?></div>
                            <div class="title"><?php trans('Read and Grub', 'إقرأوا وتلذذوا'); ?></div>
                            <a href="" class="site-btn white"><?php trans('CAFÉ FACEBOOK PAGE', 'صفحة الكافيه على الفيس بوك'); ?></a>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="col-lg-6 full-box" style="background-image: url(<?php echo IMG_URL; ?>/visit-shop.jpg)">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="content col-lg-6 color-white">
                            <div class="subtitle"><?php trans('Shop', 'المتجر'); ?></div>
                            <div class="title"><?php trans('Art as a Gift', 'الفن كهدية'); ?></div>
                            <a href="" class="site-btn white"><?php trans('MTJR FACEBOOK PAGE', 'صفحة متجر على الفيس بوك'); ?></a>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header">
                    <h3 class="title"><?php trans('Accessibility Information', 'معلومات الاحتياجات الخاصة'); ?></h3>
                </div>
            </div>
        </div>
        <div class="abs hm">
            <div class="section-header-space"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="site-text color-purple">
                            <?php echo page_content('visit/accessibility-info'); ?>
                        </div>
                    </div>
                    <div class="col-lg-9"></div>
                </div>
            </div>
        </div>
        <div class="row nom">
            <div class="col-lg-5 bg-whitish">
                <div class="container hd">
                    <div class="section-header-space"></div>
                    <div class="site-text color-purple">
                        <?php echo page_content('visit/accessibility-info'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 full-img" style="background-image: url(<?php echo IMG_URL; ?>/wheelchair.jpg)"></div>
        </div>
    </section>

    <section class="site-section purple nom">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('Book a Tour', 'حجز جولة'); ?></h3>
            </div>
        </div>
        <div class="row nom">
            <div class="col-lg-2"></div>
            <div class="col-lg-3">
                <div class="site-text">
                    <?php echo page_content('visit/book-a-tour'); ?>
                </div>
            </div>
            <div class="col-lg-5">
                <?php echo page_content(ar() ? 'visit/ar-visit-form' : 'visit/visit-form'); ?>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>

    <section class="site-section nom full-img" style="background-image: url(<?php echo IMG_URL; ?>/section-area.jpg)">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('About The Area', 'عن المنطقة'); ?></h3>
            </div>
        </div>

        <div class="container color-white">
            <diiv class="row">
                <div class="col-lg-6">
                    <div class="site-text">
                        <?php echo page_content('visit/al-luwaibdeh'); ?>
                    </div>
                </div>
                <?php
                    $data = new WP_Query(array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'post_parent'    => get_page_by_path('visit/hotels')->ID,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order'
                    ))
                ?>
                <div class="col-lg-3">
                    <img class="svgimg 2x" src="<?php echo IMG_URL; ?>/icon-hotel.svg" alt=""></i><br><br>
                    <div class="site-text">
                        <?php while($data->have_posts()): $data->the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php echo page_content('visit/hotels'); ?>
                    </div>
                </div>

                <?php
                    $data = new WP_Query(array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'post_parent'    => get_page_by_path('visit/restaurants')->ID,
                        'order'          => 'ASC',
                        'orderby'        => 'menu_order'
                    ))
                ?>
                <div class="col-lg-3">
                    <img class="svgimg 2x" src="<?php echo IMG_URL; ?>/icon-resturant.svg" alt=""><br><br>
                    <div class="site-text">
                        <?php while($data->have_posts()): $data->the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php echo page_content('visit/restaurants'); ?>
                    </div>
                </div>
            </diiv>
        </div>
    </section>
</div><!-- .wrap -->

<?php get_footer();