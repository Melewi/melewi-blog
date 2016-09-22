<?php get_header(); ?>

  <div id="intro">
   
        <h2>Product, Business + Design</h2>
      <p>Our collective thoughts on UX, UI and product design - from business models to startup methodology to user experience design, as well as our musings on remote working and everything in-between.</p>
      <p class="italics">from the Melewi team</p>
    
  </div>

   <div id="kk"><div id="arrow">&#x25BC;</div><ul id="categories">
    <li><a href="/">All</a> <?php echo wp_count_posts()->publish; ?></li>

    <?php $variable = wp_list_categories( array(
      'orderby'    => 'name',
      'echo' => false,
      'show_count' => true,
      'exclude'  => array(1),
      'title_li' => ''
      ) ); 
      $variable = preg_replace( '~\((\d+)\)(?=\s*+<)~', '$1', $variable );
      echo $variable;
    ?> </ul>
  </div>
</div>

<div id="error"><h1><?php _e('Not Found'); ?></h1>

<p>Sorry but the page you requested cannot be found. Please <a href="mailto:hello@melewi.net">contact us</a> if you think this is a broken link or if you have any concerns.</p>

</div>
  

<div id="related">
	<div id="gridcontainer">
		<h3>More posts to feed your mind</h3>

		<?php $posts = get_posts('orderby=rand&numberposts=3'); foreach($posts as $post) { ?>
			<div class="griditemleft">
	            <div class="postimage">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('category-thumbnail'); ?></a>
		
		        <div class="readmore"><a href="<?php the_permalink(); ?>" class="featured-link">Read More</a></div>
            </div>

	            <div class="categories">
	              <?php the_category(', ') ?>
	            </div>
	            
	            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	              <?php the_title(); ?></a>
	            </h3>
	            <h5><?php the_time('F jS, Y') ?></h5>
	        </div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>

 <?php get_footer(); ?>