<?php get_header(); ?>

<div class="cajas_padding contenedor_borde">
    
    <h2 class="subtitulos">Clientes Satisfechos</h2>
    <main class="contenedor">
        <ul class="lista-clientes">
            <?php
                $args_clientes = array(
                    'post_type' => 'clientes',
                    'meta_key' => 'orden_del_cliente', // Nombre del campo personalizado para el orden
                    'orderby' => 'meta_value_num', // Ordenar por el valor numérico del campo
                    'order' => 'ASC', // Orden ascendente (de menor a mayor)
                );

                $clientes = new WP_Query($args_clientes);

                while($clientes->have_posts()){
                    $clientes->the_post();
                    echo '<li>';
                        $foto_cliente=get_field('foto_del_cliente');?>
                        <div class="foto_retrato_cliente">
                        <img src="<?php echo esc_url($foto_cliente); ?>" alt="">

                        </div>
                        <?php echo '<p class="parrafo titulo">'.get_the_title().'</p>';
                    $testimonio= get_field('testimonio_del_cliente');
                      echo '<div class="parrafo">'. $testimonio .'</div>';
                    echo '</li>';
                };
                wp_reset_postdata();
            ?>
        </ul>
    </main>        
</div>


<?php get_footer(); ?>