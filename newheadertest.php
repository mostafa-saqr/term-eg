<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="http://dev.tomoum.com/wp-content/themes/realfactory/images/2021/white-logo.png" width="120" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <?php
                    $defaults = array(
                        'menu'				=> 'desktop-menu',
                        'container'			=> '',
                        'container_class'	=> false,
                        'items_wrap'		=> '%3$s',
                        'add_li_class'  => 'nav-item',
						'add_a_class' => 'nav-link'
                    );
                    wp_nav_menu( $defaults );
                ?>
            </ul>
        </div>
        <!-- navbar-collapse.// -->
    </div>
    <!-- container-fluid.// -->
</nav>
	<div class="realfactory-page-wrapper" id="realfactory-page-wrapper" >