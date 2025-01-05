
<h1 class="mb-3">Mon profil sportif</h1>
<!-- Profil utilisateur -->
<div class="container d-flex justify-content-center align-items-start">
<div class="row">
<div class="col-md-4">
    <div class="card text-center shadow p-3 mt-5">
        <div class="card-body position-relative ">
            <!-- Image ou Initiales -->
            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3 position-relative"
                 style="width: 100px; height: 100px;">
                <?php if (!empty($utilisateur['image'])): ?>
                    <img src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" 
                         alt="avatar" 
                         class="rounded-circle" 
                         style="width: 100%; height: 100%;" 
                         onclick="document.getElementById('image').click();" />
                  <?php else: ?>
    <span class="fw-bold text-secondary">
        <?php 
        $loginParts = explode(' ', $utilisateur['login']);
        if (count($loginParts) > 1) {
            // Afficher les initiales si le login contient deux mots ou plus
            echo strtoupper(substr($loginParts[0], 0, 1) . substr($loginParts[1], 0, 1));
        } else {
            // Afficher uniquement la première lettre du mot si le login est composé d'un seul mot
            echo strtoupper(substr($utilisateur['login'], 0, 1));
        }
        ?>
    </span>
<?php endif; ?>
                <!-- Input file pour télécharger une photo de profil -->
                <form method="POST" action="<?= URL ?>compte/validation_modifImage" enctype="multipart/form-data">
                    <label for="image" class="custom-file-upload position-absolute" style="bottom: -10px; right: -10px;">
                        &#x1F39E;&#xFE0F;
                    </label>
                    <input type="file" 
                           class="form-control-file d-none" 
                           id="image" 
                           name="image" 
                           onchange="this.form.submit();" />
                </form>
            </div>

            <!-- Email -->
            <p class="card-text text-muted" id="btnModifMail">
                Email: <?= htmlspecialchars($utilisateur['mail']); ?>
                <button class="btn btn-light" id="btnModifMail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                </button>
            </p>
            <div id="modifMail" class="d-none">
                <form method="POST" action="<?= URL; ?>compte/validation_modifMail">
                    <div class="row">
                        <label for="mail" class="col-2 col-form-label">Mail :</label>
                        <div class="col-8">
                            <input type="mail" class="form-control" name="mail" value="<?= $utilisateur['mail'] ?>" />
                        </div>
                        <div class="col-2">
                            <button class="btn btn-success" id="btnValidModifMail" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Password -->
            <div>
                <a href="<?= URL ?>compte/modifPassword" class="btn btn-dark">Modifier mon mot de passe</a>
            </div>
        </div>
    </div>
</div>



        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">Ma routine sportive</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Programme initial</td>
                        <td><?= htmlspecialchars($utilisateur['zone']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Objectif sur mesure</td>
                        <td><?= htmlspecialchars($utilisateur['objectif']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Niveau initial</td>
                        <td><?php echo $this->adapterNiveau($utilisateur); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Moment clef du rituel</td>
                        <td><?= htmlspecialchars($utilisateur['rituel']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Séances à suivre</td>
                        <td><?= htmlspecialchars($utilisateur['jours']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Durée maximale de la séance</td>
                        <td><?= htmlspecialchars($utilisateur['duree_max']); ?> min</td>
                        <td>
                            <button class="btn btn-light btn-sm" id="btnModifMail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>




<h1 class="mb-3 mt-3">Démarrer ma séance</h1>

      <div class="swiper Slider-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
          <div class="swiper-slide">
            <img src="<?= URL; ?>public/Assets/images/logo-rectangle.png" alt="Image de la diapositive" />
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-1">
        <button id="drawCard" class="btn btn-dark mt-1 mx-auto d-block">Je pioche mes exercices</button>
        <div id="loading" class="spinner-border text-danger ms-3" role="status" style="display: none;">
          <span class="sr-only">Chargement...</span>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>


  
      <div id="exerciseSlider" class="carousel slide mt-5 position-relative z-index-3" data-bs-ride="carousel" data-bs-interval="600" style="display: none;">
        <div class="carousel-inner">
          <!-- Exercice 1 -->
          <div class="carousel-item active">
            <div class="row no-gutters">
              <!-- Colonne pour l'image -->
              <div class="col-md-6">
                <img src="<?= URL; ?>public/Assets/images/sumo-squat-advance.jpg" class="d-block w-100" alt="Exercice 1">
              </div>
              <!-- Colonne pour la description -->
              <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                <h5>Squats</h5>
                <p>Faites 15 répétitions de squats pour renforcer vos jambes.</p>
              </div>
            </div>
          </div>
          <!-- Exercice 2 -->
          <div class="carousel-item">
            <div class="row no-gutters">
              <!-- Colonne pour l'image -->
              <div class="col-md-6">
                <img src="<?= URL; ?>public/Assets/images/card2.jpg" class="d-block w-100" alt="Exercice 2">
              </div>
              <!-- Colonne pour la description -->
              <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                <h5>Pompes</h5>
                <p>Effectuez 10 pompes pour travailler le haut de votre corps.</p>
              </div>
            </div>
          </div>
          <!-- Exercice 3 -->
          <div class="carousel-item">
            <div class="row no-gutters">
              <!-- Colonne pour l'image -->
              <div class="col-md-6">
                <img src="<?= URL; ?>public/Assets/images/card3.jpg" class="d-block w-100" alt="Exercice 3">
              </div>
              <!-- Colonne pour la description -->
              <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                <h5>Planche</h5>
                <p>Maintenez une position de planche pendant 30 secondes.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Contrôles du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#exerciseSlider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#exerciseSlider" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Suivant</span>
        </button>
      </div>
    </div>
  </div>
</div>













