<?php 
/**
 * @since ming 1.0.0
**/

get_header(); ?>
<div id="content">
	<div class="container">
		<div id="main">
			<div id="breadcrumb" itemprop="breadcrumb"><a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow"><?php _e( 'Home', 'ming' ); ?></a> / <?php the_category(' | ') ?>
			<div class="tria-more"><span class="icon"></span>
			<li class="more-cat">
				<span><?php _e( 'All categories', 'ming' ); ?></span>
				<ul>
					<?php wp_list_categories(array('depth'=>'1','title_li'=>''));?>
				</ul>	
			</li></div>/ <?php _e( 'the post', 'ming' ); ?>

			</div>
			<div class="section single">
				<div class="post">
				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="infometa author">
							By <?php the_author(); ?>
					</div>
					<div class="info">
						<div class="infometa time">
							<?php the_time( get_option( 'date_format' )); ?>
						</div>
						<div class="infometa cats">
							<?php the_category(', ');?>
						</div>
						
						<div class="infometa cmts">
							<?php comments_popup_link( '0','1','%' ); ?>
						</div>
					</div>
					
					<div class="body">
						<?php the_content(); ?>
					</div>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				<?php endwhile;endif; ?>
				</div>
				<div class="clear"></div>
				<?php if (has_tag()) {the_tags('  <span class="tags">', ' , ', '</span>'); } ?>
				<div class="flip">
					<?php previous_post_link('<div class="prevpost">%link</div>'); ?>
					<?php next_post_link('<div class="nextpost">%link</div>'); ?>
				</div>
				<div class="clear"></div>
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