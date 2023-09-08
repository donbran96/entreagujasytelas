<?php
    /*Agregar Menús*/

    function entreagujasytelas_menu(){
       register_nav_menus( array(
        'menu-principal' => __('Menu Principal','entreagujasytelas'),
        'menu-secundario' => __('Menu Secundario','entreagujasytelas')
       ) ); 
    }

    add_action('init','entreagujasytelas_menu');

    /*Agregar Scripst y estilos*/

    function entreagujasytelas_scripts_styles(){
        wp_enqueue_style('normalize', get_template_directory_uri().'/styles/normalize.css', array(), '8.0.1');
        wp_enqueue_style('header-style', get_template_directory_uri().'/styles/header.css', array('normalize'), '1.0.0');
        wp_enqueue_style('footer-style', get_template_directory_uri().'/styles/footer.css', array('normalize'), '1.0.0');
        wp_enqueue_style('general-style', get_template_directory_uri().'/styles/generales.css', array('normalize'), '1.0.0');
        wp_enqueue_style('bordados-style', get_template_directory_uri().'/styles/bordados.css', array('normalize'), '1.0.0');
        wp_enqueue_style('single-bordados-style', get_template_directory_uri().'/styles/single-bordados.css', array('normalize'), '1.0.0');
        wp_enqueue_style('front-page-style', get_template_directory_uri().'/styles/front-page.css', array('normalize'), '1.0.0');
        wp_enqueue_style('noticias', get_template_directory_uri().'/styles/noticias.css', array('normalize'), '1.0.0');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('tu-slider-script', get_template_directory_uri() . '/js/slider-scripts.js', array('jquery'), '1.0.0', true);
        
    }

    add_action('wp_enqueue_scripts','entreagujasytelas_scripts_styles');

   /*Agregar soporte de imágenes*/
    function entreagujasytelas_setup(){
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', array(
            'height'      => 100, // Altura máxima del logotipo
            'width'       => 400, // Ancho máximo del logotipo
            'flex-height' => true, // Permite altura flexible
            'flex-width'  => true, // Permite ancho flexible
        ));
    }

    add_action('after_setup_theme','entreagujasytelas_setup');

   /*Agregar numero de telefono*/
   

    function entreagujasytelas_personalizador($wp_customize) {
        // Agregar una sección en el personalizador
        $wp_customize->add_section('entreagujasytelas_contacto', array(
            'title' => 'Información de contacto', // Título de la sección
            'priority' => 120, // Prioridad de la sección (puedes ajustar este valor según tu diseño)
        ));
    
        // Agregar campo para el número de teléfono
        $wp_customize->add_setting('entreagujasytelas_telefono', array(
            'default' => '', // Valor predeterminado
            'sanitize_callback' => 'sanitize_text_field', // Sanitización del campo
        ));
    
        $wp_customize->add_control('entreagujasytelas_telefono', array(
            'label' => 'Teléfono', // Etiqueta del campo
            'section' => 'entreagujasytelas_contacto', // Asociar el campo a la sección creada anteriormente
            'type' => 'text', // Tipo de campo (en este caso, texto)
        ));
         // Agregar campo para Facebook
         $wp_customize->add_setting('entreagujasytelas_facebook', array(
            'default' => '', // Valor predeterminado
            'sanitize_callback' => 'sanitize_text_field', // Sanitización del campo
        ));
    
        $wp_customize->add_control('entreagujasytelas_facebook', array(
            'label' => 'Facebook', // Etiqueta del campo
            'section' => 'entreagujasytelas_contacto', // Asociar el campo a la sección creada anteriormente
            'type' => 'text', // Tipo de campo (en este caso, texto)
        ));
        // Agregar campo para Instagram
        $wp_customize->add_setting('entreagujasytelas_instagram', array(
            'default' => '', // Valor predeterminado
            'sanitize_callback' => 'sanitize_text_field', // Sanitización del campo
        ));
    
        $wp_customize->add_control('entreagujasytelas_instagram', array(
            'label' => 'Instagram', // Etiqueta del campo
            'section' => 'entreagujasytelas_contacto', // Asociar el campo a la sección creada anteriormente
            'type' => 'text', // Tipo de campo (en este caso, texto)
        ));
    }
    add_action('customize_register', 'entreagujasytelas_personalizador');
    
 // Conmutador de Categorías

    function load_bordados_by_category() {
        $category = $_POST['category'];
    
        if ($category === 'todos') {
            $args = array(
                'post_type' => 'bordados',
                'posts_per_page' => -1, // Mostrar todos los bordados (sin límite)
            );
        } else {
            $args = array(
                'post_type' => 'bordados',
                'category_name' => $category,
                'posts_per_page' => -1, // Mostrar todos los bordados (sin límite)
            );
        }
    
        $bordados = new WP_Query($args);
        
        ob_start();
        echo '<ul class="lista-bordados">';
        while ($bordados->have_posts()) {
            $bordados->the_post();
            // Aquí genera el HTML para mostrar los bordados de esta categoría
           
                echo '<li class="zoom-in">';
                echo '<a href="' . get_permalink() . '" style="background-image: url(' . get_the_post_thumbnail_url() . ')" class="estilo-thumbnail">';
                echo '<div>'.get_the_title().'</div>';
                echo '</a>';
             //   the_field('precio');
            //    echo ' Bs';
                echo '</li>';
        }
        echo '</ul>';
        wp_reset_postdata();
    
        $response = ob_get_clean();
        echo $response;
        wp_die();
    }
    add_action('wp_ajax_load_bordados_by_category', 'load_bordados_by_category');
    add_action('wp_ajax_nopriv_load_bordados_by_category', 'load_bordados_by_category');
    

    function enqueue_slider_scripts() {
        // Enqueue slider-scripts.js with jQuery dependency
        wp_enqueue_script('slider-scripts', get_template_directory_uri() . '/js/slider-scripts.js', array('jquery'), '1.0.0', true);
    
        // Define and localize the ajax_url
        wp_localize_script('slider-scripts', 'slider_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    }
    add_action('wp_enqueue_scripts', 'enqueue_slider_scripts');
    
/*ese codigo No es necesario, ya se puede cambiar desde identidad del sitio, esto solo agrega otra fila abajo llamada logotipo, pero no tiene ningun efecto
    function entreagujasytelas_logotipo($wp_customize) {
        $wp_customize->add_section('tu_tema_logotipo_section', array(
            'title'    => __('Logotipo', 'tu_tema'),
            'priority' => 30,
        ));
    
        $wp_customize->add_setting('tu_tema_logo', array(
            'sanitize_callback' => 'absint',
        ));
    
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'tu_tema_logo', array(
            'label'    => __('Subir Logotipo', 'tu_tema'),
            'section'  => 'tu_tema_logotipo_section',
            'settings' => 'tu_tema_logo',
        )));
    }
    add_action('customize_register', 'entreagujasytelas_logotipo');
*/    

//Editar la pagina de Inicio de WP-ADMIN
    
// Personalizar el logo del área de administración
function custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(' . get_template_directory_uri() . '/img/logo.png); 
            height: 100px; /* Personaliza la altura */
            width: 100px; /* Personaliza el ancho */
            background-size: contain;
        }
    </style>';
}

add_action('login_head', 'custom_login_logo');

// Personalizar la imagen de fondo del área de administración
// Personalizar la imagen de fondo del área de administración
function custom_admin_background() {
    echo '<style type="text/css">
        body.login {
            background-image: url(' . get_template_directory_uri() . '/img/fondo-admin.jpg); /* Reemplaza esta URL con la URL de tu nueva imagen de fondo */
            background-size: cover;
        }
    </style>';
    echo '<style type="text/css">
        form#loginform {
            background: rgba(255,255,255,0.5);
            border: none;
            border-radius: 20px;
        }
        form#loginform label{
            color: #000;
        }
        form#loginform input#wp-submit{
            background: #C85F3D;
            border: 1px solid #F2E789;
        }
        form#loginform input#wp-submit:hover{
            background: #1c1c1c;
            border: 1px solid #C85F3D;
            color: #F2E789;
        }
    </style>';
}

add_action('login_enqueue_scripts', 'custom_admin_background');


?>