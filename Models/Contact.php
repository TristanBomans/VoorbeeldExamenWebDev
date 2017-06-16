<?php

/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 14/06/2017
 * Time: 19:40
 */
class Contact
{
    public $Onderwerp;
    public $Bericht;

    public function Contact($onderwerp, $bericht)
    {
        $this->Bericht = $bericht;
        $this->Onderwerp = $onderwerp;
    }

}