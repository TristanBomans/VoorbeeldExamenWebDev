<?php
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 14/06/2017
 * Time: 19:30
 */
class LogicController
{
    static function getRandomFotoPath()
    {
        $fotosArray = [];

        if ($handle = opendir('../Resources/Images/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    array_push($fotosArray, $entry);
                }
            }
            closedir($handle);
            return "../Resources/Images/".$fotosArray[rand(0,3)];
        }
    }
}