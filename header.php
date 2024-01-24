<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); echo ' | '; bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-435L848B78"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-435L848B78');
</script>

<body>
    <header class="header">
        <div class="contenedor">
            <div class="logo">
                <?php if (function_exists('the_custom_logo')) {
                     the_custom_logo();
                    } 
                ?>
            </div>
            <?php
                $args=array(
                    'theme_location'=>'menu-principal',
                    'container'=>'nav',
                    'container_class'=>'menu-principal nav'
                );
                wp_nav_menu($args);
                $facebook = get_theme_mod('entreagujasytelas_facebook', '');
                $instagram = get_theme_mod('entreagujasytelas_instagram', '');
                $telefono = get_theme_mod('entreagujasytelas_telefono', '');
            ?>
            <div class="redes-sociales">
                 <a href="<?php echo $facebook; ?>" target="_blank" class="facebook-icon">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="<?php echo $instagram; ?>" target="_blank" class="instagram-icon">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </header>
<!--
    <div class="transition-overlay">
    <?php /*if (function_exists('the_custom_logo')) {
                     the_custom_logo();
                    } 
                */?>
</div>

                -->