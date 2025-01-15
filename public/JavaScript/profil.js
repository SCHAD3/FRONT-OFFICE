

document.getElementById('btnModifMail').addEventListener('click', function() {
    document.getElementById('modifMail').classList.toggle('d-none');
});

document.getElementById('btnModifZone').addEventListener('click', function() {
  document.getElementById('modifZone').classList.toggle('d-none');
});

document.getElementById('btnModifDuree').addEventListener('click', function() {
  document.getElementById('modifDuree').classList.toggle('d-none');
});

document.getElementById('btnModifJours').addEventListener('click', function() {
  const modifJours = document.getElementById('modifJours');
  modifJours.classList.toggle('d-none');
});

document.getElementById('btnModifObjectif').addEventListener('click', function() {
  document.getElementById('modifObjectif').classList.toggle('d-none');
});

document.getElementById('btnModifNiveau').addEventListener('click', function() {
  document.getElementById('modifNiveau').classList.toggle('d-none');
});

document.getElementById('btnModifRituel').addEventListener('click', function() {
  document.getElementById('modifRituel').classList.toggle('d-none');
});

    var swiper = new Swiper('.Slider-container', {
      effect: 'cards',
      grabCursor: true,
      centeredSlides: true,
      loop: true,
    });


// document.getElementById('drawCard').addEventListener('click', function() {
//   document.getElementById('loading').style.display = 'block';// Afficher le spinner
//   setTimeout(function() {
//     document.getElementById('loading').style.display = 'none';// Cacher le spinner
//     document.getElementById('exerciseSlider').style.display = 'block';// Afficher le carrousel d'exercices
//     document.getElementById("exerciseSlider").classList.add("mb-5"); // Ajouter une marge inférieure pour éviter le chevauchement
//   }, 600); // Simuler un chargement de 600 millisecondes
// });

document.getElementById('drawCard').addEventListener('click', function () {
  console.log('Bouton cliqué');
  const slider = document.getElementById('exerciseSlider');
  if (slider) {
      slider.style.display = 'block';
      console.log('Slider affiché');
  }
});


// if(drawButton) { // Vérifier que le bouton existe
//   drawButton.addEventListener('click', function() {
//       const loadingSpinner = document.getElementById('loading');
//       const exerciseSlider = document.getElementById('exerciseSlider');
      
//       if(loadingSpinner && exerciseSlider) { // Vérifier que les éléments existent
//           loadingSpinner.style.display = 'block'; // Afficher le spinner
          
//           setTimeout(function() {
//               loadingSpinner.style.display = 'none'; // Cacher le spinner
//               exerciseSlider.style.display = 'block'; // Afficher le carrousel
//               exerciseSlider.classList.add("mb-5"); // Ajouter la marge
              
//               // Réinitialiser le carousel Bootstrap
//               const carousel = new bootstrap.Carousel(exerciseSlider, {
//                   interval: false // Désactive le défilement automatique
//               });
//           }, 600);
//       }
// //   });
// }

