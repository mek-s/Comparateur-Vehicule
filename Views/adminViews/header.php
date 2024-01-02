<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['base-url']; ?>Views/adminViews/style.css">
    <title>Adminstration comparateur vehicules</title>
</head>
<body>
<div class="sidebar">
    <div id="logo">
        <img src="<?php echo $GLOBALS['base-url'];?>Images/logo.png" alt="">
    </div>
  <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#vehicules"><i class="fa fa-car"></i> Vehicules</a>
  <a href="#users"><i class="fa fa-users"></i> Utilisateurs</a>
  <a href="#contact"><i class="fa fa-commenting-o"></i> Avis</a>
  <a href="#contact"><i class="fa fa-newspaper-o"></i> News</a>
  <button class="dropdown-btn"> <i class="fa fa-cog"></i>  Parametres
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#"> Guides</a>
    <a href="#"> Contacts</a>
    <a href="#"> Diaporama</a>
    <a href="#"> Style</a>
  </div>
  <a href="#"><i class="fa fa-sign-out"></i> Logout</a>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

<div id="mainContent">



