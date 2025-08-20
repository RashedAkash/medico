<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class('index-page'); ?>>
<?php wp_body_open(); ?>

<header id="header" class="header sticky-top">

  <!-- Topbar -->
  <div class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="d-none d-md-flex align-items-center">
        <i class="bi bi-clock me-1"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone me-1"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div><!-- End Top Bar -->

  <!-- Branding -->
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-end">

      <!-- Logo -->
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="logo d-flex align-items-center me-auto">
        <?php 
          if ( has_custom_logo() ) {
            the_custom_logo();
          } else {
            echo '<h1 class="sitename">'. get_bloginfo('name') .'</h1>';
          }
        ?>
      </a>

      <!-- Navigation -->
      <nav id="navmenu" class="navmenu">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'fallback_cb'    => false,
          ));
        ?>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- CTA Button -->
      <a class="cta-btn" href="<?php echo esc_url( home_url('/#appointment') ); ?>">Make an Appointment</a>

    </div>
  </div>
</header>
