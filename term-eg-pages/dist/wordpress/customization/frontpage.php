<?php get_header(); ?>
 <?php echo do_shortcode('[rev_slider alias="main"]'); // change the shortcode here ?>

<div class="container pt-5">
      <div class="row">
        <div class="col-md-6">
          <div class="img-card">
            <img
              src="https://images.pexels.com/photos/274108/pexels-photo-274108.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940 "
              alt=""
              class="img-fluid"
            />
            <div class="mask"></div>
            <div class="card-title">
            <a href="/indev-filter/">
                <h3>Indevidual Product Line</h3>

              </a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="img-card">
            <img
              src="https://images.pexels.com/photos/2523921/pexels-photo-2523921.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940 "
              alt=""
              class="img-fluid"
            />
            <div class="mask"></div>
            <div class="card-title">
              <a href="/corp-filter/">
                <h3>Corporate Product Line</h3>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="brands bg-light">
  <div class="container pt-5 mt-5  pb-5">
      <h3 class="slider-title">Brands</h3>
      <div class="row mb-5">
                                <div class="col-md-12 text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/Mitsubishi-logo.png" alt="" width="100">
                                        </li>
                                        <li class="list-inline-item ms-1 me-4">
                                            <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/heli.png" alt="" width="100">
                                        </li>
                                        <li class="list-inline-item">
                                            <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/noblelift.png" alt="" width="100">
                                        </li>
                                    </ul>
                                </div>
                            </div>
    </div>
  </div>
    <div class="parallax" style="background-image: url(http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/parallax.jpg)">
      <div class="mask"></div>
      <div class="container">
        <div class="parallax-content">
          <h3 class="title">Parts and services</h3>
          <p>
            High quality material produced by Term backed by support of our
            expert consultants to fulfill a whole range of applications in the
            energy market.High quality material produced by Term backed by
            support of our expert consultants to fulfill a whole range of
            applications in the energy market.High quality material produced by
            Term backed by support of our expert consultants to fulfill a whole
            range of applications in the energy market.
          </p>
          <a href="#/" class="btn mainBg">Learn more</a>
        </div>
      </div>
    </div>
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
    <div class="container pt-4 mt-4">
      <h3 class="slider-title">individual Products | <a href="/indev-filter/" class="mainColor"><span>Show </span> <span style="black">room</span></a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($indev_categories as $key => $indevCatcategory) { ?>
        <a href="/indev-filter/?categories=<?php echo $indevCatcategory->name ?>" class="item">
          <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/product.jpg" alt="" />
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
    <div class="container pt-4 mt-4">
    <h3 class="slider-title">Corporate Products | <a href="/corp-filter/" class="mainColor"><span>Show </span> <span style="black">room</span></a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($corp_categories as $key => $corpCategory) { ?>
        <a href="/corp-filter/?categories=<?php echo $corpCategory->name ?>" class="item">
          <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/product.jpg" alt="" />
          <h4 class="mt-2 text-center"><?php echo $corpCategory->name ?></h4>
      </a>
      <?php } ?>
        

        
      </div>
    </div>
    
<?php get_footer();  ?>