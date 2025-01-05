<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?= URL; ?>accueil">Accueil</a>
        </li>
        <?php if(empty($_SESSION['profil'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL; ?>formLogin">Mon compte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL; ?>creationCompte">Inscription</a>
        </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/deconnexion">Deconnexion</a>
          </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nos services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL; ?>formProgrammeP">Votre programme personnalisé</a></li>
            <li><a class="dropdown-item" href="<?= URL; ?>pageConseil">Nos conseils mensuels</a></li>
          </ul>
        <li class="nav-item">
          <a class="nav-link" href="formContact">Contactez-nous</a>
        </li>
      </ul>
    </div>
  </div>
</nav>