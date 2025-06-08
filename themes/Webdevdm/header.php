<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// $bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
// $navbar_type = get_theme_mod('understrap_navbar_type', 'collapse');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<header id="wrapper-navbar" class="header__desktop">
		<div class="container-header justify-content-between align-items-center">
			<nav id="main-nav" class="header__navbar navbar navbar-expand-xl" aria-labelledby="main-nav-label">
				<button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
					aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'Main-Menu-Home',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav header__nav m-0 p-lg-0 align-items-lg-center',
						'fallback_cb'     => '',
						'menu_id'         => 'Main-Menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</nav>
		</div>
	</header>
    <header id="wrapper-navbar" class="header__mobile">
        <div class="container-header justify-content-between align-items-center">
            <nav id="main-nav" class="header__navbar navbar navbar-expand-xl"
                 aria-labelledby="main-nav-label">
                <button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'Main-Menu-Home',
                        'container_class' => 'collapse navbar-collapse justify-content-lg-end',
                        'container_id'    => 'navbarNavDropdown',
                        'menu_class'      => 'navbar-nav header__nav m-0 p-lg-0 align-items-lg-center',
                        'fallback_cb'     => '',
                        'menu_id'         => 'Main-Menu',
                        'depth'           => 2,
                        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                );
                ?>
            </nav>
        </div>
    </header>
