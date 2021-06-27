<?php get_header(); ?>

<div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-3 ">

                <div class="col-md-12 sidebar">
                    <h4 class="pt-3">Product Category</h4>
                    <div class="ps-2">

                    <?php 
                    $product_categories = [
                        'Deisel Forklift',
                        'Electric Forklift',
                        'Lithuim Stacker',
                        'Pallet truck',
                        'VNA',
                        'Towing tracktors',
                        

                    ];
                    foreach ($product_categories as $key => $category) {
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="<?php echo 'cat-'.$key; ?> ">
                            <label class="form-check-label" for="<?php echo 'cat-'.$key; ?>">
                            <?php echo $category; ?> 
                            </label>
                        </div>
                    <?php } ?>

                    </div>
                    <h4 class="pt-3">Citycart</h4>
                    <div class="ps-2">
                    <?php 
                    $product_categories = [
                        'Cargo vehicles',
                        'Service vehicles',
                        'Passenger vehicles',
                        'shuttling buses',
                        
                        

                    ];
                    foreach ($product_categories as $key => $category) {
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="<?php echo 'city-'.$key; ?> ">
                            <label class="form-check-label" for="<?php echo 'city-'.$key; ?>">
                            <?php echo $category; ?> 
                            </label>
                        </div>
                    <?php } ?>

                    </div>
                    <h4 class="pt-3">Brands</h4>
                    <div class="ps-2">

                    <?php 
                   
                     
                    $product_brands = [
                        'Mitsubishi Forklift ',
                        'Heli Forklift',
                        'Noblelift Forklift',
                    ];
                    foreach ($product_brands as $key => $brand) {
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="<?php echo 'brand-'.$key ?>">
                            <label class="form-check-label" for="<?php echo 'brand-'.$key ?>">
                                    <?php echo $brand ?>
                            </label>
                        </div>
                    <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mt-3 mb-1">Corporate Product Line</h3>
                    </div>
                </div>
                <div class="row  mt-4">
                    

                    <?php  
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 10,
                    );
                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post();
                        global $product;
                        echo '<div class="col-md-3">
                            <a href="/product-details/">' . woocommerce_get_product_thumbnail().'</a>
                            <h6 class="mt-2 text-center" style="font-size: 15px;">'.get_the_title().'</h6>
                        </div>';
                        
                    endwhile; ?>

                </div>
            </div>
        </div>

    </div>


<?php get_footer();  ?>
