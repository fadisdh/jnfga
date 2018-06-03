<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap site-page-news">
    <section class="slider" style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'header') : IMG_URL . '/header-collection.jpg'; ?>)">
        <div class="content container">
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php
        $countries_raw = get_terms(array(
            'taxonomy' => 'countries',
            'hide_empty' => false
        ));
        $countries = array();
        sort_terms_hierarchicaly($countries_raw, $countries);
    ?>
    <section class="site-section">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('View By Country', 'عرض الدول'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="link-list color-purple">
                <div class="row">
                    <?php foreach($countries as $country_group): ?>
                    <div class="col-lg-3">
                        <h3 class="bold"><?php trans_term($country_group); ?></h3>
                        <ul>
                            <?php foreach($country_group->children as $country): ?>
                            <li><a href="<?php echo get_term_link($country); ?>"><?php trans_term($country); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $artists = new WP_Query(array(
            'post_type' => 'artist',
            'post_parent' => 0,
            'posts_per_page' => -1
        ));
    ?>
    <section class="site-section purple filterable" data-action="a">
        <div class="container">
            <div class="section-header white">
                <h3 class="title"><?php trans('View By Artist', 'عرض الفنانون (بالأبجدية الإنجليزية)'); ?></h3>
            </div>
        </div>
        <div class="container">
            <div class="action-list">
                <a href="" class="action active" data-action="a">A</a>
                <a href="" class="action" data-action="b">B</a>
                <a href="" class="action" data-action="c">C</a>
                <a href="" class="action" data-action="d">D</a>
                <a href="" class="action" data-action="e">E</a>
                <a href="" class="action" data-action="f">F</a>
                <a href="" class="action" data-action="g">G</a>
                <a href="" class="action" data-action="h">H</a>
                <a href="" class="action" data-action="i">I</a>
                <a href="" class="action" data-action="j">J</a>
                <a href="" class="action" data-action="k">K</a>
                <a href="" class="action" data-action="l">L</a>
                <a href="" class="action" data-action="m">M</a>
                <a href="" class="action" data-action="n">N</a>
                <a href="" class="action" data-action="o">O</a>
                <a href="" class="action" data-action="p">P</a>
                <a href="" class="action" data-action="q">Q</a>
                <a href="" class="action" data-action="r">R</a>
                <a href="" class="action" data-action="s">S</a>
                <a href="" class="action" data-action="t">T</a>
                <a href="" class="action" data-action="u">U</a>
                <a href="" class="action" data-action="v">V</a>
                <a href="" class="action" data-action="w">W</a>
                <a href="" class="action" data-action="x">X</a>
                <a href="" class="action" data-action="y">Y</a>
                <a href="" class="action" data-action="z">Z</a>
            </div>
            <div class="link-list artists">
                <div class="multicol4 color-white multicol0-m center-m">
                    <ul>
                        <?php while($artists->have_posts()): $artists->the_post(); ?>
                        <li data-filter="<?php echo strtolower(substr(get_the_title(), 0, 1)); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $publications = new WP_Query(array(
            'post_type' => 'publication',
            'posts_per_page' => -1
        ));
    ?>
    <section class="site-section news-section filterable">
        <div class="container">
            <div class="section-header">
                <h3 class="title"><?php trans('Our Publications', 'منشوراتنا'); ?></h3>
                <div class="actions">
                    <a href="" class="action outline active" data-action=""><?php trans('All', 'الجميع'); ?></a>
                    <a href="" class="action" data-action="available"><?php trans('Available', 'متوفر'); ?></a>
                    <a href="" class="action green" data-action="out"><?php trans('Out of Print', 'غير متوفر'); ?></a>
                </div>
            </div>
        </div>
        <div class="container hd">
            <div class="actions center-m">
                <a href="" class="action outline active" data-action=""><?php trans('All', 'الجميع'); ?></a>
                <br>
                <a href="" class="action" data-action="available"><?php trans('Available', 'متوفر'); ?></a>
                <a href="" class="action green" data-action="out"><?php trans('Out of Print', 'غير متوفر'); ?></a>
            </div>
            <div class="s15"></div>
        </div>
        <div class="container">
            <div class="box-list">
                <div class="row">
                    <?php while($publications->have_posts()): $publications->the_post(); ?>
                    <?php $availability = get_field('availability'); ?>
                    <div class="col-lg-3 item" data-filter="<?php echo $availability; ?>">
                        <a class="box no-hover" <?php echo $availability != 'available' ? 'green' : '' ?>">
                            <div class="img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="content">
                                <h3 class="big"><?php trans_field('author'); ?></h3>
                                <div class="space3"></div>
                                <h3 class="vbig"><?php the_title(); ?></h3>
                                <div class="space3"></div>
                                <div class="small"><?php the_field('year'); ?></div>
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

</div><!-- .wrap -->

<?php get_footer();