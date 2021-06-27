<?php get_header(); ?>
<?php 
$categories = (isset($_GET['categories']) & $_GET['categories'] != '') ? explode(',',$_GET['categories']) : null ;
$brands = (isset($_GET['brands']) && $_GET['brands'] != '') ? explode(',',$_GET['brands']) : null ;
?>
<div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-md-3 ">
                <div class="col-md-12 sidebar">
                <h4 class="pt-3">Product Brand</h4>
                    <div class="ps-2">
                    <?php 
                    $all_brands = get_terms(array( 'taxonomy' => 'pwb-brand', 'parent' => 114));  
                    foreach ($all_brands as $brand) {
                        // if($brand->parent == 0) {
                    ?>
                        <div class="form-check brands">
                            <input class="form-check-input" type="checkbox" <?php if(in_array( $brand->name ,$brands )) { echo 'checked'; } ?> value="<?= $brand->name; ?>" id="<?php echo 'brand-'.$brand->term_id; ?> ">
                            <label class="form-check-label" for="<?php echo 'brand-'.$brand->term_id; ?>">
                                    <?= $brand->name; ?>
                            </label>
                        </div>
                    <?php 
                        // }
                    }
                    ?>
                    </div>
                    <br>
                    <h4 class="pt-3">Product Category</h4>
                    <div class="ps-2">
                    <?php 
                    $args = array(
                       'hierarchical' => 1,
                       'show_option_none' => '',
                       'hide_empty' => 0,
                       'parent' => 89,
                       'taxonomy' => 'product_cat'
                   );
                    $all_categories = get_categories( $args );
                    foreach ($all_categories as $cat) {
                        //if($cat->category_parent == 0) {
                    ?>
                        <div class="form-check categories">
                            <input class="form-check-input" type="checkbox" <?php if(in_array( $cat->name ,$categories )) { echo 'checked'; } ?> value="<?= $cat->name; ?>" id="<?php echo 'cat-'.$cat->term_id; ?> ">
                            <label class="form-check-label" for="<?php echo 'cat-'.$cat->term_id; ?>">
                                    <?= $cat->name; ?>
                            </label>
                        </div>
                    <?php 
                        // }
                    }
                    ?>
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
                    $args = array();
                    $args['post_type'] = 'product';
                    $args['tax_query'] = array();
                    $args['tax_query']['relation'] = 'AND';
                    $args['tax_query'][] = array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'Personal',
                        );
                    $args['tax_query'][] = array(
                        'taxonomy' => 'pwb-brand',
                        'field'    => 'slug',
                        'terms'    => 'Personal',
                    );
                    if(isset($categories) && count($categories) > 0){
                        $args['tax_query'][] = array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $categories,
                        );
                    }
                    if(isset($brands) && count($brands) > 0){
                        $args['tax_query'][] = array(
                            'taxonomy' => 'pwb-brand',
                            'field'    => 'slug',
                            'terms'    => $brands,
                        );
                    }
                    // echo '<pre>';print_r($args);die();
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        global $product;
                        echo '<div class="col-md-3">
                            <a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>
                            <h6 class="mt-2 text-center" style="font-size: 15px;">'.get_the_title().'</h6>
                        </div>';
                        
                    endwhile; ?>

                </div>
            </div>
        </div>

    </div>
    <script>
        $cat_checkboxes = $('.categories input[type=checkbox');
        $brand_checkboxes = $('.brands input[type=checkbox');
        $cat_checkboxes.change(function(){
            getUrl();
        });
        $brand_checkboxes.change(function(){
            getUrl();
        });
        function getUrl(){
            var cat_values = $cat_checkboxes.filter(':checked').map(function(){
                return this.value;   
            }).get().join(",");
            var brand_values = $brand_checkboxes.filter(':checked').map(function(){
                return this.value;   
            }).get().join(",");
            
            var url = '?';
            if(cat_values){
                url = url + 'categories=' + cat_values;
            }
            if(brand_values){
                if(cat_values){
                    url = url + '&';
                }
                url = url + 'brands=' + brand_values;
            }
            // console.log(url);
            window.location.href = url;
        }
    </script>
</body>
</html>

<?php get_footer();  ?>