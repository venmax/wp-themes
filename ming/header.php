<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=1000">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if ( !is_home() ) : ?>
	<link rel="start" href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?> Home" />
<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
		<div id="title" class="siteName">
			<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>
		<nav id="topnav">
			<span class="toggle"></span>
			<ul>
				<?php wp_nav_menu( array( 'show_home' => 'Home','container' => ' ','items_wrap' =>'%3$s', 'theme_location' => 'primary') ); ?>
			</ul>
		</nav><!-- #catnavi -->

<div class="search" id="search-container">
		<span class="search-toggle"></span>
        <div class="search-inner hide">
			<form action="<?php echo esc_url( home_url('/') ); ?>" id="search" name="search">
					<input id="q" name="s" placeholder="Search" speech="" type="text" x-webkit-speech="">
			</form>
		</div>
</div>
<div class="clear"></div>
</div>