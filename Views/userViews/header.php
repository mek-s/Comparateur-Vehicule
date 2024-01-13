<?php
require_once("C:\wamp64\www\Comparateur-Vehicule\Models\home.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base-url']; ?>Views/userViews/style.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base-url']; ?>Views/assets/style.css">
    <title>Comparateur Vehicules</title>
</head>
<body>

<header>
    <div id="logo">
        <img src="<?php echo $GLOBALS['base-url'];?>Images/logo.png" alt="">
    </div>
    <div class="right-content">
    <div class="contacts">
        <?php
          $c = new userHomeController();
          $contacts = $c->getContactsController();
          foreach ($contacts as $contact) {
           echo '<a href="'.$contact['value'].'">
                     <img src="'.$GLOBALS['base-url'].'Images/contacts/'.$contact['chemin'].'"/>
                </a>';
          }
        ?>
    </div>
    <div class="connexion">
    <?php 
   
    if (isset($_SESSION['auth_u']) && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        echo '<a href="/Comparateur-Vehicule/profil?user=' . $user_id . '" style="color:black;">Profil</a>';
        echo '<a href="/Comparateur-Vehicule/logout" style="color:black;">Logout</a>';
    } else {
        echo '<a href="/Comparateur-Vehicule/signin" style="color:black;">Sign in</a>';
        echo '<a href="/Comparateur-Vehicule/signup" style="color:black;">Sign up</a>';
    }
    ?>
</div>

    </div>   
</header>
<div class="content">
  