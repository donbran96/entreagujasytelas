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
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function() {
        var element = document.querySelector('.fade-in');
     
        var distancia = window.innerHeight - element.getBoundingClientRect().top;

        // Verifica si el elemento está dentro de la ventana del navegador
        if(distancia >= 100) {
            element.classList.add('is-visible');
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
   
        var element = document.querySelector('.fade-in');
     
        var distancia = window.innerHeight - element.getBoundingClientRect().top;

        // Verifica si el elemento está dentro de la ventana del navegador
        if(distancia >= 100) {
            element.classList.add('is-visible');
        }
   
});

/*popup de inicio*/
document.addEventListener('DOMContentLoaded', function() {
  var popupContainer = document.getElementById('popup-container');

  // Mostrar la ventana emergente después de un retraso (ejemplo: 5 segundos)
  setTimeout(function() {
      popupContainer.classList.add('show');
  }, 5000); // 5000 milisegundos = 5 segundos

  // Ocultar la ventana emergente al hacer clic en el botón de cierre
  var popupCloseButton = document.getElementById('popup-close');
  popupCloseButton.addEventListener('click', function() {
      popupContainer.classList.remove('show');
      console.log('boton de cerrado');
  });

  // Ocultar la ventana emergente al hacer clic fuera de la ventana emergente
  popupContainer.addEventListener('click', function(event) {
      if (event.target === popupContainer) {
          popupContainer.classList.remove('show');
          console.log('cerrado click en la caja');
      }
  });
});


