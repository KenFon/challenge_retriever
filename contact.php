<?php
require_once  "class/Guestbook.php";
require_once  "class/Message.php";


$title = "Contact";
$error=null;
$sucess=false;
$guestbook = new Guestbook("." . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message');

if (isset($_POST['username'], $_POST['message'])){
    $message= new Message($_POST['username'], $_POST['message']);

    if ($message->isValid()){
        $guestbook->addMessage($message);
        $sucess=true;
        $_POST = [];
    }else{
        $error= $message->getErrors();
        var_dump($error);
    }
}



$messages=$guestbook->getMessage();

require "elements/header.php" ?>


    <div class="container content blue-grey lighten-4 z-depth-4 contact">
        <h1>Contactez-Nous !</h1>
        <?php if (!empty($error)) : ?>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card red">
                        <div class="card-content white-text">
                            <p>Formulaire Invalide, le nom dois comporter plus de 2 caractéres et le message plus de 5 caractére</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>


        <?php if ($sucess) : ?>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card green">
                        <div class="card-content white-text">
                            <p>Merci de votre message</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <form action="" method="POST">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Votre Pseudo" id="first_name" type="text" class="validate" name="username">
                    <label for="first_name">Votre nom</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="message" type="text" class="materialize-textarea" name="message" value="<?=htmlentities($_POST['message'] ?? '')?>"></textarea>
                    <label for="message">Votre message</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light green darken-2" type="submit" name="submit">Submit</button>

        </form>
    </div>

    <?php require "elements/footer.php" ?>