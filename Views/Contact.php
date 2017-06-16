<?php
include_once ("../Controllers/LogicController.php");
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 14/06/2017
 * Time: 19:20
 */
?>
<style>
    #RandomImage{
        width: 250px;
        height: 250px;
    }
</style>

<img id="RandomImage" src="<?php echo LogicController::getRandomFotoPath(); ?>">
<?php if (!(isset($_GET['s']))) { ?>
<form method="post" action="../Controllers/RequestController.php">
    <div><label>Onderwerp</label><input name="onderwerp" type="text"></div>
    <div><label>Bericht</label><textarea name="bericht" type="text"></textarea></div>

    <input type="submit" name="ContactFormulier" value="verzenden">
</form>
<?php } else { ?>

<div>SUCCES!</div>

<?php } ?>
