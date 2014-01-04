<?php get_header(); ?>
<div id="content">
	<div id="main">
	<div class="section entry" id="entry<?php the_ID(); ?>">
		<h2 class="center"><?php _e('Error 404 - Not Found','summ');?></h2>
		<?php get_search_form(); ?>
		<li id="archives">
			<h3><?php _e( 'Archives', 'summ' ); ?></h3>
			
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</li>
	</div><!-- section entry -->
	</div><!-- main -->
	<?php	get_sidebar(); ?>
	<?php	get_footer(); ?>