<?php
/**
 * @since ming 1.0.0
**/
get_header(); ?>
<div id="content">
	<div class="container">
		<div id="main">
			<div class="section archive">
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<h1 class="wp-caption entry-title"><?php the_title(); ?></h1>
				<div class="post">
					<?php the_content(); ?>
				</div>
				<?php endwhile;endif; ?>

				<?php comments_template(); ?>
			</div><!-- section entry -->
		</div><!-- main -->
		<div id="minisidebar" class="col minisidebar">
			<?php get_sidebar('left'); ?>
		</div>
	</div>
</div><!-- content -->
<div id="sidebar">
<?php get_sidebar(); ?>
<div class="clear"></div>
	<?php	get_footer(); ?>