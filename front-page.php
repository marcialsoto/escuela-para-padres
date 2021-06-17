<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Escuela_para_padres
 */

    get_header();
?>

	<main id="primary" class="site-main container">
		<h1 class="text-center mt-5 mb-5">Estamos preparando este sitio para ti</h1>
        <p class="lead text-center">Por lo pronto, puedes:</p>
        
        <p class="lead text-center"><a class="btn btn-block btn-primary btn-lg" href="<?php echo bloginfo('url'); ?>/conferencias">Registrarte en el I Encuentro de Padres de Familia: "Amar, encaminar y bendecir"</a></p>
	</main><!-- #main -->

<?php
    get_footer();