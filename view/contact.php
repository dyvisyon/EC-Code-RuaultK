<?php ob_start(); ?>


<div class="row">
    <div class="col-md-12">
        <h2 class="">Contacter Cod'Flix</h2>
        <form action="" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputname">Votre nom</label>
                    <input type="text" name="name" class="form-control" id="inputname" placeholder="Entrez votre nom" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputemail">Votre email</label>
                    <input type="email" name="email" class="form-control" id="inputemail" placeholder="Entrez votre adresse mail" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputmessage"></label>
                    <textarea name="message" id="inputmessage" cols="30" rows="10" class="form-control" placeholder="Entrez un message" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

?>


<?php require('dashboard.php'); ?>