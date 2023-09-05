document.addEventListener("DOMContentLoaded", function() {
  const slides = document.querySelectorAll(".slideshow .slide");
  let currentIndex = 0;

  // Función para mostrar la siguiente diapositiva
  function showNextSlide() {
      slides[currentIndex].classList.remove("active", "ken-burns"); // Quita la clase ken-burns
      currentIndex = (currentIndex + 1) % slides.length;
      slides[currentIndex].classList.add("active", "ken-burns"); // Agrega la clase ken-burns
      setTimeout(showNextSlide, 5000); // Cambiar cada 3 segundos (ajusta el tiempo según tus preferencias)
  }

  // Mostrar la primera diapositiva y comenzar el cambio automático
  slides[currentIndex].classList.add("active", "ken-burns"); // Agrega la clase ken-burns
  setTimeout(showNextSlide, 5000); // Cambiar cada 3 segundos (ajusta el tiempo según tus preferencias)
});

//pagina de bordados
jQuery(document).ready(function($) {
  $('.category-link').on('click', function() {
      var category = $(this).data('category');
      $('.category-link').removeClass('selected');
        $(this).addClass('selected');
      $.ajax({
          url: slider_ajax.ajax_url, // Use the localized ajax_url
          type: 'post',
          data: {
              action: 'load_bordados_by_category',
              category: category
          },
          success: function(response) {
              $('#bordados-container').html(response);
          }
      });
  });
});
//galeria modal en sigle bordado


