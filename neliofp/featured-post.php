<?php

/**
 * You must declare this variable in your templates. It contains the current
 * related post that is about to be displayed.
 */
global $post;

// Open link A tag that points to the post itself
$open_link = sprintf(
    '<a class="related_post_link" href="%s" title="%s">',
    get_permalink( $post->ID ),
    esc_attr( apply_filters( 'the_title', $post->post_title, $post->ID ) )
  );
$close_link = '</a>';

?>

<article class="post-<?php echo $post->ID; ?> post type-post status-publish entry" itemscope="itemscope"><?php
  if ( has_post_thumbnail( $post->ID ) ) { ?>
 
    <?php
	      $post_image_id = get_post_thumbnail_id();
	      if ($post_image_id) {
	        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'thumb-large', false);
	        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
	      }
	    ?>


		<div class="featured-image aligncenter" style="background: url('<?php echo $thumbnail; ?>') no-repeat center;">
			<div class="black"></div>

			<div class="featured-post">
    			<div class="categories">
			       FEATURED POST
      			</div>

    			<h1 class="entry-title">
			      <?php
			      echo $open_link;
			      echo apply_filters( 'the_title', $post->post_title, $post->ID );
			      echo $close_link;
			      ?>
			    </h1>

     			<h5> <?php the_time('F jS, Y') ?></h5>
    			<a href="<?php echo get_permalink( $post->ID ); ?>" target="blank" class="featured-link">Read More</a>
  			</div>
		</div>
   

  <?php
  } ?>
  
</article>

