<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-about">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-about.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <section class="site-section full-img" style="background-image: url(<?php echo IMG_URL; ?>/header-about2.jpg)">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('About Us', 'عن المتحف الوطني'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="color-purple"><?php echo page_title('about/art'); ?></h1>
                    <div class="site-text multicol2 color-purple">
                        <?php echo page_content('about/art'); ?>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-text multicol4 multicol0-m color-purple">
                        <?php echo page_content('about/content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section purple">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('Board of Trustees', 'مجلس الأمناء'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="site-text">
                        <?php echo page_content('about/trustees-text'); ?>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <div class="site-text">
                        <div class="space-m"></div>
                        <?php echo page_content('about/trustees-president'); ?>
                        <br>
                    </div>
                    <div class="site-text multicol2">
                        <?php echo page_content('about/trustees-list'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $members = new WP_Query(array(
            'post_type' => 'member',
            'posts_per_page' => -1
        ));
    ?>
    <section class="site-section filterable" data-count="8">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Our Team', 'فريق المتحف الوطني'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($members->have_posts()): $members->the_post(); ?>
                    <div class="col-lg-3 item" data-filter>
                        <a class="box no-hover purple">
                            <div class="img" style="background-image:url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/default-team.jpg'; ?>)"></div>
                            <div class="content">
                                <h3 class="vbig"><?php the_title(); ?></h3>
                                <div class="big"><?php trans_field('position'); ?></div>
                                <div class="small"><?php trans_field('email'); ?></div>
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

    <section class="site-section nom nop">
        <div class="abs">
            <div class="container">
                <div class="section-header">
                    <h3 class="title"><?php trans('Contact Us', 'تواصلوا معنا'); ?></h3>
                </div>
            </div>
        </div>
        <div class="abs">
            <div class="section-header-space"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="social-icons wrapper purple hm">
                                <br>
                                <ul>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <br>
                            </div>
                            <div class="site-text color-purple hm">
                                <?php echo page_content('about/contact'); ?>
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
                    <div class="social-icons wrapper purple">
                        <br>
                        <ul>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    <br>
                    </div>
                    <div class="site-text color-purple">
                        <?php echo page_content('about/contact'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 full-img" style="background-image: url(<?php echo IMG_URL; ?>/contact.jpg)"></div>
        </div>
    </section>
</div><!-- .wrap -->

<?php get_footer();
