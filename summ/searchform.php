<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
<div>
    <input type="text" name="s" id="s" value="<?php echo __('Search', 'summ'); ?>" onfocus="if (this.value == '<?php echo __('Search', 'summ'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo __('Search', 'summ'); ?>';}" />
	<input type="submit"  id="searchsubmit" />
</div>
</form>