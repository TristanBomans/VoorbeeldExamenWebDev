<?php
include_once ("../DAOs/ExamenDAO.php");
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 9/06/2017
 * Time: 22:42
 */
$Ap = ExamenDAO::getAllProjecten();
if(isset($_GET["p"])){
    $GevraagdePagina = $_GET["p"] - 1;
}
else{
    $GevraagdePagina = 0;
}

echo "<table style='width: 70%; margin: auto;'><tr><th>Id</th><th>Naam</th><th>Beschrijving</th><th></th>";
echo "<style> .favorietestar {
        float: left;
        margin-right: 10px;
        background-image: url(\"../Resources/Images/ster.png\") ;
        width: 35px;
        height: 35px;
        background-size: 35px 35px;
    }</style>";
for ($i = 0; $i < 3; $i++)
{
?>
<tr>
    <td><?php  if (isset($Ap[$i + ($GevraagdePagina * 3) ])){echo $Ap[$i + ($GevraagdePagina * 3)]->Id;} ?></td>
    <td><?php if (isset($Ap[$i + ($GevraagdePagina * 3) ])){echo   "<a href='Detail.php?p=".$Ap[$i + ($GevraagdePagina * 3)]->Id."'>".$Ap[$i+ ($GevraagdePagina*3)]->Naam."</a>";} ?></td>
    <td style= "width: 80%; text-align: justify;"><?php if (isset($Ap[$i + ($GevraagdePagina * 3) ])){echo $Ap[$i+($GevraagdePagina * 3)]->Beschrijving;} ?></td>
    <td><?php
        if (isset($Ap[$i + ($GevraagdePagina * 3)]))
        {
            $id = $Ap[$i + ($GevraagdePagina * 3)]->Id;

            if (isset($_COOKIE['favorite-'.$id]))
            {
                echo "<div id=\"favoriet-ster\" class=\"favorietestar\"></div>";
            }
        }
        ?></td>
</tr>


<?php
}
?>
</table>

<?php
$AantalLinks = ceil(sizeof($Ap) / 3);

for ($i = 1; $i<$AantalLinks+1; $i++)
{
?>
    <a href="Index.php?p=<?php echo $i;?>"><?php echo $i?></a>
<?php
}

?>