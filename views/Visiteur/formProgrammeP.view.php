<h1> Creation de compte : Personnalisation du profil sportif</h1>
<div class="form-container">
<form action="traitement.php" method="post">
       <!-- Question 1 : Tranche d'âge -->
       <fieldset>
        <legend>Sélectionnez votre tranche d'âge :</legend>
     <div class="label-input-container">
        <div class="option-container">
        <input type="radio" name="age_range" value="1" id="moins-18" ><label for="moins-18">Moins de 18 ans</label>
        </div>
        <div class="option-container">
        <input type="radio" name="age_range" value="2" id="18-30"><label for="18-30">18 à 30 ans</label>
        </div>
        <div class="option-container">
        <input type="radio" name="age_range" value="3" id="31-50"><label for="31-50">31 à 50 ans</label>
        </div>
        <div class="option-container">
        <input type="radio" name="age_range" value="4" id="plus-50"><label for="plus-50">50 ans et plus</label>
        </div>
     </div>
        </fieldset>
          
 
 <!-- Question 2 : Niveau d'activité physique -->
 <fieldset>
        <legend>Quel est votre niveau d'activité physique actuel 
?</legend>
        <div class="option-container">
            <input type="radio" name="niveau" value="gently" id="gently">
            <label for="gently">Je suis peu active</label>
        </div>
        <div class="option-container">
            <input type="radio" name="niveau" value="balance" id="balance">
            <label for="balance">Je fais de l'exercice régulièrement</label>
        </div>
        <div class="option-container">
            <input type="radio" name="niveau" value="advanced" id="advanced">
            <label for="advanced">Je m'entraîne intensivement</label>
        </div>
    </fieldset>

   
  <!-- Question 3 : PB Médicaux -->
  <fieldset>
        <legend>Avez-vous des problèmes médicaux à prendre en compte ?<br> (Exemples : problèmes cardiaques, articulaires, respiratoires, de dos, de poids, etc.)</legend>
        <div class="option-container">
            <input type="radio" id="oui" name="maladie" value="1">
            <label for="oui">Oui</label>
        </div>
        <div class="option-container">
            <input type="radio" id="non" name="maladie" value="0">
            <label for="non">Non</label>
        </div>
    </fieldset>

    <!-- Question 4 : Objectifs -->
    <fieldset>
        <legend>Quel est votre objectif principal ?</legend>
        <div class="option-container">
            <input type="radio" id="cardio" name="objectif" value="cardio">
            <label for="perte-poids">Je souhaite perdre du poids, améliorer ma condition physique et mon endurance.</label>
        </div>
        <div class="option-container">
            <input type="radio" id="tonus" name="objectif" value="tonus">
            <label for="tonus">Mon objectif est de tonifier ma  masse musculaire.</label>
        </div>
<div class="option-container">
        <input type="radio" id="equilibre" name="objectif" value="equilibre">
        <label for="équilibre">Mon objectif est d'améliorer ma stabilité et ma coordination. </label>
    </div>   
<div class="option-container">
            <input type="radio" id="cycle" name="objectif" value="cycle">
            <label for="cycle">Je veux ameliorer la gestion de mon cycle menstruel (douleurs etc...) ou plus generalement améliorer ma gestion du stress et mon bien-être .</label>
        </div>
    </fieldset>

     <!-- Question 5 : Zone du Corps à Cibler -->
     <fieldset>
        <legend>Quelle zone du corps souhaitez-vous cibler principalement  ?</legend>
        <div class="option-container">
            <input type="radio" id="haut-corps" name="zone" value="upper-body">
            <label for="haut-corps">Haut du corps (Upper Body)</label>
        </div>
        <div class="option-container">
            <input type="radio" id="bas-corps" name="zone" value="lower-body">
            <label for="bas-corps">Bas du corps (Lower Body)</label>
        </div>
        <div class="option-container">
            <input type="radio" id="corps-entier" name="zone" value="full-body">
            <label for="full-body">Corps entier (Full Body)</label>
        </div>
    </fieldset>


    <!-- Question 6 : Durée disponible par séance de sport -->
    <fieldset>
        <legend>Quelle durée maximale pouvez-vous consacrer à chaque séance de sport  ?</legend>
        <div class="option-container">
            <input type="radio" id="30min" name="duree_max" value="30">
            <label for="30min">30 minutes</label>
        </div>
        <div class="option-container">
            <input type="radio" id="60min" name="duree_max" value="60">
            <label for="60min">60 minutes</label>
        </div>
    </fieldset>



<!-- Question 7 : Créer un rituel -->
<fieldset>
    <legend>Associez votre séance d'entrainement à un moment clef de votre rituel quotidien:</legend>
    <div class="option-container">
    <input type="radio" id="reveil" name="rituel" value="reveil">
    <label for="reveil">Dès le réveil</label>
    </div>
    <div class="option-container">
    <input type="radio" id="petit-dej" name="rituel" value="petit-dej">
    <label for="petit-dej">Avant ou après le petit déjeuner</label>
    </div>
    <div class="option-container">
    <input type="radio" id="douche" name="rituel" value="douche">
    <label for="douche">Avant ou après la douche</label>
    </div>
    <div class="option-container">
    <input type="radio" id="pause-dej" name="rituel" value="pause-dej">
    <label for="pause-dej">Avant ou après la pause déjeuner</label>
    </div> 
    <div class="option-container">
    <input type="radio" id="diner" name="rituel" value="diner">
    <label for="diner">Avant ou après le dîner</label>
    </div>
    <div class="option-container">
    <input type="radio" id="afterwork" name="rituel" value="afterwork">
    <label for="afterwork">Après le travail</label>
    </div>
    <div class="option-container">
    <input type="radio" id="sommeil-enfants" name="rituel" value="sommeil-enfants">
    <label for="sommeil-enfants">Après le coucher/sieste des enfants</label>
    </div>
    <div class="option-container">
    <input type="radio" id="flexible" name="rituel" value="flexible">
    <label for="flexible">Je préfère décider au jour le jour</label>
    </div>
</fieldset>

    <!-- Question 8 : Jours de la semaine pour programmer les séances -->
    <fieldset>
        <legend>Programmez le  nombre de jours de vos séances d'entraînement :</legend>
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="lundi" id="lundi">
        <label for="lundi">Lundi</label>
        </div>
        
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="mardi" id="mardi">
        <label for="mardi">Mardi</label>
    </div>
        
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="mercredi" id="mercredi">
        <label for="mercredi">Mercredi</label>
    </div>
         
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="jeudi" id="jeudi">
        <label for="jeudi">Jeudi</label>
    </div>
        
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="vendredi" id="vendredi">
        <label for="vendredi">Vendredi</label>
    </div>
        
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="samedi" id="samedi">
        <label for="samedi">Samedi</label>
    </div>
        
        <div class="option-container">
        <input type="checkbox" name="jours[]" value="dimanche" id="dimanche">
        <label for="dimanche">Dimanche</label>
        </div>
    </fieldset>


    <button class=btn-p>Accéder à mon programme </button>
</form>
</div>


