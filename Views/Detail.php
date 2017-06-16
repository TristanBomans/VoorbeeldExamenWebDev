<?php
include_once ("../DAOs/ExamenDAO.php");
/**
 * Created by PhpStorm.
 * User: Tristan
 * Date: 13/06/2017
 * Time: 12:43
 */
if (isset($_GET['p'])){
    $p = $_GET['p'];
    $project = ExamenDAO::getProject($p);
}
else{
echo "<script>window.location = '/VoorbereidingExWA/Views/'</script>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
    },  3000);

    $(function() {
        $("#favorite-button").on("click", function() {
            console.log( $( this ).text() );
            var projID = $("#project-id").html();
            console.log(projID);

            $.ajax({
                type: "POST",
                url: "/VoorbereidingExWA/Controllers/RequestController.php",
                data: {'addFavorite' : "True", "project-id" : projID},
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    $("#favoriet-ster").addClass("favorietestar").fadeIn(1000);
                    window.alert(data);
                }
            });
        });

    });
</script>
<style>
    #slideshow {
        margin: 50px auto;
        position: relative;
        width: 240px;
        height: 240px;
        padding: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.4);
    }

    #slideshow > div {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
    }
    #slideshow div{
        width: 240px;
        height: 240px;
        background-size: 240px 240px;
    }

    .favorietestar {
        float: left;
        margin-right: 10px;
        background-image: url("../Resources/Images/ster.png") ;
        width: 35px;
        height: 35px;
        background-size: 35px 35px;
    }
    #i-beschrijving {
        font-style: italic;
        width: 60vw;
        margin: auto;
    }

    #favorite-button{

        width: 50px;
        height: 25px;
        border: 1px solid darkred;
        padding: 20px;
        border-radius: 7px;
        background-color: beige;
        margin: auto;
        margin-top: 25px;
        transition: all 0.2s ease-in 0s;
    }
    #favorite-button:hover{

        cursor: pointer;
        color: grey;
        background-color: bisque;
        border: 1px solid grey;

    }
</style>
<div style="visibility: hidden; position: absolute;" id="project-id"><?php echo $project->Id ?></div>

<h1><?php echo $project->Naam ?>
    <?php
    if (isset($_COOKIE['favorite-'.$project->Id])){
        ?>
        <div id="favoriet-ster" class="favorietestar"></div>

    <?php }else{?>
        <div id="favoriet-ster"></div>
    <?php }?>

</h1>
<div id="i-beschrijving"><?php echo $project->Beschrijving ?></div>
<div id="favorite-button">Favoriet</div>

<div id="slideshow">
    <div id="slideshow-1">
        <div style="background-image: url('../Resources/Images/1.png');">
        </div>
    </div>
    <div  id="slideshow-2" style="display: none;">
        <div style="background-image: url('../Resources/Images/2.png');">

        </div>
    </div>
    <div  id="slideshow-3" style="display: none;">
        <div style="background-image: url('../Resources/Images/3.png');">
    </div>
    </div>
</div>