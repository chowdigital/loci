<?php /* Template Name: Pagination */ get_header(); ?>


<main id="pagination-main" class="bg-craft">
      

<section class="blog-container container pt-6 pb-6">
        <div class="row">
        <div class="dark-header text-center">
          <h2>What's On</h2>
      </div>
        


            <div class="col-12">

                 <!--Grid row-->
  <div class="blog-post-container single-post-body">


<!--- my loop with Pagenation -->
<?php 
//get the current page
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

//pagination fixes prior to loop
$temp =  $query;
$query = null;

//custom loop using WP_Query
$query = new WP_Query( array( 
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'ASC' 
) ); 

//set our query's pagination to $paged
$query -> query('cat=1&posts_per_page=13'.'&paged='.$paged);

if ( $query->have_posts() ) : 
 while ( $query->have_posts() ) : $query->the_post();
  ?>
      <div class="blog-post-list pb-5">
        <div class="row">
          <a href="<?php echo get_permalink() ?>" class="border bg-craft highlight-overlay" >
            <div  class="square-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>

          </a>
        <div class="blog-post-content">
            <h3 class="pt-4"> <?php the_title(); ?> </h3>
            <div class="" >  <?php the_excerpt(); ?>  
            </div>
            <a class="a-hover" href="<?php echo get_permalink() ?>">
              <button type="button" class="btn btn-primary">more</button>
            </a>  
          </div>
        </div>
      </div>
<?php endwhile;?>
</div>

<?php //pass in the max_num_pages, which is total pages ?>
<div class="pagenav">
  <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages) ?> </div>
  <div class="alignright"><?php next_posts_link('Next', $query->max_num_pages) ?> </div>


</div>

<?php endif; ?>

<?php //reset the following that was set above prior to loop
$query = null; $query = $temp; ?>
<!--- my loop with Pagenationend  -->
</div>
</div>
</section>

 
 



</main>
 
<?php get_footer(); ?>


