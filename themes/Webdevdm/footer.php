<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<nav class="footer__nav">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'Main-Menu-Home',
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
			</div>
		</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>
