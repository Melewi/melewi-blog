<?php get_header(); ?>

</div>



   
  


<div class="single1">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<div class="social-links--global">
			<p><?php if(function_exists('the_views')) { the_views(); } ?></p>
			<h6>Share</h6>
		  	<ul>
				<li><a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook"><span class="icon icon-facebook"></span></a> </li>
				<li> <a href="#" onclick="fbs_click();" ><span class="icon icon-twitter"></span></a>
				</li>
<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=blog.melewi.net" target="_blank"><span class="icon icon-linkedin2"></span></a></li>
			</ul>
		</div>
 
 		<?php
	      $post_image_id = get_post_thumbnail_id();
	      if ($post_image_id) {
	        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
	        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
	      }
	    ?>


		<div class="blog__background-image fixed-background" style="background: url('<?php echo $thumbnail; ?>') no-repeat;"></div>


		<div class="blog-featured">
			<img src="<?php echo $thumbnail; ?>" />
		</div>


		<div class="post-single">
			<div class="categories">
          		<?php the_category(', ') ?>
        	</div>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			 <h5> <?php the_author_posts_link(); ?> <span class="avatar-main"><?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ) ?></span> <?php the_time('F jS, Y') ?></h5>
			<p><?php the_content(); ?></p>

<div class="social-links--global-mobile">
			<p><?php if(function_exists('the_views')) { the_views(); } ?></p>
			
		  	<ul><li>Share</li>
				<li><a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook"><span class="icon icon-facebook"></span></a> </li>
				<li> <a href="#" onclick="fbs_click();" ><span class="icon icon-twitter"></span></a>
				</li>
<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=blog.melewi.net" target="_blank"><span class="icon icon-linkedin2"></span></a></li>
			</ul>
		</div>
		</div>


		

		<div class="about-melewi">

			<div class="author-gen">
				<div class="author-pic"> <?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ) ?></div>
			    <div class="author-info">
			    	<h6>Written by</h6>
			      	<p class="melewi"> <?php the_author_posts_link(); ?></p>
			      	<p class="geo"><?php the_author_meta( 'description' ); ?></p>
			    </div>
				<div class="social-media">
					<?php 
					global $user_ID;
					if ( get_the_author_meta('ts_fab_facebook',$user_ID) ) { ?>
					<a class="meta-website" href="<?php the_author_meta('ts_fab_facebook',$user_ID); ?>" target="_blank"><span class="icon icon-facebook"></span></a>
					<?php } if ( get_the_author_meta('ts_fab_twitter',$user_ID) ) { ?>
					<a class="meta-website" href="<?php the_author_meta('ts_fab_twitter',$user_ID); ?>" target="_blank"><span class="icon icon-twitter"></span></a>
					<?php } if ( get_the_author_meta('ts_fab_linkedin',$user_ID) ) { ?>
					<a class="meta-website" href="<?php the_author_meta('ts_fab_linkedin',$user_ID); ?>" target="_blank"><span class="icon icon-linkedin2"></span></a>
					<?php } if ( get_the_author_meta('ts_fab_dribbble',$user_ID) ) { ?>
					<a class="meta-website" href="<?php the_author_meta('ts_fab_dribbe',$user_ID); ?>" target="_blank"><span class="icon icon-dribbble"></span></a>
  	  
  	    			<?php } ?>
  	    		</div>
			</div>

			<div class="melewi-logo">
				<img src="/wp-content/themes/new-blog/img/melewi-logo.jpg" width="80px" alt="melewi" />
			</div>

			<h6>About</h6>
			<p class="melewi">Melewi</p>
			<p>Melewi is a travelling product, UX, and UI design studio working with passionate people from 
				around the world. We work remotely and travel to be inspired, gain perspective, and build products 
				and businesses that speak to everyone, everywhere.</p>

			<p class="strong"><strong>Interested in collaborating with us?</strong></p>
			<p>Get in touch; we promise we're friendly!</p>
			<div class="contact-single">
				<a href="http://melewi.net#contact" target="_blank" class="button">TALK TO US</a>
			</div>
		</div>

		
			
			
		<?php endwhile; ?>
		<?php else : ?>			
		<?php _e("Sorry but the thing you are looking for is not here."); ?>
	<?php endif; ?>
</div>

<div class="clear"></div>

<div id="related">
	<div id="gridcontainer">
		<h3>More posts to feed your mind</h3>

		<?php $posts = get_posts('orderby=rand&numberposts=3'); foreach($posts as $post) { ?>
			<div class="griditemleft">
	            <div class="postimage">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('category-thumbnail'); ?></a>
		        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><div class="black"></div></a>
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