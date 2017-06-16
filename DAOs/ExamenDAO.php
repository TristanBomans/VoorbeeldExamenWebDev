<?php
include_once ("../Models/Project.php");
class ExamenDAO
{
    static function getAllProjecten()
    {
        require "Credentials.php";
        $mysqli = new mysqli($host, $username, $password, $database);
        $result = $mysqli->query("select * from projecten");
        $ProjectArray = [];
        $Project = null;

        while ($row = mysqli_fetch_row($result)) {
            $id = $row[0] ;
            $naam = $row[1];
            $fotopath = $row[2];
            $beschrijving = $row[3];


            $Project = new Project($id, $naam, $fotopath, $beschrijving);
            array_push($ProjectArray, $Project);
        }
        mysqli_close($mysqli);

        return $ProjectArray;
    }

    static function getProject($id)
    {
        require "Credentials.php";
        $mysqli = new mysqli($host, $username, $password, $database);
        $result = $mysqli->query("select * from projecten where id = '$id'");
        $ProjectArray = [];
        $Project = null;

        if ($row = mysqli_fetch_row($result)) {
            $id = $row[0] ;
            $naam = $row[1];
            $fotopath = $row[2];
            $beschrijving = $row[3];


            $Project = new Project($id, $naam, $fotopath, $beschrijving);
        }
        mysqli_close($mysqli);

        return $Project;
    }

    static function insertContact($contact)
    {
        require "Credentials.php";
        $mysqli = new mysqli($host, $username, $password, $database);
        $result = $mysqli->query("insert into contact (onderwerp, bericht) VALUES ('$contact->Onderwerp','$contact->Bericht')");
        if(!($result)) die(mysqli_error($mysqli));
        mysqli_close($mysqli);
    }
}