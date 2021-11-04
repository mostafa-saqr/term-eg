<?php get_header(); ?>
<p style="height: 87px;"></p>
<div class="sm-banner" style="background-image: url(<?php the_field('banner_image'); ?>)">
        <div class="bann-content" >
            <h1>
                About Term
            </h1>

        </div>
    </div>

    <div class="container-fluid img-txt ">
        <div class="row">
            <div class="col-md-6 img" style="min-height: 500px ;background-image: url(<?php the_field('section1'); ?>);">

            </div>
            <div class="col-md-6 txt" style="padding:4rem">
				<?php
$section2 = get_field("section2");
if( $section2 ): ?>
                <h3><?php echo $section2["title"] ?></h3>
              <p>
				  <?php echo $section2["content"] ?>
				</p>
				<?php $hasButton = $section2["button_url"];
					if($hasButton): ?>
				<a href="<?php echo $section2["button_url"] ?>" class="btn mainBg"><?php echo $section2["button_text"] ?></a>
				<?php endif ?>
				<?php endif ?>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 txt" style="padding:4rem">
				<?php
$section3 = get_field("section3");
if( $section3 ): ?>
                <h3><?php echo $section3["title"] ?></h3>
              <p>
				  <?php echo $section3["content"] ?>
				</p>
				<?php $hasButton = $section3["button_url"];
					if($hasButton): ?>
				<a href="<?php echo $section3["button_url"] ?>" class="btn mainBg"><?php echo $section3["button_text"] ?></a>
				<?php endif ?>
				<?php endif ?>
            </div>
			<div class="col-md-6 txt" style="padding:4rem">
				<?php
$section4 = get_field("section4");
if( $section4 ): ?>
                <h3><?php echo $section4["title"] ?></h3>
              <p>
				  <?php echo $section4["content"] ?>
				</p>
				<?php $hasButton = $section4["button_url"];
					if($hasButton): ?>
				<a href="<?php echo $section4["button_url"] ?>" class="btn mainBg"><?php echo $section4["button_text"] ?></a>
				<?php endif ?>
				<?php endif ?>
            </div>

        </div>

    </div>


    <?php

// Check rows exists.
if( have_rows('content_slider') ): ?>

    <div class="tesmonials pt-5  pb-5 bg-light">
        <div class="container pb-5 pt-5">
            <h3 class="slider-title text-center">Section Title</h3>
            <div class="owl-carousel owl-theme onecol-slider">

 <?php while( have_rows('content_slider') ) : the_row(); ?>
                <div class="item text-center">
					
                    <p><?php echo the_sub_field('content') ?>
                    </p>
                </div>
<?php endwhile ?>


            </div>
        </div>
    </div>
<?php endif ?>
    <div class="container-fluid img-txt">
        <div class="row ">
            <div class="col-md-6 img" style="min-height: 300px ;background-image: url(https://images.pexels.com/photos/274108/pexels-photo-274108.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940;">
                <div class="mask"></div>
                <div class="text-container">
                    <a href="#!">Indevidual product Iine</a>
                </div>
            </div>
            <div class="col-md-6 img" style="min-height:300px;background-image: url(https://images.pexels.com/photos/2523921/pexels-photo-2523921.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
                <div class="mask"></div>
                <div class="text-container">
                    <a href="#!">Corporate product Iine</a>
                </div>

            </div>


        </div>
    </div>
    <?php get_footer();  ?>