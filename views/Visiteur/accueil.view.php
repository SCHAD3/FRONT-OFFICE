<!-- <foreach($utilisateurs as $utilisateur){
echo $utilisateur['login']."-" .$utilisateur['password'];
} --> 
<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Eclore en force,<br> fleurir en courage !</h1>
        <p class="lead text-muted">Bienvenue dans votre espace de developpement personnel. <br>
        Pas le temps de vous rendre dans une salle de sport ?<br> L'équipe Coach.Me vous accompagne à chaque etape de votre projet de remise en forme à domicile. </p>
        <p>
    <a href="<?= URL ?>pageConseil" class="btn btn-p my-2">Nos conseils du mois</a>
    <a href="#" class="btn btn-p my-2">Mon programme sur mesure</a>
</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
    <h2 class="text-center mb-5"> Quelle partie du corps souhaitez-vous cibler? </h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?= URL; ?>public/Assets/images/card3.jpg" width="100%" height="225" alt="posture sportive silhouette feminine en trait continu" />

            <div class="card-body">
              <p class="card-text"><strong>UPPER-BODY:<br></strong> Muscler vos bras, votre dos et vos abdos et augmentez le niveau de difficulté progressivement grace à notre palette d'exercices variés. </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="<?= URL; ?>public/Assets/images/card1.jpg" width="100%" height="225" alt="posture sportive silhouette feminine en trait continu " />

            <div class="card-body">
              <p class="card-text"><strong>LOWER-BODY:<br></strong> Redesssinez vos jambes et vos courbes naturelles en créant une habitude durable pour retrouver force et souplesse.<br></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?= URL; ?>public/Assets/images/card2.jpg" width="100%" height="225" alt="posture sportive silhouette féminine en trait continu" />
            <div class="card-body">
              <p class="card-text"><strong>FULL-BODY:<br></strong> Ce programme complet vous propose un rituel programmé intégrant une répartition équilibrée d'exercices pour tout le corps.</p>
            </div>
          </div>
        </div>
      </div>

     
      <div class="text-center mt-4">
        <a href="<?= URL ?>creationCompte" class="btn btn-inverse my-2">J'accede au questionnaire personnalisé</a>
      </div>

    </div>
  </div>
</main>