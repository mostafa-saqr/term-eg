<?php get_header(); ?>

<p class="mt-4 pt-5"></p>
<?php
$banner= get_field("banner");
if( $banner ): ?>
    <div class="banner"
        style="background-image:url(<?php echo $banner['banner_image'] ?>); background-position-x: center;background-position-y: 7%;background-repeat: no-repeat;background-size: cover;">
        <div class="mask"></div>
        <div class="banner-content container pt-md-5 pb-md-5">
            <h1><?php echo $banner['banner_title'] ?></h1>
            <p><?php echo $banner['banner_content'] ?></p>
            <a href="<?php echo $banner['banner_button_url'] ?>" class="btn mainBg"><?php echo $banner['banner_button_name'] ?></a>
        </div>
    </div>
<?php endif ?>
    <div class=" s-tabs bg-light pt-5 pb-5">
        <div class="container">
        <?php
$mainContentArea= get_field("main_content_area");
if( $mainContentArea ): ?>
            <h3><?php echo $mainContentArea['title'] ?></h3>
            <p><?php echo $mainContentArea['content'] ?>
            </p>
<?php endif ?>
<?php if( have_rows('tabs') ): $index = 0 ?>
            <ul class="nav nav-tabs ms-0" id="myTab" role="tablist">
            <?php while( have_rows('tabs') ) : the_row(); $index++ ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link mainColor <?php if($index == 1){echo "active";} ?>" id="<?php echo $index."-tab";?>" data-bs-toggle="tab" data-bs-target="#<?php echo 'tab-'.$index;?>"
                        type="button" role="tab" aria-controls="<?php echo 'tab-'.$index;?>" aria-selected="true"><?php the_sub_field('title') ?></button>
                </li>
               <?php endwhile ?>
            </ul>
            <div class="tab-content pt-4" id="myTabContent">
            <?php while( have_rows('tabs') ) : the_row(); $index++ ?>
                <div class="tab-pane fade <?php if($index == 1){echo "show active";} ?>" id="<?php echo 'tab-'.$index;?>" role="tabpanel" aria-labelledby="<?php echo $index."-tab";?>">
                <?php the_sub_field('content') ?>
                </div>
                <?php endwhile ?>
              
            </div>
<?php endif ?>
        </div>
    </div>
    <div class="container-fluid img-txt ">
        <div class="row">
            <div class="col-md-6 img"
                style="min-height: 500px ;background-image: url(http://dev.tomoum.com/wp-content/uploads/2016/06/about-bg-2.jpg);">

            </div>
            <div class="col-md-6 txt" style="padding:4rem">
                <h3>Term Company</h3>
                <p>
                    Term Company boasts a range of the world’s finest Handling and heavy equipment brands, It’s team
                    have over forty years experience within the industry and have provided material handling solutions
                    to a diverse range of customers including the electronics
                    sector, warehousing and distribution, automotive industry and countless others.
                </p>
                <p>
                    Term strives to meet and exceed all of our customers expectations by providing the highest quality
                    products and services with projects completed on time and offering exceptional value for money. Our
                    organisation is committed to offering a professional
                    but also personalised service to our customers and can always guarantee an established point of
                    contact.
                </p>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 txt" style="padding:4rem">
                <h3>Term Company</h3>
                <p>
                    Term Company boasts a range of the world’s finest Handling and heavy equipment brands, It’s team
                    have over forty years experience within the industry and have provided material handling solutions
                    to a diverse range of customers including the electronics
                    sector, warehousing and distribution, automotive industry and countless others.
                </p>
                <p>
                    Term strives to meet and exceed all of our customers expectations by providing the highest quality
                    products and services with projects completed on time and offering exceptional value for money. Our
                    organisation is committed to offering a professional
                    but also personalised service to our customers and can always guarantee an established point of
                    contact.
                </p>
                <a href="#!" class="btn mainBg">Learn more</a>
            </div>
            <div class="col-md-6 txt" style="padding:4rem; background:#d6d6d6;">
                <h3>Term Company</h3>
                <p>
                    Term Company boasts a range of the world’s finest Handling and heavy equipment brands, It’s team
                    have over forty years experience within the industry and have provided material handling solutions
                    to a diverse range of customers including the electronics
                    sector, warehousing and distribution, automotive industry and countless others.
                </p>
                <p>
                    Term strives to meet and exceed all of our customers expectations by providing the highest quality
                    products and services with projects completed on time and offering exceptional value for money. Our
                    organisation is committed to offering a professional
                    but also personalised service to our customers and can always guarantee an established point of
                    contact.
                </p>
                <a href="#!" class="btn mainBg">Learn more</a>
            </div>

        </div>

    </div>

<?php get_footer(); ?>