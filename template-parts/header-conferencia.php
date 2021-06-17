<?php 
    global $post;
    
    $events_obj = get_query_var( 'events' );

    $events = tribe_get_events( $events_obj->single );

    $format_dates = 'j';
    $format_dates_month = 'F';
    $format_dates_year = 'Y';
    $format_hours = 'g:i a';

    $template_uri = get_template_directory_uri();
    

?>

<header id="header-wrap">
    <nav id="primary-navigation" class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar">
        <div class="container">
            <a href="<?php echo bloginfo('url'); ?>" class="navbar-brand pt-0">
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                <img src="<?php  echo $image[0]; ?>" alt="" style="height: 30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'container' => 'ul',
                            'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        )
                    );
				?>
            </div>
        </div>
    </nav>

    <?php foreach ( $events as $post ): ?>

        <?php 
            setup_postdata( $post );

            $form = get_field('formulario_de_inscripcion', $post->ID);  
            $costo_en_soles = get_field('costo_en_soles', $post->ID);  
            $costo_en_dolares = get_field('costo_en_dolares', $post->ID);  
            $logo_del_evento = get_field('logo_del_evento', $post->ID);  
            $post_thumb = get_the_post_thumbnail_url($post);
            
            // echo '<pre>≥';
            // var_dump($post_thumb);
            // echo '</pre>';
        ?>

        <div id="hero-area" class="hero-area-bg" style="background: url(<?=( $post_thumb ) ? $post_thumb : $template_uri.'/images/conference.jpg' ?>) no-repeat;">
            <div class="overlay"></div>
            <div class="container position-relative">
                <div class="row align-items-center justify-content-between contents">
                    <div class="col-lg-5 col-sm-12">
                        <div class="">
                            <?php if($logo_del_evento): ?>
                                <img style="max-width: 200px;" class="img-fluid mb-4" src="<?php echo $logo_del_evento; ?>" />
                            <?php endif; ?>
                            <h1 class="head-title"><?php echo $post->post_title; ?></h2>
                        </div>

                        <p class="banner-info"><?= tribe_get_start_date( $post, false, $format_dates ) . ' y ' . tribe_get_end_date( $post, false, $format_dates ) . ' de ' . tribe_get_end_date( $post, false, $format_dates_month ); ?><br><small>De <?= tribe_get_start_date( $post, false, $format_hours ) . ' a ' . tribe_get_end_date( $post, false, $format_hours ); ?></small></p>
                        <!-- <p class="banner-desc"><?php /*$post->post_title; */?></p> -->
                        <p>
                            <ul class="list-unstyled">
                                <li  class="cursor-help">
                                    <img style="margin-top: -3px" class="img-fluid pe-1" src="<?= get_template_directory_uri(); ?>/images/peru-flag.svg" width="18px" alt="" />
                                    <strong>
                                        <?= (($costo_en_soles) ? ' S/ ' . $costo_en_soles : 'Gratis'); ?>
                                    </strong>

                                    <button 
                                        class="btn btn-link"
                                        data-bs-container="body" 
                                        data-bs-toggle="popover" 
                                        data-bs-placement="right" 
                                        data-bs-trigger="click" 
                                        data-bs-html="true"
                                        data-bs-content='<p><strong>Perú</strong><br>
                                                        <img src="<?= get_template_directory_uri(); ?>/images/bcp-logo.svg" alt="" class="h-32 mt-1 mb-1" /> <br> 
                                                        <small><b>Banco de Crédito del Perú - BCP</b><br>
                                                            Número de cta: 191-01483079-0-58<br>
                                                            CCI: 00219110148307905850<br>
                                                            Titular: Vela A.  Acosta R.  Guerrero D.
                                                        </small>
                                                    </p>'
                                    >Número de cuenta</button>
                                </li>

                                <li class="lcursor-help">
                                    <img style="margin-top: -3px" class="img-fluid pe-1" src="<?= get_template_directory_uri(); ?>/images/worldwide-flag.svg" width="18px" alt="" />
                                    <strong>
                                        <?= (($costo_en_dolares) ? ' $ ' . $costo_en_dolares : 'Gratis'); ?>
                                    </strong>

                                    <button 
                                        class="btn btn-link"
                                        data-bs-container="body" 
                                        data-bs-toggle="popover" 
                                        data-bs-placement="right" 
                                        data-bs-trigger="click" 
                                        data-bs-html="true"
                                        data-bs-content='<p><strong>Extranjero</strong><br>
                                                    <img src="<?= get_template_directory_uri(); ?>/images/wu-logo.svg" alt="" class="h-32 mt-1 mb-1" /> <br> 
                                                    <small>
                                                    <b>Western Union - WU</b><br>
                                                    Titular:Ana Chriss Vela Armas de Vargas<br>
                                                    DNI: 40637182                                                
                                                </small>
                                                </p>'
                                    >Número de cuenta</button>
                                </li>                            
                            </ul>
                        </p>
                        
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <?php
                            if ( $form ) {
                                gravity_form($form['id'], true, true, false, '', true, 1);
                            }
                        ?>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="preciosModal" tabindex="-1" aria-labelledby="preciosModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="preciosModalLabel">Información de inversión</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-dark"><strong>Para asistentes de Perú</strong><br>
                                <img src="<?= get_template_directory_uri(); ?>/images/bcp-logo.svg" alt="" class="h-32 mt-1 mb-1" /> <br> 
                                <small><b>Banco de Crédito del Perú - BCP</b><br>
                                    Número de cta: 191-01483079-0-58<br>
                                    CCI: 00219110148307905850<br>
                                    Titular: Vela A.  Acosta R.  Guerrero D.
                                </small>
                            </p>
                            <hr>
                            <p class="text-dark"><strong>Para asistentes del Extranjero</strong><br>
                                <img src="<?= get_template_directory_uri(); ?>/images/wu-logo.svg" alt="" class="h-32 mt-1 mb-1" /> <br> 
                                <small>
                                    <b>Western Union - WU</b><br>
                                    Titular:Ana Chriss Vela Armas de Vargas<br>
                                    DNI: 40637182                                                
                                </small>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</header>