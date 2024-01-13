<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base-url']; ?>Views/adminViews/style.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base-url']; ?>Views/assets/style.css">
    <script src="<?php echo $GLOBALS['base-url']; ?>Views/assets/jquery-3.6.0.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" /><link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <title>Adminstration comparateur vehicules</title>
</head>
<body>
<div class="sidebar">
    <div id="logo">
        <img src="<?php echo $GLOBALS['base-url'];?>Images/logo.png" alt="">
    </div>
  <a href="/Comparateur-Vehicule/admin"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="/Comparateur-Vehicule/admin/marques"><i class="fa fa-car"></i> Vehicules</a>
  <a href="/Comparateur-Vehicule/admin/avis"><i class="fa fa-commenting-o"></i> Avis</a>
  <a href="/Comparateur-Vehicule/admin/news"><i class="fa fa-newspaper-o"></i> News</a>
  <a href="/Comparateur-Vehicule/admin/users"><i class="fa fa-users"></i> Utilisateurs</a>
  <button class="dropdown-btn"> <i class="fa fa-sliders"></i>  Parametres
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="/Comparateur-Vehicule/admin/parametres/guides"> Guides</a>
    <a href="/Comparateur-Vehicule/admin/parametres/contacts"> Contacts</a>
    <a href="/Comparateur-Vehicule/admin/parametres/diaporama"> Diaporama</a>
    <a href="/Comparateur-Vehicule/admin/parametres/style"> Style</a>
  </div>
  <a href="/Comparateur-Vehicule/logout"><i class="fa fa-sign-out"></i> Logout</a>
</div>

<div id="mainContent">



