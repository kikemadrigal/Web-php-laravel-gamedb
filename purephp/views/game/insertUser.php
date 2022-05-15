<?php

if (isset($_POST['submit'])){
    if(isset($_POST['broken'])) $broken=1;
    else  $broken=0;
    if(isset($_POST['iGoIt'])) $iGoIt=1;
    else  $iGoIt=0;
    $game=new Game(0);
    $game->setTitle($_POST['title']);
    $game->setCover($_POST['cover']);
    $game->setInstructions($_POST['instructions']);
    $game->setCountry($_POST['country']);
    $game->setPublisher($_POST['publisher']);
    $game->setDeveloper($_POST['developer']);
    $game->setYear($_POST['year']);
    $game->setFormat($_POST['format']);
    $game->setGenre($_POST['genre']);
    $game->setSystem($_POST['system']);
    $game->setProgramming($_POST['programming']);
    $game->setSound($_POST['sound']);
    $game->setControl($_POST['control']);
    $game->setPlayers($_POST['players']);
    $game->setLanguages($_POST['languages']);
    //$game->setFile($_POST['file']);
    //$game->setScreenshot($_POST['screenshot']);
    //$game->setVide($_POST['video']);
    //$game->setWeb($_POST['web']);
    $game->setIGoIt($iGoIt);
    $game->setBroken($broken);
    $game->setObservations($_POST['observations']);
    if ($game!=null){
        GameUserRepository::insert($game, $_SESSION['idusuario']);
        header("location: ".PATHSERVER."game/showByCategoriesUsers");
        if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/showByCategoriesUsers';</script>";
    }else{
        echo "Update could not be completed";  
    }
    die();
}
include_once("./views/templates/document-start.php");
?>

<h3 class="">Insert game</h3>
<form method='post' action='<?php echo PATHSERVER."game/insert"?>' class='form-horizontal banckground-yellow' enctype='multipart/form-data'>
    <div class='form-group m-4' >
        <label for='title' class='control-label col-md-2'>title:</label>
        <div class='col'>
            <input type='text' class='form-control' name='title' id='title' size=80 title='title is required' required >
        </div>
    </div> 






    <!-- Rollo imagen -->
    <div class='form-group m-4 text-center' > 
        <div class='col'>
            <!--Obtener foto --> 
            <?php
                if(PRODUCTION==1){
                    echo "<img src='".PATHSERVERSININDEX."media/sinImagen.jpg' class='max-height300' /><br>";
                }else{
                    echo "<img src='".PATHSERVER."media/sinImagen.jpg' class='max-height300' /><br>";
                }
            
           ?>  
            <a href='<?php echo PATHSERVER;?>media/showall' target='_blanck' >Management</a><br>         
            <?php $images=MultimediaRepository::getAllImagesByUser($_SESSION['idusuario']);?>
            <!--Cover -->  
            <select class="m-4" name='cover' id='cover' required > ";
                <?php
                echo "<option value='' >Select image</option>";
                foreach ($images as $posicion=>$image){
                    echo "<option value='".$image->getId()."' >".$image->getName()."</option>";
                }
                ?>
            </select>       
        </div>
    </div>
    <!-- Fin cover -->  














    <div class='form-group m-4' >
        <label for='instructions' class='control-label col-md-2'>Instructions:</label>
        <div class='col'>
            <textarea type='text' class='form-control' name='instructions' id='instructions' rows=3 cols=60 title='Enter instructions' ></textarea>
        </div>
    </div>
    <div class='form-group m-4' >  
        <label for='system' class='control-label'>system: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='system' id='system' title='system' required/>
        </div>
    </div> 

    <div class='form-group m-4' >
        <label for='publisher' class='control-label'>Publisher: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='publisher' id='publisher' title='Publisher' required/>
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='developer' class='control-label'>Developer: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='developer' id='developer' title='Developer' required/>
        </div>
    </div> 

    <div class='form-group m-4' > 
        <label for='country' class='control-label'>Country:</label> 
        <div class='col'>
            <input type='text' class='form-control' name='country' id='country' size=80>
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='year' class='control-label'>year: </label> 
        <div class='col'>
            <input type='number' class='form-control' name='year' id='year' title='year' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='format' class='control-label'>format: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='format' id='format' title='format' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='genre' class='control-label'>genre: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='genre' id='genre' title='genre' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='programming' class='control-label'>programming: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='programming' id='programming' title='programming' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='sound' class='control-label'>sound: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='sound' id='sound' title='sound' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='control' class='control-label'>control: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='control' id='control' title='control' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='players' class='control-label'>players: </label> 
        <div class='col'>
            <input type='number' class='form-control' name='players' id='players' title='players' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='languages' class='control-label'>languages: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='languages' id='languages' title='languages' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='file' class='control-label'>file: </label> 
        <div class='col'>
            <!-- Recuerda quitar los comentarios cuando lo habilites arribe-->
            <input type='text' class='form-control' name='file' id='file' title='file' disabled />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='screenshot' class='control-label'>screenshot: </label> 
        <div class='col'>
            <!-- Recuerda quitar los comentarios cuando lo habilites arribe-->
            <input type='text' class='form-control' name='screenshot' id='screenshot' title='screenshot' disabled />
        </div>
    </div>     
    <div class='form-group m-4' >  
        <label for='video' class='control-label'>video: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='video' id='video' title='video' />
        </div>
    </div>   
    <!--<div class='form-group' >  
        <label for='iGoIt' class='control-label'>iGoIt: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='iGoIt' id='iGoIt' title='iGoIt' />
        </div>
    </div>   
    <div class='form-group' >  
        <label for='broken' class='control-label'>broken: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='broken' id='broken' title='broken' />
        </div>
    </div>-->
    <div class="form-check m-4">
        <label class="form-check-label" for="iGoIt">iGoIt</label>
        <input class="form-check-input" type="checkbox" name='iGoIt' id='iGoIt' title='iGoIt' value="iGoIt" >
    </div>
    <div class="form-check m-4">
        <label class="form-check-label" for="broken">broken</label>
        <input class="form-check-input" type="checkbox" name='broken' id='broken' title='broken' value="broken" >
    </div>
    <div class='form-group m-4' >  
        <label for='observations' class='control-label'>observations: </label> 
        <div class='col'>
            <textarea type='text' class='form-control' name='observations' id='observations' title='observations' rows=3 cols=60 ></textarea>
        </div>
    </div>   



    <div class='form-group m-4' > 
        <div class='col col-md-offset-2' >
            <input type='submit' name='submit' value='Insert' class='btn btn-primary' />
        </div>
    </div> 
        
</form>

<?php

include_once("./views/templates/document-end.php");
?>
