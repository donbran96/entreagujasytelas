<?php 

get_header(); ?>

<main class="contenedor">
    <div class="noticia">
        <?php
            echo '<h2 class="titulos">';
                the_title();
            echo '</h2>';
           
            echo '<div class="content"';
                the_content();
            echo '</div>';
        ?>
            <?php
// Obtener las imágenes de la galería desde el campo personalizado
$galeria_imagenes = get_field('galeria_noticias');

// Verificar si hay imágenes en la galería
if ($galeria_imagenes) {
    echo '<div class="galeria-noticias">';
    foreach ($galeria_imagenes as $imagen) {
        echo '<img src="' . $imagen['url'] . '" alt="' . $imagen['alt'] . '">';
    }
    echo '</div>';
}
?>
    </div>
</main>

<?php get_footer(); ?>