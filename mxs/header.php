<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<?php $mxs_options = get_option('mxs_theme_options');?>
	<?php wp_head(); ?>
		<?php if ($mxs_options['logo_src']!='') { ?>
			<a class="logo_img" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $mxs_options['logo_src']; ?>" /></a>
		<?php } else { ?>
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		<?php } ?>
		</h1>
		<?php if ( !$mxs_options['desc']) {?>
		<?php } ?>	
</div><div class="clear"></div>
		</div>
		<div class="clear"></div>
