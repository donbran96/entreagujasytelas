

<ul class="lista-noticias">
<?php
while (have_posts()) : the_post();
    echo '<li>';
    echo '<a href="' . get_permalink() . '">';
        echo '<div href="' . get_permalink() . '" class="estilo-thumbnail-blog" style="background-image: url(' . get_the_post_thumbnail_url() . ');">';
            echo '<div>';  
                echo '<span class="titulo-noticia">';
                    the_title();
                echo '</span>';
            echo '</div>';
        echo '</div>';
        echo '<div class="content">';
            the_excerpt();
        echo '</div>';
        echo '</a>';
    echo '</li>';
endwhile;
?>
</ul>




