<?php get_header(); ?>
<div id="content" class="single">
	<div id="main">
	<p class="topicPath"><a href="<?php echo home_url(); ?>"><?php _e('Home', 'summ'); ?></a> &gt; <?php the_category(' | ') ?> &gt; <span class="current"><?php the_title(); ?></span></p>		<ul class="flip" id="flip1">		<li class="newer"><?php previous_post_link('%link',__('previous','summ'), TRUE); ?> </li>|		<li class="older"><?php next_post_link('%link',__('next','summ'), TRUE); ?> </li>		</ul>
	<div class="section entry" id="entry<?php the_ID(); ?>">
	<?php while(have_posts()) : the_post(); ?>
		<div class="post">
			<h1><?php the_title(); ?></h1>				<div class="singleinfo">				<span class="dateinfo"><?php the_time( get_option( 'date_format' )); ?></span>				<span class="catinfo"><?php comments_popup_link(); ?></span>				</div>
			<div class="entry"><?php the_content(); ?>
			</div>
				<?php wp_link_pages('<p><strong>'.__('Pages','summ').':</strong> ', '</p>', 'number'); ?>
			<p class="infobottom">					 <?php if(has_tag()) : ?>Tags: 	<?php $posttags = get_the_tags();									if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ' '; }} ?><?php endif; ?>							<?php edit_post_link(__('Edit', 'summ'), ' &#124; ', ''); ?>			</p>
		</div>
			<?php endwhile; ?>
		<div class="related">
		
			<?php if(function_exists('st_related_posts')) :{  st_related_posts('number=10&include_page=false&order=count-desc'); } ?>			<?php else: ?>				<?php if (function_exists('get_most_viewed')): ?>					<ul>						<?php get_most_viewed(); ?>					</ul>				<?php endif; ?>			<?php endif ?>
		</div>
			<div class="flip">
	<div class="prevpost"><?php previous_post_link(' %link ') ?></div>
	<div class="nextpost"><?php next_post_link(' %link ') ?></div>
	</div>
<?php comments_template(); ?>

	</div><!-- section entry -->
	</div><!-- main -->
	<?php	get_sidebar(); ?>	
	<?php	get_footer(); ?>