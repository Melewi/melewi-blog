<?php get_header(); ?>
 
<div class="page">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content('more?'); ?>
	<?php endwhile; ?>
<?php else : ?>

<?php _e("Sorry but the page you are requesting for cannot be found. Maybe it's still under construction. "); ?>

<?php endif; ?>
 

</div>
 <?php get_sidebar(); ?>
 <?php get_footer(); ?>