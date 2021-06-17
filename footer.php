<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Escuela_para_padres
 */

?>

	<?php if(!is_front_page()): ?>

		<section id="contact-map" class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title-header text-center">
							<h2 class="section-title" data-aos="fade-down">Contáctanos</h2>
							<p class="" data-aos="fade-up">Puede contactarse con nosotros a través del siguiente formulario.</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-12 col-xs-12">
						<div class="container-form"  data-aos="fade-up">
							<div class="form-wrapper">
								<?php echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="colophon" class="site-footer section-padding">
			<div class="container">
				<div class="row justify-content-center">
						<div class="col-lg-6 col-md-12 col-xs-12">
							<div class="footer-logo mb-5">
								<a href="<?= bloginfo('url'); ?>">
									<img style="height: 250px" class="img-fluid" src="<?= get_template_directory_uri() . "/images/logo--full.png"; ?>" alt="">
								</a>
							</div>

							<div class="footer-contacts">
							<h5>Información de contacto</h5>
								<p><i class="bi bi-geo-alt"></i> <a href="https://goo.gl/maps/JPwnssP7tvDakJz97" target="_blank">Av. Mariano Cornejo 1009, Pueblo Libre</a> <br>
								<i class="bi bi-phone"></i> <a href="tel:+51924903777" target="_blank">+51 924 903 777</a> | <a href="tel:+51945562310" target="_blank">+51 945 562 310</a><br>
								<i class="bi bi-envelope"></i> <a href="mailto:directivafocna@gmaill.com" target="_blank">directivafocna@gmaill.com</a></p>
							</div>

							<div class="social-icons-footer mb-5">
								<nav class="nav justify-content-center">
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Síguenos en Facebook" class="nav-link facebook" href="https://www.facebook.com/MMMFOCNA" target="_blank"><i class="bi bi-facebook"></i></a>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Nuestras fotos en Instagram" class="nav-link instagram" href="https://www.instagram.com/focna.peru/" target="_blank"><i class="bi bi-instagram"></i></a>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Nuestros videos en YouTube" class="nav-link youtube" href="https://www.youtube.com/channel/UC-PfC6Y3xQU7HDv_XXhPhPg/featured" target="_blank"><i class="bi bi-youtube"></i></a>
								</nav>
							</div>

							<div class="site-info">
								<small><strong><a href="<?php echo bloginfo('url'); ?>"><?php echo bloginfo('sitename'); ?></a></strong> &copy; <?php echo date('Y'); ?>. Derechos reservados. Diseñado y desarrollado por <a href="https://aureabit.com" target="_blank"><img style="margin-top: -3px" class="img-fluid" src="<?= get_template_directory_uri() . "/images/aureabit-logo.svg"; ?>" alt="" /></a></small>
							</div>
						</div>
					</div>
				</div>
		</footer><!-- #colophon -->

		<a href="https://api.whatsapp.com/send?phone=51924903777&text=Hola,%20tengo%20una%20siguiente%20consulta%20sobre%20esta%20conferencia:%20<?php echo bloginfo('url'); ?>/conferencias" target="_blank" class="whatsapp">
			<!-- Enlazar a 924903777 -->
			<i class="bi bi-whatsapp"></i>
		</a>

	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
