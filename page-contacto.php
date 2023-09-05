<?php get_header(); ?>

<main class="contenedor-ancho cajas_padding contenedor_borde">
        
        <div class="contenedor">
             <h2 class="subtitulos">
                <?php wp_title(''); ?>
            </h2>
            <p class="parrafo" style="margin-bottom: 20px">Puedes rellenar el formulario de abajo para contactarme por correo electrónico😊.</p>
            <?php echo do_shortcode('[formulario_contacto]'); ?>
            <p class="parrafo-estrecho parrafo">También puedes escribirme por Whatsapp para consultar tus dudas y solicitar tu pedido personalizado. Con gusto te responderé😊.</p>

            <?php
            $telefono = get_theme_mod('entreagujasytelas_telefono', '');
            ?>
            <a href="https://api.whatsapp.com/send/?phone=591<?php echo $telefono; ?>&text&type=phone_number&app_absent=0" target="_blank" class="facebook-icon">
                <i class="fa-brands fa-whatsapp icono-whatsapp"><?php echo $telefono; ?></i>
            </a>
        </div>
        
</main>

<?php get_footer(); ?>
   