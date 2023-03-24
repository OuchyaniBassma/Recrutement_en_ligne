
<?php require('database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php require('head.php'); ?>
<link rel="stylesheet" href="messages.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
<div class="div1">
    
    <h1> Recrutement <span> $ En ligne</span></h1>
    
    </div> 
    <br><br><br> 


<div class="error">
            <?php
        if(isset($errormssg)){
            echo $errormssg ;}
            ?>
            </div>
<?php
$req=$bdd->prepare('SELECT * FROM messages WHERE email_destinataire=?');
$req->execute(array($_SESSION['email']));
if($req->rowcount()==0){
    $errormssg='aucun mssg a afficher pour le moment';

}else?>
    <div class="nv"><strong><i>boîte de réception</i></strong></div>
    <form method="POST" action="">
<table>
    <tr><td class="td1"><strong>E-mail de l'auteur :</strong></td><td class="td2"><strong>Messages :</strong></td><td class="td5"><strong>date d'envoie :</strong></td></tr>
<?php 
    
    while($result=$req->fetch()){
        echo '<tr><td class="td3">'.$result['email_auteur'];echo '</td><td class="td4">'.$result['message'];echo '</td><td class="td6">'.$result['dateEnvoie'];echo '</td></tr>';
    }

    ?>
    </table></form>

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
<a href="pageRecruteurFran.php">Retour</a>
</body>
</html>
