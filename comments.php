<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p><?php _e("This post is password protected. Enter the password to view comments."); ?></p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background, thanks Kubrick */
		$oddcomment = 'alt';
?>



<!-- You can start editing here. -->
<?php get_header(); ?>

<?php if ($post-> comment_status == "open" && $post->ping_status == "open") { ?>
	<p><a href="<?php trackback_url(display); ?>">Trackback this post</a> &nbsp;|&nbsp; <?php comments_rss_link('Subscribe to the comments via RSS Feed'); ?></p>
<?php } elseif ($post-> comment_status == "open") {?>
	<p><?php comments_rss_link('Subscribe to the comments via RSS Feed'); ?></p>
<?php } elseif ($post->ping_status == "open") {?>
	<p><a href="<?php trackback_url(display); ?>">Trackback this post</a></p>
<?php } ?><hr></hr><h4><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h4>

<?php if ( $comments ) : ?>
<ol id="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID() ?>">
		<span class="gravatar"><?php echo get_avatar( $comment, 50 ); ?></span><span class="person"><?php comment_author_link() ?></span><br /><span class="commentdate"><?php comment_date() ?> at <?php comment_time() ?></span>
		<div class="clear"></div>
<p><?php comment_text() ?></p>
		</li>
	<?php endforeach; ?>

</ol>

<h4>POST A COMMENT</h4>

<div id="connectform"><?php do_action( 'social_connect_form' ); ?></div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post-> comment_status) : ?> 
		<?php /* No comments yet */ ?>
		
	<?php else : // comments are closed ?>
		<?php /* Comments are closed */ ?>
		<p><?php _e('Comments are closed.'); ?></p>
		
	<?php endif; ?>
	
<?php endif; ?>

<?php if ('open' == $post-> comment_status) : ?>

	
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	
		<p><?php _e('You must be'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in'); ?></a> <?php _e('to post a comment.'); ?></p>
	
	<?php else : ?>
	
		<div align="left" id="post"><form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
			<?php if ( $user_ID ) : ?>
			
				<p><?php _e('Logged in as'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php _e('Logout'); ?> &raquo;</a></p>

			<?php else : ?>
				
			
			<input type="text" class="input" name="author" placeholder="name (required)" id="author" value="<?php echo $comment_author; ?>" size="50" tabindex="1" />
			
			<input type="text" class="input" name="email" placeholder="e-mail (required)" id="email" value="<?php echo $comment_author_email; ?>" size="50" tabindex="2" />
			
			<input type="text" class="input" name="url" placeholder="website" id="url" value="<?php echo $comment_author_url; ?>" size="50" tabindex="3" />
			
			


			<?php endif; ?>


			<p>
			<textarea name="comment" class="textarea" id="comment" cols="80" rows="6" tabindex="2"></textarea>
				
			<br />
			<input class="button" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment'); ?>" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			</p>
				
			<?php do_action('comment_form', $post->ID); ?>
			</form>



		</div>





	<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

<!-- END -->