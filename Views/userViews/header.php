<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\home.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/userViews/style.css">
    <title>Comparateur Vehicules</title>
</head>
<body>

<header>
    <div id="logo">
        <img src="Images/logo.png" alt="">
    </div>
    <div class="right-content">
    <div class="contacts">
        <?php
          $m = new homeModel();
          $contacts = $m->getContacts();
          foreach ($contacts as $contact) {
           echo '<a href="'.$contact['value'].'">
                     <img src="Images/'.$contact['chemin'].'"/>
                </a>';
          }
        ?>
    </div>
    <div class="connexion">
       <button>Sign in</button>
       <button>Sign up</button>
    </div>
    </div>   
</header>
<div class="content">
  