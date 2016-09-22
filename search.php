<?php get_header(); ?>


<div class="content">
	<h3>Search results</h3>
	
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
		<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<div class="meta">
			<?php the_time('m') ?>.<?php the_time('d') ?>.<?php the_time('y') ?> / Filed Under 		
			<?php the_category(', ') ?> /
			<?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('<b>Comments off</b>')); ?>
			</div>

		<div class="clear"></div>

		<?php the_excerpt() ?> 
		<div class="readmore"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More &raquo;</a></div>

<hr></hr>

		<?php comments_template(); ?>
		<!--<?php trackback_rdf(); ?>-->
	<?php endwhile; ?>

	<div id="clear"></div>


<?php next_posts_link('&laquo; Older Entries') ?> &bull; <?php previous_posts_link('Newer Entries &raquo;') ?>		
<?php else : ?>
	<p><?php _e("Sorry but no post matched your keywords. Try another one."); ?></p>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>