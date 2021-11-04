<?php get_header(); ?>

<div class="prod-banner"
        style="background-image:url(<?php the_field('product_banner_url'); ?>); background-position-x: center;background-position-y: 7%;background-repeat: no-repeat;background-size: cover;">
        <div class="mask"></div>
        <div class="bann-content">
			<?php the_title( '<h1 itemprop="name" class="prod-title mb-0">', '</h1>' ); ?>
            <?php the_field('overview'); ?>
                    <a href="<?php the_field('download_pdf'); ?>" class="btn mainBg">Download Brochure</a>

            <?php // woocommerce_breadcrumb(); ?>
            <a id="getquotation" href="/quotation/?<?php echo the_title(); ?>" class="btn mainBg">Get quotation</a>
        
        </div>
<script>
    let getQuotation = document.getElementById('getquotation');
    let pagehref = window.location.href.split('/')
    let productName = pagehref[pagehref.length - 2];
    localStorage.setItem("lastProduct", productName);
</script>
    </div>
    <div class="overview pt-5 pb-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                <h3>Gallery</h3>
					
                    <div id="carouselExampleSlidesOnly" class="carousel slide gallery" data-bs-ride="carousel">
						<?php $images = get_field('gallery') ?>
							<?php if($images): ?>

							
                                <div class="carousel-indicators">
                                <?php foreach($images as $key=>$image): ?>
                            <img width="200" height="200" src="<?php echo $image['sizes']['thumbnail'] ?>"
                                data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="<?php echo $key ?>" class="active"
                                aria-current="true" aria-label="Slide <?php echo $key+1 ?>">
                                <?php endforeach; ?>
                        </div>
                        <div class="carousel-inner">
                        <?php foreach($images as $key=>$image): ?>
                            <div class="carousel-item <?php if ($key == 0) {echo "active"; } ?>">
                                <img src="<?php echo $image['sizes']['large'] ?>" class="d-block w-100" >
                            </div>
                            <?php endforeach; ?>
                        </div>

							
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

							<?php endif; ?>
                       
                       
                    </div>
					
                 


                </div>
                <div class="col-md-6">
                    <h3>Video</h3>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('video_url'); ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>


        </div>
    </div>

    <div class="gallery-section  bg-light pt-5 pb-5">
        <div class="container">
            <div class="row">
               
                <div class="col-md-12">
                    <h3>Specifications</h3>
                    <?php if( have_rows('specifications')): $index = 0;?>
                    <div class="accordion" id="accordionExample">
                    
                           <?php while ( have_rows('specifications')): $index++; the_row(); ?> 
                        <div class="accordion-item">
                            <h2 class="accordion-header mb-0" id="heading<?php echo $index ?>">
                                <button class="accordion-button  <?php if($index > 1){echo "collapsed";} ?>" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $index ?>" aria-expanded="<?php if($index == 1){echo "true";}?>" aria-controls="collapse<?php echo $index ?>">
                                    <?php the_sub_field('title') ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $index;  ?>" class="accordion-collapse collapse <?php if($index == 1){echo "show";}?>" aria-labelledby="heading<?php echo $index ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <?php the_sub_field('content') ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                        
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php

// Check rows exists.
if( have_rows('featuers') ): ?>

    
    <div class="features pt-5 pb-5">



        <div class="container pt-4 mt-4">
            <h3 class="slider-title">Features</h3>
            <div class="owl-carousel owl-theme brand-slider">

   
    <?php while( have_rows('featuers') ) : the_row(); ?>
                <div class="item">
                    <img src="<?php echo the_sub_field('image') ?>" alt="">
                    <h4 class="mt-2 text-center"><?php echo the_sub_field('name') ?></h4>
                </div>

<?php endwhile ?>

            </div>
        </div>
    </div>
    <?php endif ?>
<?php 
global $product; // If not set…

if( ! is_a( $product, 'WC_Product' ) ){
    $product = wc_get_product(get_the_id());
}

$args = array(
    'posts_per_page' => 4,
    'columns'        => 3,
    'orderby'        => 'rand',
    'order'          => 'desc',
);

$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

// Set global loop values.
wc_set_loop_prop( 'name', 'related' );
wc_set_loop_prop( 'columns', $args['columns'] );
if ( $args['related_products'] ) : ?>


<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
    <div class="features pt-5 pb-5 bg-light">
        <div class="container pt-4 mt-4">
            <h3 class="slider-title"><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h3>
            <div class="owl-carousel owl-theme indev-slider">
<?php foreach ( $args['related_products'] as $related_product ) : ?>
				<div class="item">
                    <img src="<?php echo wp_get_attachment_url( $related_product->image_id ); ?>" alt="">
                    <a href="<?php echo $related_product->get_permalink(); ?>"><h4 class="mt-2 text-center"><?php echo $related_product->name; ?></h4></a>
                </div>
<?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer();  ?>