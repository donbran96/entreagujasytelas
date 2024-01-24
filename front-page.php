<?php get_header(); ?>

<!--seccion del hero-->

<?php  $galeria = get_field('portadas'); ?>
<div class="slideshow-container">
    <div class="slideshow">
        <?php foreach ($galeria as $index => $imagen) { ?>
            <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo $imagen['url']; ?>');">
                <div>
                    <h2 class="escribiendo titulo-slider"><?php bloginfo('name'); ?></h2>
                    <h3 class="escribiendo"><?php bloginfo('description'); ?></h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<main class="contenedor-ancho" style="margin-top: -20rem">
    
    <!--Caja de Retrato-->
    
    <?php $foto_retrato=get_field('foto_retrato'); ?>
    <div class="contenedor_borde cajas_padding  fade-in">
        <div class="contenedor">
            <div class="foto_retrato">
                <img src="<?php echo $foto_retrato; ?>" alt="Foto Retrato">
            </div> 
            <div class="descripcion_retrato parrafo"> 
                <?php the_field('descripcion_del_retrato'); ?>
            </div>
        </div>
    </div>

    <!--Caja de ultimos trabajos-->

    <div class="cajas_padding">
        <h2 class="subtitulos">Últimos Trabajos!</h2>
        <ul class="lista-bordados">
            <?php
                $args_bordados = array(
                    'post_type' => 'bordados',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'nuevo',
                        ),
                    ),
                );

                $bordados = new WP_Query($args_bordados);

                while($bordados->have_posts()){
                    $bordados->the_post();
                    echo '<li>';
                    echo '<a href="' . get_permalink() . '" style="background-image: url(' . get_the_post_thumbnail_url() . ')" class="estilo-thumbnail">';
                    echo '<div>'.get_the_title().'</div>';
                    echo '</a>';
             //   the_field('precio');
            //    echo ' Bs';
                    echo '</li>';
                };
                wp_reset_postdata();
            ?>
        </ul>
        <?php $archive_url = get_post_type_archive_link( 'bordados' ); ?>
        <a href="<?php echo $archive_url; ?>">
            <button class="ver_todos boton-temblar" >Ver Todos</button>
        </a>
    </div>


                   <!--Caja de Noticias-->
    
       <div class="contenedor_borde cajas_padding">
    <div class="contenedor">
        <h2 class="subtitulos">Últimas Noticias!</h2>
              <!-- Mostrar las últimas noticias con una etiqueta específica -->
        <?php
        $args = array(
            'post_type' => 'post', // Tipo de publicación: post
            'tag' => 'destacada', // Nombre de la etiqueta a mostrar
            'posts_per_page' => 3, // Número de noticias a mostrar
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                

                
                <div class="noticia-destacada">
                    <div class="caja-izquierda">
                        <h2 class="titulos">
                            <?php the_title(); ?>
                        </h2>
                        <div class="extracto">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <button class="ver_todos boton-temblar">Conocer más</button>
                        </a>
                    </div>
                    <?php
                    
                    if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                   
                    ?>
                </div>
               
  <?php
            endwhile;
            wp_reset_postdata(); // Restaurar los datos originales del bucle principal de WordPress
        else :
            echo 'No se encontraron noticias con la etiqueta especificada.';
        endif;
        ?>

        <a href="<?php echo home_url('/blog/'); ?>">
            <button class="ver_todos boton-temblar">Noticias</button>
        </a>
    </div>
</div>




    <!-- Caja de categorias-->

    <div class="cajas_padding contenedor_borde">
    <h2 class="subtitulos">Categorías</h2>
    <ul class="lista-bordados lista-categorias">
        <?php
        $categories = get_categories(); // Obtener todas las categorías
        foreach ($categories as $category) {
            // Excluye la categoría "Sin categoría" (ID 1)
            if ($category->term_id === 1) {
                continue;
            }
            $category_image = get_field('imagen_destacada', 'category_' . $category->term_id); // Obtener la URL de la imagen destacada de la categoría (campo personalizado ACF)
            $category_name = $category->name; // Obtener el nombre de la categoría
        ?>
            <li>
                <div href="#" style="background-image: url('<?php echo $category_image; ?>')" class="estilo-thumbnail">
                    <div><?php echo $category_name; ?></div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
    <a href="<?php echo $archive_url; ?>">
        <button class="ver_todos boton-temblar">Ver Todas</button>
    </a>
</div>

    
    <!-- Caja de Clientes-->

    <div class="cajas_padding contenedor">
        <h2 class="subtitulos">Clientes Satisfechos</h2>
        <ul class="lista-clientes">
            <?php
                $args_clientes = array(
                    'post_type' => 'clientes',
                    'meta_key' => 'orden_del_cliente', // Nombre del campo personalizado para el orden
                    'orderby' => 'meta_value_num', // Ordenar por el valor numérico del campo
                    'order' => 'ASC', // Orden ascendente (de menor a mayor)
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'destacado',
                        ),
                    ),
                );

                $clientes = new WP_Query($args_clientes);

                while($clientes->have_posts()){
                    $clientes->the_post();
                    echo '<li>';
                        $foto_cliente=get_field('foto_del_cliente');?>
                        <div class="foto_retrato_cliente">
                        <img src="<?php echo esc_url($foto_cliente); ?>" alt="testimonio-cliente">

                        </div>
                        <?php echo '<p class="parrafo">'.get_the_title().'</p>';
                    $testimonio= get_field('testimonio_del_cliente');
                      echo '<div class="parrafo">'. $testimonio .'</div>';
                    echo '</li>';
                };
                wp_reset_postdata();
            ?>
        </ul>
        <?php $archive_url = get_post_type_archive_link( 'clientes' ); ?>
        <a href="<?php echo $archive_url; ?>">
            <button class="ver_todos boton-temblar" >Ver Todos</button>
        </a>
    </div>
    
     <!--Caja de Sorteo-->
 <!--   
    <div class="contenedor_borde cajas_padding">
        <div class="contenedor">
            <h2 class="subtitulos">Ganadores del Sorteo</h2>
            <div class="descripcion_retrato parrafo"> 
                <p>Entérate aquí si estás entre los ganadores del sorteo😊.</br>
                    Domingo 30 de Julio 12:00 p.m.
                </p>
            </div>
            <a href="<?php echo home_url('/sorteo/'); ?>">
                <button class="ver_todos" >Sorteo!</button>
            </a>
        </div>
    </div>

            -->
    
     <!--Caja de Contacto-->
    
    <div class="cajas_padding contenedor_borde">
        <div class="contenedor">
            <h2 class="subtitulos">Contáctame</h2>
            <div class="descripcion_retrato parrafo"> 
                <p>Puedes escribirme por Whatsapp para consultar tus dudas y solicitar tu pedido personalizado.
                    </br>Con gusto te responderé😊
                </p>
                <?php $telefono = get_theme_mod('entreagujasytelas_telefono', ''); ?>
                <a href="https://api.whatsapp.com/send/?phone=591<?php echo $telefono; ?>&text&type=phone_number&app_absent=0" target="_blank" class="facebook-icon">
                    <i class="fa-brands fa-whatsapp icono-whatsapp"><?php echo $telefono; ?></i>
                </a>
            </div>
            <a href="<?php echo home_url('/contacto/'); ?>">
                <button class="ver_todos boton-temblar">Contáctame</button>
            </a>
        </div>
    </div>
</main>

<!--Caja de POPUP-->
<div id="popup-container" class="popup">
    <div class="popup-content">
        <span class="popup-close" id="popup-close">&times;</span>
        <img src="<?php echo get_template_directory_uri(); ?>/img/Claudia-jana.jpeg" alt="Imagen">
        <p class="titulo-popup">Jana</p>
        <p>Puedes echarle un vistazo para ver como quedó</p>
        <a href="<?php echo home_url('/bordados/retrato-personalizado-de-jana/'); ?>">
        <button class="ver_todos boton-animacion">Ver el Bordado</button>   
        </a>
        <!--<button id="popup-close-button">Cerrar</button>-->
    </div>
</div>



<?php get_footer(); ?>