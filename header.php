<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site">
	<div id="search-form" class="search-page">
		<div class="container">
			<div class="header row">
				<div class="col-9">
					<div class="logo"><img src="<?php echo IMG_URL;?>/logo.png" alt="JNGFA"></div>
				</div>
				<div class="col-3 <?php echo ar() ? 'text-left' : 'text-right'; ?>">
					<a href="javascript:void(0);" class="close search-toggle" search-toggle><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="search">
				<form action="<?php echo site_url('/'); ?>">
					<div class="input">
						<input type="text" name="s" placeholder="<?php trans('Search here...', 'ابحث هنا...'); ?>" autocomplete="off">
						<i class="fas fa-search"></i>
					</div>
					<div class="btn-container">
						<button type="submit">SEARCH</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="mobile-menu" class="mobile-menu hd">
		<div class="mobile-menu-wrapper">
			<a href="javascript:void(0);" class="close-menu menu-toggle"><i class="fa fa-times"></i></a>
			<div class="menu">
				<?php
					wp_nav_menu(array(
						'menu' => 'main',
						'container' => null
					));
				?>
			</div>

			<div class="submenu">
				<ul>
					<li>
						<a href="javscript:void(0);" search-toggle>Search &nbsp; <i class="fas fa-search"></i></a>
						<a href="<?php echo ar() ? '?lang=en' : '?lang=ar'; ?>">EN / عربي</a>
					</li>
				</ul>
			</div>

			<div class="social">
				<ul>
					<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
					<li><a href=""><i class="fab fa-twitter"></i></a></li>
					<li><a href=""><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>

	<header id="site-header" class="site-header" role="banner">
		<div class="container">
			<div class="main-menu">
				<a href="<?php echo site_url('/'); ?>" class="logo"><img src="<?php echo IMG_URL;?>/logo.svg" alt="JNGFA"></a>
				<?php
					wp_nav_menu(array(
						'menu' => 'main',
						'container' => false,
						'menu_class' => 'hm'
					));
				?>
				<a id="menu-control" href="javascript:void(0);" class="menu-control menu-toggle hd"><i class="fas fa-bars"></i></a>
			</div>
			<div class="small-menu hm">
					<a href="javscript:void(0);" search-toggle><i class="fas fa-search"></i> <?php trans('Search', 'البحث'); ?></a>
					<a href="<?php echo ar() ? '?lang=en' : '?lang=ar'; ?>">EN / عربي</a>
			</div>
		</div>
	</header><!-- .site-header -->

	<div class="site-wrapper">
		<div class="site-main">
