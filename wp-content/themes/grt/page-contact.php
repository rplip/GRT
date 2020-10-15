<?php
/*
Template Name: Contact
*/?>

<?php get_header(); ?>
<section id="contact" class="container">
        <div class="row">

            <div class="col12">
                Prenez contact avec nous
            </div>
        </div>
        <div class="row">
        <?php if (isset($_GET['formError'])) {
                echo '<div class="alert alert-danger" role="alert">';
                    switch ($_GET['formError'])
                    {
                        case 'none' :
                            echo 'Formulaire envoyé';
                            break;

                        case 'shortName' :
                            echo 'Nom trop court.';
                            break;

                        case 'longName' :
                            echo 'Nom trop long.';
                            break;

                        case 'shortFirstname' :
                            echo 'Prénom trop court.';
                            break;

                        case 'longFirstname' :
                            echo 'Prénom trop long.';
                            break;

                        case 'shortPosition' :
                            echo 'Fonction trop courte.';
                            break;

                        case 'longPosition' :
                            echo 'Fonction trop longue.';
                            break;

                        case 'shortObject' :
                            echo 'Objet trop court.';
                            break;

                        case 'longObject' :
                            echo 'Objet trop long.';
                            break;

                        case 'shortMessage' :
                            echo 'Message trop court.';
                            break;

                        case 'email' :
                            echo 'Adresse email invalide';
                            break;

                        default :
                            echo 'Une erreur est survenue.';

                    }

                echo '</div>';

            } ?>
        </div>
        <div class="row">
            <form class="needs-validation" novalidate method="post" action="pipeau">
                <?php wp_nonce_field('make-contact', 'contact-verif'); ?>

                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="contactFormName">Nom *</label>
                        <input type="text" class="form-control" id="contactFormName" value="" name="name" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contactFormName">Prénom *</label>
                        <input type="text" class="form-control" id="contactFormFirstname" value="" name="firstname" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contactFormName">Fonction *</label>
                        <input type="text" class="form-control" id="contactFormPosition" value="" name="position" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contactFormEmail">Adresse email *</label>
                        <input type="email" class="form-control" id="contactFormEmail" name="email" value="" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contactFormObject">Objet du message *</label>
                        <input type="text" class="form-control" id="contactFormObject" name="object" value="" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contactFormMessage">Message *</label>
                        <textarea id="contactFormMessage" class="form-control" name="message" style="height: 25vh;" required=""></textarea>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                    </div>
                </div>
                <p>
                    * Tous les champs sont obligatoires
                </p>
                <button class="btn btn-primary" type="submit" name="contact-form">Envoyer</button>
            </form>
        </div>
</section>
<script>

(function() {
  'use strict';
  window.addEventListener('load', function() {
    
    let forms = document.getElementsByClassName('needs-validation');
    
    let validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php get_footer(); ?>