<?php 
$directory = "dossier";
$images = glob($directory . "/*.JPG");

foreach($images as $fichier)
{
    $taille = getimagesize($fichier);
    $longueur = 800;
    $largeur = 500;
    $img_big = imagecreatefromjpeg($fichier);
    $img_new = imagecreate($longueur, $largeur);
    //CREATION DE LA MINIATURE
    $img_petite = imagecreatetruecolor($longueur, $largeur) or $img_petite = imagecreate($longueur, $largeur);

    //COPIE DE L'IMAGE REDIMENSIONNEE
    imagecopyresized($img_petite,$img_big,0,0,0,0,$longueur,$largeur,$taille[0],$taille[1]);
    imagejpeg($img_petite,$fichier);
}