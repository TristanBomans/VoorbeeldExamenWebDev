<?php
include_once ("../Models/Contact.php");
include_once ("../DAOs/ExamenDAO.php");
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 9/06/2017
 * Time: 22:43
 */

if (isset($_POST['addFavorite'])){
    $id = $_POST['project-id'];
    $string = "favorite-$id";
    setcookie($string, $id, time() + (10 * 365 * 24 * 60 * 60), "/");
    echo json_encode("success");
}


if (isset($_POST['ContactFormulier']))
{
    $c = new Contact($_POST['onderwerp'], $_POST['bericht']);
    ExamenDAO::insertContact($c);
    header('location: '.$_SERVER['HTTP_REFERER'].'?s');
}

?>