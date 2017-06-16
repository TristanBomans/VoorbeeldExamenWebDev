<?php

/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 9/06/2017
 * Time: 22:44
 */
class Project
{
    public $Id;
    public $Naam;
    public $Fotopath;
    public $Beschrijving;

    public function Project($id, $naam, $fotopath, $beschrijving)
    {
        $this->Id = $id;
        $this->Naam = $naam;
        $this->Fotopath = $fotopath;
        $this->Beschrijving = $beschrijving;
    }

}