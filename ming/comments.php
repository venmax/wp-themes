<?php
/**
 * @package WordPress
 * @subpackage ming
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'ink') ?></p>
	<?php
		return;
	}
	$oddcomment = 'alt';
	/* to split comment and pings */
	$trackpingCount = 0;
	$commentCount = 0;	
	if ($comments) :
		foreach ($comments as $comment) {
			$type = get_comment_type();
			switch( $type ) {
				case 'trackback' :
				case 'pingback' :
					$trackpingArray[$trackpingCount++] = $comment;
					break;
				default :
					$commentArray[$commentCount++] = $comment;
			}
		}
	endif;
?>

<!-- You can start editing here. -->

	<div id="comments">
		<h2 id="commentsx"><?php _e( 'Comments: ', 'ming' ); ?><?php echo $commentCount; ?></h2>
	</div>

<?php if ( have_comments() ) : ?>
	
	<ol class="commentlist" id="thecomments">
	<?php wp_list_comments('type=comment'); ?>
	</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="page_navi">

               <?php paginate_comments_links();?>

	</div><!-- .navigation -->		

<?php endif; // check for comment navigation ?>
<?php endif; ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.', 'ming' ); ?></p>

	<?php endif; ?><?php if ('open' == $post->comment_status): ?>
<?php comment_form(); ?>
<?php endif; ?>
<div class="clear"></div>
<?php if ($trackpingCount > 0 ) : //display trackback?>
			<div class="section" id="trackback">
				<h2><?php if ('open' == $post->ping_status) : _e('trackbacks','ming'); else : _e('trackbacks(closed)','ming'); endif; ?>:<span class="count"><?php echo $trackpingCount; ?></span></h2>

		<?php if ($trackpingCount > 0) : ?>
				<dl class="log">
			<?php foreach ($trackpingArray as $comment) : ?>
					<dt id="ping<?php comment_ID() ?>"><span class="name"><?php printf(__("%s from %s"), get_comment_type(), get_comment_author_link()); ?></span> <span class="date"><?php comment_date( get_option( 'date_format' )); ?></span></dt>

		<?php endforeach; ?>
				</dl>
		<?php endif; ?>
			</div>
<?php endif; // end of trackback ?>