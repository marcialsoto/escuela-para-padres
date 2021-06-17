<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Escuela_para_padres
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'escuela-para-padres' ); ?></a>
	
	<?php if(is_page_template('template-conferencia.php')) : ?>
		<?php 
			$events = new stdClass();

			$events->single = array([
				'posts_per_page' => 1,
				'start_date'     => 'now',
			]);
			
			set_query_var( 'events', $events );

			$events->multi = array([
				'posts_per_page' => 3,
				'start_date'     => 'now',
			]);

			get_template_part( 'template-parts/header', 'conferencia' );
		?>
	<?php else: ?>
		<header id="masthead" class="<?php echo ( is_front_page() ) ? 'text-center ' : ''; ?>site-header">
			<div class="site-branding">
				<div class="home-logo mb-5">
					<a href="<?= bloginfo('url'); ?>">
						<img style="height: 250px" class="img-fluid" src="<?= get_template_directory_uri() . "/images/logo--full.png"; ?>" alt="">
					</a>
				</div>
				<?php
				// the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$escuela_para_padres_description = get_bloginfo( 'description', 'display' );
				if ( $escuela_para_padres_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $escuela_para_padres_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		<?php if(!is_front_page()): ?>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e( 'Primary Menu', 'escuela-para-padres' ); ?>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
		</header><!-- #masthead -->
	<?php endif; ?>

