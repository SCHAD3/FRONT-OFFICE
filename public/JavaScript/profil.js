

document.getElementById('btnModifMail').addEventListener('click', function() {
    document.getElementById('modifMail').classList.toggle('d-none');
});



    var swiper = new Swiper('.Slider-container', {
      effect: 'cards',
      grabCursor: true,
      centeredSlides: true,
      loop: true,
    });


document.getElementById('drawCard').addEventListener('click', function() {
  document.getElementById('loading').style.display = 'block';// Afficher le spinner
  setTimeout(function() {
    document.getElementById('loading').style.display = 'none';// Cacher le spinner
    document.getElementById('exerciseSlider').style.display = 'block';// Afficher le carrousel d'exercices
    document.getElementById("exerciseSlider").classList.add("mb-5"); // Ajouter une marge inférieure pour éviter le chevauchement
  }, 600); // Simuler un chargement de 600 millisecondes
});
