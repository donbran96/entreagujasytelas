<?php get_header(); ?>

<main class="contenedor-ancho contenedor_borde">
  <div class="contenedor">
    <?php
      echo '<h2 class="titulos">'.get_the_title().'</h2>';
      // Obtener la galería de imágenes
      $galeria = get_field('fotos_del_bordado');
      // Comprobar si hay imágenes en la galería
      if ($galeria) {
        echo '<div class="galeria-imagenes">';
        // Iterar sobre cada imagen y mostrarla
        foreach ($galeria as $imagen) {
          echo '<a href="#"><img src="' . $imagen['url'] . '" alt="' . $imagen['alt'] . '"></a>';
        }
        echo '</div>';
      }
      echo '<div class="descripcion caja-estrecha">'.get_field('descripcion').'</div>';
      echo '<div class="precio caja-estrecha">Precio: '.get_field('precio').' Bs</div>';
      echo '<div class="caja-estrecha">Pídelo ahora! 😊</div>';
    ?>
    <?php
      // Obtiene el número de teléfono del personalizador
      $telefono = get_theme_mod('entreagujasytelas_telefono', '');
    ?>
    <div class="telefono caja-estrecha">
      <a href="https://api.whatsapp.com/send/?phone=591<?php echo $telefono; ?>&text&type=phone_number&app_absent=0" target="_blank" class="facebook-icon">
        <i class="fa-brands fa-whatsapp icono-whatsapp"><?php echo $telefono; ?></i>
      </a>
    </div>
  </div>
</main>
<div id="modal-gallery" class="modal">
  <span class="close">&times;</span>
  <div class="modal-content">
    <img id="modal-image" src="" alt="">
    <a class="prev">&#10094;</a>
    <a class="next">&#10095;</a>
  </div>
</div>
<script>
jQuery(document).ready(function($) {
  // Obtener la galería de imágenes
  var galeria = <?php echo json_encode($galeria); ?>;
  var modal = document.getElementById("modal-gallery");
  var modalImage = document.getElementById("modal-image");
  var currentIndex = 0;

  // Función para abrir la galería modal con una imagen específica
  function openModal(index) {
    currentIndex = index;
    modalImage.style.opacity = "0"; // Oculta la imagen
    modalImage.src = galeria[currentIndex].url;
    modal.style.display = "block";
    toggleNavigation();
    setTimeout(function() {
      modalImage.style.opacity = "1"; // Muestra la imagen con transición
    }, 50); // Agrega un pequeño retraso para que se aplique la transición
  }

  // Mostrar la galería modal al hacer clic en una imagen
  $(".galeria-imagenes a").on("click", function(e) {
    e.preventDefault();
    var index = $(this).index();
    openModal(index);
  });

  // Cerrar la galería modal
  $(".close").on("click", function() {
    modal.style.display = "none";
  });

  
  // Navegar a la imagen anterior
  $(".prev").on("click", function() {
    currentIndex = (currentIndex - 1 + galeria.length) % galeria.length;
    modalImage.style.opacity = "0"; // Oculta la imagen con transición
    setTimeout(function() {
      modalImage.src = galeria[currentIndex].url;
      modalImage.style.opacity = "1"; // Muestra la imagen con nueva transición
      toggleNavigation();
    }, 300); // Espera a que se complete la transición antes de cambiar la imagen
  });

 // Navegar a la siguiente imagen
 $(".next").on("click", function() {
    currentIndex = (currentIndex + 1) % galeria.length;
    modalImage.style.opacity = "0"; // Oculta la imagen con transición
    setTimeout(function() {
      modalImage.src = galeria[currentIndex].url;
      modalImage.style.opacity = "1"; // Muestra la imagen con nueva transición
      toggleNavigation();
    }, 300); // Espera a que se complete la transición antes de cambiar la imagen
  });

    // Cerrar la galería modal con transición suave
  $(".close").on("click", function() {
    
    setTimeout(function() {
      modalImage.style.opacity = "0"; // Oculta la imagen con transición
      modal.style.display = "none";
    }, 3000); // Espera a que se complete la transición antes de cerrar la galería
  });

  // Mostrar las flechas de navegación
  function toggleNavigation() {
    $(".prev, .next").css("display", "block");
  }
});
</script>





<?php get_footer(); ?>
   
