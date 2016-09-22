<?php get_header(); ?>

<div id="featured"><?php dynamic_sidebar( 'blog' ); ?>
<a href="#blog-posts"><img src="/wp-content/themes/new-blog/img/arrow.png" class="featured-arrow" alt="arrow" /></a>
</div>


  <div id="intro">
   
        <h2>Product, Business + Design</h2>
      <p>Our collective thoughts on UX, UI and product design - from business models to startup methodology to user experience design, as well as our musings on remote working and everything in-between.</p>
      <p class="italics">from the Melewi team</p>
    
  </div>

  <div id="blog-posts"><div id="arrow">&#x25BC;</div><ul id="categories">
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


  

    <?php if (have_posts()) : ?>  
      <?php $post = $posts[0]; ?>

      <?php if (is_category()) { ?>       
        <h3><?php _e('Archive for '); echo single_cat_title(); ?></h3>

      <?php } elseif (is_day()) { ?>
        <h3><?php _e('Archive for '); the_time('F j, Y'); ?></h3>


      <?php } elseif (is_month()) { ?>
        <h3><?php _e('Archive for '); the_time('F, Y'); ?></h3>

      <?php } elseif (is_year()) { ?>
        <h3><?php _e('Archive for '); the_time('Y'); ?></h2>

      <?php } elseif (is_author()) { ?>
        <h3><?php _e('Author Archive'); ?></h3>

      <?php } elseif (is_search()) { ?>
        <h3><?php _e('Search Results'); ?></h3>

      <?php } ?>

</div>

      <div id="gridcontainer">
        <?php
        $counter = 1; //start counter

        $grids = 3; //Grids per row

        global $query_string; //Need this to make pagination work


        if(have_posts()) :  while(have_posts()) :  the_post(); 
        ?>
        <?php if($counter < 7) : ?>
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
            <h5> <?php the_author_posts_link(); ?>  / <?php the_time('F jS, Y') ?></h5>
          </div>

        <?php elseif($counter == 7) : ?>
          <div class="griditembig">
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
            <h5> <?php the_author_posts_link(); ?>  / <?php the_time('F jS, Y') ?></h5>
          </div>

        <?php elseif($counter == 8 || $counter == 9) : ?>

          <div class="griditemright">
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
            <h5> <?php the_author_posts_link(); ?> / <?php the_time('F jS, Y') ?></h5>       
          </div>

        

         
         <?php endif; ?>
          <?php $counter++; endwhile; ?>
        <div class="clear"></div>
          
        <?php endif;?>
      </div>

      <div id="pagination">

       
           <?php next_posts_link('&#8592; previous') ?>  

<?php if( is_paged() ) { ?>
<span class="slash">/</span>
<?php } ?>



       


 <?php previous_posts_link('next &#8594;') ?>
      </div>

    <?php else : ?>
      <b><?php _e('Not Found'); ?></b>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>


 <?php get_footer(); ?>