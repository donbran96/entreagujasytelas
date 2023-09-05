<footer class="contenedor">
    <div class="redes-sociales ancho">
        <a href="<?php echo $facebook; ?>" target="_blank" class="facebook-icon">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="<?php echo $instagram; ?>" target="_blank" class="instagram-icon">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
    <p><?php bloginfo('name'); echo ' - '.date('Y') ?></p>
    <p class="italic">Desarrollado por <a href="https://api.whatsapp.com/send/?phone=75608032&text&type=phone_number&app_absent=0" target="_blank" class="italic">Brandon Cuéllar</a></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>