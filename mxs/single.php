<?php get_header(); ?>
	<div class="section entry" id="entry<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry"><?php the_content(); ?></div>
				<?php wp_link_pages(); ?>
				<span class="infobottom">