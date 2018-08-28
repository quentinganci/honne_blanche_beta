<?php
if (isset($_POST["submit"])) {
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pays = $_POST['pays'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Hedone Blanche Demande ';
    $to = 'quentin.ganci@gmail.com';
    $subject = 'Nouveau message';

    $body ="Nom: $name\n Prénom: $prenom\n  Pays: $pays\n E-Mail: $email\n Numero: $telephone\n Message: $message";


    // Check if name has been entered
    if (!$_POST['nom']) {
        $errName = 'Merci de renseigner votre nom';
    }

    if (!$_POST['prenom']) {
        $errPrenom = 'Merci de renseigner votre prénom';
    }

    if (!$_POST['pays']) {
        $errPays = 'Merci de renseigner votre pays';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Merci de renseigner votre email';
    }

    if (!$_POST['telephone']) {
        $errTelephone = 'Merci de renseigner votre numéro de téléphone';
    }
    //Check if message has been entered
    if (!$_POST['message']) {
        $errMessage = 'Merci de renseigner votre message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
        $errHuman = 'Le numéro est incorrecte';
    }

// If there are no errors, send the email
    if (!$errName &&  !$errPrenom && !$errPays && !$errEmail && !$errMessage && !$errTelephone && !$errHuman) {
        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Merci ! Une réponse vous sera communiquée rapidement.</div>';
} else {
$result='<div class="alert alert-danger">Désolé, une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.</div>';
}
}
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact demande</title>
    <link href="./stylesheets/all.css" rel="stylesheet" />
    <script src="./javascripts/site.js"></script>
  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-dark " style="opacity: 1; position: relative!important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hedone_blanche_menu" aria-controls="hedone_blanche_menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="hedone_blanche_menu">
        <div class="navbar-nav" style="opacity: 1;background: black;">
            <a class="nav-item nav-link " data-menuanchor="#page3" href="./index.html#page3">SAC MATRIOCHKA</a>
            <a class="nav-item nav-link" data-menuanchor="#page4" href="./index.html#page4">HISTOIRE</a>
            <a class="navbar-brand" href="/">
                <img src="./images/pictogrammes/logo_menu_blanc.svg" alt="Hedonne Blanche Paris" width="200" height="50">
            </a>
            <a class="nav-item nav-link" data-menuanchor="#page4" href="./index.html#page5">SAVOIR-FAIRE</a>
            <a class="nav-item nav-link" data-menuanchor="#page5" href="./index.html#page6">CONTACT</a>
        </div>
    </div>
</nav>

<div id="formulaire_section">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="lef_section_contact">
                    <div class="container">
                        <div class="row">
                            <div class="barre"></div>
                            <h1>Demandes</h1>

                        </div>
                        <div class="row">
                            <h3>CONTACT</h3>
                        </div>
                        <form role="form" method="post" action="demandes_contact.php">
                            <div class="form-group">
                                <div class="col-10">
                                    <?php echo $result; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group col-5">
                                    <input type="text" required="required" name="nom" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nom</label>
                                    <?php echo "<p class='text-danger'>$errName</p>";?>
                                </div>
                                <div class="group col-6">
                                    <input type="text" required="required" name="prenom" value="<?php echo htmlspecialchars($_POST['prenom']); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Prénom</label>
                                    <?php echo "<p class='text-danger'>$errPrenom</p>";?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="group">
                                    <input type="text" required="required"name="pays" value="<?php echo htmlspecialchars($_POST['pays']); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Pays</label>
                                    <?php echo "<p class='text-danger'>$errPays</p>";?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="group">
                                    <input type="email" required="required" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Mail</label>
                                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="group">
                                    <input type="number" required="required" name="telephone" value="<?php echo htmlspecialchars($_POST['telephone']); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Téléphone</label>
                                    <?php echo "<p class='text-danger'>$errTelephone</p>";?>
                                </div>
                            </div>
                            <div class="group">
                                <textarea type="textarea" rows="5" required="required" name="message"><?php echo htmlspecialchars($_POST['message']);?> </textarea>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Message</label>
                                <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                            <div class="form-row">
                                <div class="group">
                                    <input type="text" required="required" name="human" />
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>2 + 3 = ?</label>
                                    <?php echo "<p class='text-danger'>$errHuman</p>";?>
                                </div>
                            </div>
                            <div class="btn-box">
                                <button id="submit" name="submit" value="Send" class="btn btn-submit" type="submit">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="right_section_contact">
                    <h1>Plus qu’un service, une offre qui vous ressemble. Demander à être immer- gé dans notre univers. Vivez Hedone Blanche au-delà d’une demande, une expérience.</h1>
                    <p>Le Service Relations Clientèle de la Maison Hedone Blanche se tient à votre entière disposition pour toutes questions</p>
                </div>
            </div>
        </div>
    </div>
</div>

  </body>
</html>