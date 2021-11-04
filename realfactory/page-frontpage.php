<?php get_header(); ?>
 <?php echo do_shortcode('[rev_slider alias="main"]'); // change the shortcode here ?>

<div class="container-fluid p-3">
      <div class="row">
        <div class="col-md-6 pe-1">
          <div class="img-card">
            <img
              src="<?php the_field('indevidual_product_line_image'); ?>"
              alt=""
              class="img-fluid"
            />
            <div class="mask"></div>
            <div class="card-title">
            <a href="/indev-filter/">
                <h3><?php the_field('indevidual_product_line_text'); ?></h3>

              </a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="img-card">
            <img
             src="<?php the_field('corporate_product_line_image'); ?>"
              alt=""
              class="img-fluid"
            />
            <div class="mask"></div>
            <div class="card-title">
              <a href="/corp-filter/">
                <h3><?php the_field('corporate_product_line_text'); ?></h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
		<?php $images = get_field('brands') ?>
							<?php if($images): ?>
  <div class="brands bg-light mb-3">
  <div class="container p-4">
     
      <div class="row ">
                                <div class="col-md-12 text-center">
                                    <ul class="list-inline m-0">
								
									<?php foreach($images as $key=>$image): ?>
                                        <li class="list-inline-item">
                                            <img src="<?php echo $image['sizes']['large'] ?>" alt="" width="100">
                                        </li>
                                       <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
    </div>
  </div>
<?php endif; ?>
<?php
$paralax = get_field('paralax');
if( $paralax ): ?>
    <div class="parallax" style="background-image: url(<?php echo $paralax['image'] ?>">
      <div class="mask"></div>
      <div class="container">
        <div class="parallax-content">
          <h3 class="title"><?php echo $paralax['title']; ?></h3>
          <p>
            <?php echo $paralax['content']; ?>
          </p>
          <a href="<?php echo $paralax['button_url']; ?>" class="btn mainBg"><?php echo $paralax['button_name']; ?></a>
        </div>
      </div>
    </div>
<?php endif; ?>
    <?php $products = [1,2,3,4,5,6,7,8]; ?>
    <?php 
                    $args = array(
                       'hierarchical' => 1,
                       'show_option_none' => '',
                       'hide_empty' => 0,
                       'parent' => 89,
                       'taxonomy' => 'product_cat'
                   );
                    $indev_categories = get_categories( $args );




?>               
    <div class="container pt-1 mt-4">
      <h3 class="slider-title" style="font-size: 30px;"> <a href="/indev-filter/" >  <span style="color: #666666;">individual</span> <span class="mainColor">Applications</span></a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($indev_categories as $key => $indevCatcategory) { 
     ?>
        <a href="/indev-filter/?categories=<?php echo $indevCatcategory->name ?>" class="item">
          <?php woocommerce_subcategory_thumbnail($indevCatcategory); ?>
          <h4 class="mt-2 text-center"><?php echo $indevCatcategory->name ?></h4>
      </a>
      <?php } ?>
      </div>
    </div>
 <?php 
                    $args = array(
                       'hierarchical' => 1,
                       'show_option_none' => '',
                       'hide_empty' => 0,
                       'parent' => 88,
                       'taxonomy' => 'product_cat'
                   );
                    $corp_categories = get_categories( $args );




?>
<?php 
add_action( 'woocommerce_after_shop_loop_item_title', 'bbloomer_show_all_subcats', 2 );
 
function bbloomer_show_all_subcats() {
   global $product;
   $cats = get_the_terms( $product->get_id(), 'product_cat' );
   if ( empty( $cats ) ) return;
   foreach ( $cats as $term ) {
      // If parent cat ID = 116 echo subcat name...
      if ( $term->parent == 88 ) {
         echo $term->name;
		  print_r($term);
      }
   }
}
?>
    <div class="container pt-1 mt-4">
    <h3 class="slider-title" style="font-size: 30px;"> <a href="/corp-filter/"  > <span style="color: #666666;">Corporate</span> <span class="mainColor">Applications</span> </a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($corp_categories as $key => $corpCategory) { ?>
        <a href="/corp-filter/?categories=<?php echo $corpCategory->name ?>" class="item">
          <?php woocommerce_subcategory_thumbnail($corpCategory); ?>
          <h4 class="mt-2 text-center"><?php echo $corpCategory->name ?></h4>
      </a>
      <?php } ?>
        

        
      </div>
    </div>
    
<?php get_footer();  ?>