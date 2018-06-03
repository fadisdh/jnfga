<?php get_header(); ?>

<div class="wrap site-page-news">
    <section class="slider">
        <div class="content container">
            <div class="text">
				<h2 class="slider-title">“<?php echo $_GET['s']; ?>”</h2>		
				<p class="bold"><?php global $wp_query; trans($wp_query->found_posts.' results found', 'تم العثور على '.$wp_query->found_posts.' نتائج'); ?></p>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="section-header">
				<h3 class="title"><?php trans('Search Results', 'نتائج البحث'); ?></h3>
			</div>
		</div>
		<div class="container">
			<div class="search-results">
				<?php while(have_posts()): the_post(); ?>
					<div class="result">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<span>></span>
						<?php if(get_post_type() == 'artist'){ ?>
							<?php global $post; if($post->post_parent){ $parent = get_page($post->post_parent) ?>
								<a href="<?php echo get_page_link($parent->ID); ?>"><?php echo apply_filters('the_title', $parent->post_title, $parent->ID); ?></a>
								<span>></span>	
							<?php }//endif ?>
							<a href="<?php echo site_url('/collection'); ?>"><?php trans('Permenant Collection', 'المجموعة الدائمة'); ?></a>
						<?php }elseif(get_post_type() == 'event'){ ?>
							<a href="<?php echo site_url('/programs'); ?>"><?php trans('Program', 'البرنامج'); ?></a>
						<?php }//enif ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
    </section>
</div><!-- .wrap -->

<?php get_footer();