<?php get_header(); ?>

<main class="contenedor-ancho contenedor_borde cajas_padding">
    <h2 class="subtitulos">Bordados</h2>

    
    <!-- Lista de categorias-->

   
    <div class="contenedor">
    <ul class="lista-buscador">
             <li>
                <div class="category-link selected" data-category="todos">Todos</div>
            </li>
            <?php
                $categories = get_categories(); // Obtener todas las categorías
                foreach ($categories as $category) {
                    $category_name = $category->name; // Obtener el nombre de la categoría
                    $category_slug = $category->slug;
                    if ($category_slug !== 'sin-categoria') {
            ?>
                    <li>
                <div class="category-link" data-category="<?php echo $category_slug; ?>"><?php echo $category_name; ?></div>
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>   
        
      
  
    <!--Caja de Bordados-->
    <div id="bordados-container">
    <ul class="lista-bordados">
        <?php
            $args = array(
                'post_type' => 'bordados',
                'posts_per_page' => -1, // Mostrar todos los bordados (sin límite)
            );

            $bordados = new WP_Query($args);

            while($bordados->have_posts()){
                $bordados->the_post();
                echo '<li class="zoom-in">';
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
    </div>
</main>

<?php get_footer(); ?>
   
