<?php
/**
 * @since ming 1.0.0
**/
get_header(); ?>
<div id="content">
	<div class="container">
	<div id="main">
		<div class="section archive">
			<h1 class="wp-caption page-title"><?php printf( __( ' Search result: %s', 'ming' ), '<span>'.the_search_query().'</span>' ); ?></h1>
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<article class="post">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ming' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<div class="infometa author">
							<?php the_time( get_option( 'date_format' )); ?>
							<span class="seprator">/</span>
							<?php comments_popup_link(); ?>
					</div>
					<?php the_content(); ?>
				</article>	
			<?php endwhile;endif; ?>	
		</div><!-- section entry -->
	</div><!-- main -->
	<div id="minisidebar" class="col minisidebar">
		<?php get_sidebar('left'); ?>
	</div>
	</div>
</div><!-- content -->
<div id="sidebar">
<?php	get_sidebar(); ?>
<div class="clear"></div>
	<?php	get_footer(); ?>