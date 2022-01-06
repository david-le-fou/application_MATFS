<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <head>
        <title>Personnels de MATSF</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">  
        <script id="logo1" src="<?php echo base_url("assets/js/jquery-3.2.1.min.js");?>"></script>
        <script id="logo2" src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
        <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/index.css");?>" rel="stylesheet">
    </head>
<body>


<nav class="navbar navbar-inverse tete" style ="background-image: url(<?php echo base_url("assets/images/ingenieur.jpg");?>);background-size: cover;background-position: center;">
  <div style="background: rgba(217, 224, 214, 0.562);     height: 120px;">
    <div class="navbar-header">
        <a class="navbar-brand" href="http://[::1]/MATSF/drh/index.php/">
            <img src="<?php echo base_url("assets/images/ima.jpg");?>" style="width:35%;">
        </a>
    </div>
    <div class="navbar-collapse" id="myNavbar">
        CONSULTATION AGENT MATP
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center" style ="background-size: cover;background-position: center;background-image: url(<?php echo base_url("assets/images/batiment5.jpg");?>);">

  <div class="titre-fiche">
    
    <?php echo form_open('Personnel/search'); ?> 
    <form>
        FICHE INDIVIDUELLE
        <?php if(isset($user_name)){ ?>
            <input type="text" name="matri" placeholder="matricule">
            <button class="btn btn-secondary">Rechercher</button>
        <?php } ?>
    </form>
    <?php echo form_close(); ?>

</div>
