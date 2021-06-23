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

    <div class="container pt-4 mt-4">
      <h3 class="slider-title">Brands</h3>
      <div class="owl-carousel owl-theme brand-slider">
        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
        </div>

        <div class="item">
          <img src="https://via.placeholder.com/200" alt="" />
          <h4 class="mt-2 text-center">Brand Title</h4>
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
  
    <?php 
                    $args = array(
                       'hierarchical' => 1,
                       'show_option_none' => '',
                       'hide_empty' => 0,
                       'parent' => 89,
                       'taxonomy' => 'product_cat'
                   );
                    $indevCategories = get_categories( $args );




?>   
            
    <div class="container pt-4 mt-4">
      <h3 class="slider-title">individual Products | <a href="/indev-filter/" class="mainColor"><span>Show </span> <span style="black">room</span></a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($indevCategories as $key => $indevCategory) { ?>
        <a href="/corp-filter/?categories=<?php echo $indevCategory->name ?>" class="item">
          <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/product.jpg" alt="" />
          <h4 class="mt-2 text-center"><?php echo $indevCategory->name ?></h4>
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
                    $all_categories = get_categories( $args ); ?>
    <div class="container pt-4 mt-4">
    <h3 class="slider-title">Corporate Products | <a href="/corp-filter/" class="mainColor"><span>Show </span> <span style="black">room</span></a> </h3>
      <div class="owl-carousel owl-theme indev-slider">
      <?php foreach ($all_categories as $key => $corpCat) { ?>
        <a href="/corp-filter/?categories=<?php echo $corpCat->name ?>" class="item">
          <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/product.jpg" alt="" />
          <h4 class="mt-2 text-center"><?php echo $corpCat->name ?></h4>
      </a>
      <?php } ?>
        

        
      </div>
    </div>
    
<?php get_footer();  ?>