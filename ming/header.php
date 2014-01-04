<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=1000">
	<title>
	<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '|', true, 'right' );
		// Add the blog name.
		echo bloginfo('name');
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'ming' ), max( $paged, $page ) );
	?>
	</title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php	if ( !is_home() ) : ?>
	<link rel="start" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?> Home" />
<?php	endif; 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
		<div id="title" class="siteName">
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>
		<nav id="topnav">
				<ul>
					<?php wp_nav_menu( array( 'show_home' => 'Home','container' => ' ','items_wrap' =>'%3$s', 'theme_location' => 'primary') ); ?>
				</ul>
		</nav><!-- #catnavi -->

<div class="search" id="search-container">
          <div class="search-inner">
            <form action="<?php echo home_url(); ?>/" id="search" name="search">
            <div class="left"></div>
              <input id="q" name="s" placeholder="Search" speech="" type="text" x-webkit-speech="">
            <div class="right"></div>
			  <div id="search-btn"><input type="submit" id="gs" value="搜索"></div>
            </form>
          </div>
</div>
		<div class="clear"></div>
</div>