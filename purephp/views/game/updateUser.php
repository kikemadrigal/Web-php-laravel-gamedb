<?php 


if (isset($_POST['submit'])){
    if(isset($_POST['broken'])) $broken=1;
    else  $broken=0;
    if(isset($_POST['iGoIt'])) $iGoIt=1;
    else  $iGoIt=0;

    $game=new Game($_POST['id']);
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
    //$game->setVideo($_POST['video']);
    //$game->setWeb($_POST['web']);
    $game->setIGoIt($iGoIt);
    $game->setBroken($broken);
    $game->setObservations($_POST['observations']);
    if ($game!=null){
        GameUserRepository::update($game);
        header("location: ".PATHSERVER."game/update/".$_POST['id']."");
        if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$_POST['id']."';</script>";
    }else{
        echo "Update could not be completed";  
    }
    die();
}

if (empty($idGame)) {
    echo "catgory is empty";
    die();
}
$game=GameUserRepository::getGameByUser($_SESSION['idusuario'], $idGame);
include_once("./views/templates/document-start.php"); 
?>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro que quieres borrar el juego? / Are you sure you want to delete the game?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?php echo PATHSERVER; ?>game/delete/<?php echo $idGame; ?>" class="btn btn-primary">   SI   </a>
            </div>
        </div>
    </div>
</div>
<!-- Patrones: para campos con números: pattern='[0-9]{1,10000}'-->
<h3>Update game <?php echo GameUserRepository::getTitleById($idGame); ?></h3>
<form method=post action='<?php echo PATHSERVER."game/update"?>' class='form-horizontal background-pink' enctype='multipart/form-data'>
    <div class='form-group m-4' >
        <label for='title' class='control-label '>title:</label>
        <div class='col'>
            <input type='text' class='form-control' name='title' id='title' size=80 title='title is required' value='<?php echo $game->getTitle(); ?>' required  />
        </div>
    </div> 





    <!--Cover -->  
    <div class='text-center' > 
        <div class='col'>
            <!--Obtener foto --> 
            <?php
            $image=MultimediaRepository::getImage($game->getCover());

            if($image==null){
                if(PRODUCTION==1){
                    echo "<img src='".PATHSERVERSININDEX."media/sinImagen.jpg' class='max-height300' /><br>";
                }else{
                    echo "<img src='".PATHSERVER."media/sinImagen.jpg' class='max-height300' /><br>";
                }
            }else{
                if(PRODUCTION==1){
                    echo "<img src=".PATHSERVERSININDEX.$image->getPath()." class='max-height300' /><br>";
                }else{
                    echo "<img src=".PATHSERVER.$image->getPath()." class='max-height300' /><br>";
                }
            }
           ?>  
            <a href='<?php echo PATHSERVER;?>media/showAll' target='_blanck' >Management</a><br>      
           <!--Fin de obtener foto -->         
            <?php $images=MultimediaRepository::getAllImagesByUser($_SESSION['idusuario']);?>
            <select class="m-4" name='cover' id='cover' > ";
                <?php
               
                if ($image==null){
                    echo "<option value='1' >Sin imagen</option>";
                }else{
                    echo "<option value='".$image->getId()."' >".$image->getName()."</option>";
                    
                }
                foreach ($images as $posicion=>$image){
                    echo "<option value='".$image->getId()."' >".$image->getName()."</option>";
                }

                ?>
            </select>       
        </div>
    </div>
    <!-- Fin cover -->  















    <div class='form-group m-4' >
        <label for='instructions' class='control-label '>Instructions:</label>
        <div class='col'>
            <textarea type='text' class='form-control' name='instructions' id='instructions' rows=3 cols=60 title='Enter instructions' ><?php echo $game->getInstructions(); ?></textarea>
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='system' class='control-label '>system: MSX, amstrad, PS4</label> 
        <div class='col'>
            <input type='text' class='form-control' name='system' id='system' title='system' value='<?php echo $game->getSystem(); ?>' required />
        </div>
    </div> 



    <div class='form-group m-4' >
        <label for='publisher' class='control-label '>Publisher: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='publisher' id='publisher' title='Publisher' value='<?php echo $game->getPublisher(); ?>' required />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='developer' class='control-label '>Developer: </label> 
        <div class='col'>
            <input type='text' class='form-control' name='developer' id='developer' title='Developer' value='<?php echo $game->getDeveloper(); ?>' required />
        </div>
    </div> 
    <div class='form-group m-4' > 
        <label for='country' class='control-label '>Country:</label> 
        <div class='col'>
            <input type='text' class='form-control' name='country' id='country' size=80 value='<?php echo $game->getCountry(); ?>' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='year' class='control-label '>year: </label> 
        <div class='col'>
            <input type='number' class='form-control' name='year' id='year' title='year' value='<?php echo $game->getYear(); ?>'  />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='format' class='control-label '>format: tape, tape cartridge, disk, cardbridge</label> 
        <div class='col'>
            <input type='text' class='form-control' name='format' id='format' title='format' value='<?php echo $game->getFormat(); ?>'  />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='genre' class='control-label '>genre: puzzle, Strategy</label> 
        <div class='col'>
            <input type='text' class='form-control' name='genre' id='genre' title='genre' value='<?php echo $game->getProgramming(); ?>'  />
        </div>
    </div> 

    <div class='form-group m-4' >  
        <label for='programming' class='control-label '>programming: MSX Basic, assembler</label> 
        <div class='col'>
            <input type='text' class='form-control' name='programming' id='programming' title='programming' value='<?php echo $game->getControl(); ?>'  />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='sound' class='control-label '>sound: psg, scc, fm</label> 
        <div class='col'>
            <input type='text' class='form-control' name='sound' id='sound' title='sound' value='<?php echo $game->getSound(); ?>' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='control' class='control-label '>control: keyboard, joystick</label> 
        <div class='col'>
            <input type='text' class='form-control' name='control' id='control' title='control' value='<?php echo $game->getControl(); ?>' />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='players' class='control-label '>players: 1,2</label> 
        <div class='col'>
            <input type='number' class='form-control' name='players' id='players' title='players' value='<?php echo $game->getPlayers(); ?>'  />
        </div>
    </div> 
    <div class='form-group m-4' >  
        <label for='languages' class='control-label '>languages: spanish, english</label> 
        <div class='col'>
            <input type='text' class='form-control' name='languages' id='languages' title='languages' value='<?php echo $game->getLanguages(); ?>'  />
        </div>
    </div> 
    <div class="form-check m-4">
        <label class="form-check-label" for="iGoIt">iGoIt</label>
        <?php 
        if($game->getIGoIt()==1) $valor="checked";
        else  $valor="";
        ?>
        <input class="form-check-input" type="checkbox" name='iGoIt' id='iGoIt' title='iGoIt' value="iGoIt" <?php echo $valor;?>>
    </div>
    <div class="form-check m-4">
        <label class="form-check-label" for="broken">broken</label>
        <?php 
        if($game->getBroken()==1) $valor="checked";
        else  $valor="";
        ?>
        <input class="form-check-input" type="checkbox" name='broken' id='broken' title='broken' value="broken" <?php echo $valor;?>>
    </div>
    <div class='form-group m-4' >  
        <label for='observations' class='control-label '>observations: </label> 
        <div class='col'>
            <textarea type='text' class='form-control' name='observations' id='observations' title='observations' rows='3' cols='60' ><?php echo $game->getObservations(); ?></textarea>
        </div>
    </div>   



    <div class='form-group m-4' > 
        <div class='col col-md-offset-2' >
            <input type="hidden" name="id" id="id" value='<?php echo $idGame ?>' />
            <input type='submit' name="submit" id="submit" value='Update' class='btn btn-primary' ></input> 
            <!--<input type='button' name="remove" id="remove" value='Remove' class='btn btn-danger' data-toggle="modal" data-target="#deleteModal" ></input> -->
            <a href="<?php echo PATHSERVER; ?>game/delete/<?php echo $idGame; ?>" class="btn btn-danger">   Delete   </a>
        </div>
    </div> 

</form>













<!------------------------------------- ADD ELEMENTS ------------------------------------------>
<br><br>
<h1>ADD ELEMENTS</h1>
<div class='form-group m-4' >  
    <label for='archivo' class='control-label '><h3>file (rom, cas, dsk, tsx, txt, doc, docx, pdf): </h3></label> 
    <div class='col'>
        <form class="form-horizontal" action="<?php echo PATHSERVER."game/insertFile"?>" method="post" enctype="multipart/form-data">
            <input type='file' class="form-control" name='archivo' id='archivo' onChange='ver(form.file.value)' required />
            <input type="hidden" name="idGame" value="<?php echo $game->getId() ?>" />
            <input type="submit" name="submit" class="button btn-primary btn-large" value="Add file" />
        </form>
        <?php $filesGames=FileGameRepository::getAllByGame($game->getId());
        foreach ($filesGames as $posicion=>$file){
            ?>
            <form class='form-horizontal' action='<?php echo PATHSERVER; ?>game/deleteFile' method='post'>
                <input type='hidden' name='idGame' value='<?php echo $game->getId(); ?>' />
                <input type='hidden' name='idFileGame' value='<?php echo $file->getId(); ?>' />
                <?php
                if(PRODUCTION==1){
                    echo "<a href='".PATHSERVERSININDEX.$file->getPath()."' >".$file->getName()."</a>"; 
                }else{
                    echo "<a href='".$file->getPath()."' >".$file->getName()."</a>";
                }
                ?>
                <input type='submit' name='submit' class='button btn-danger' value='X' />
            </form>
            <?php
        }
        ?>
    </div>
</div> 
<hr>
<!-- SCREENSHOTS-->
<div class='form-group m-4' >  
    <label for='archivo' class='control-label '><h3>screenshot (png, jpg, jpeg, bmp): </h3></label> 
    <div class='col'>
        <form class="form-horizontal" action="<?php echo PATHSERVER."game/insertScreenShot"?>" method="post" enctype="multipart/form-data">
            <input type='file' class="form-control" name='archivo' id='archivo' onChange='ver(form.file.value)' required />
            <input type="hidden" name="idGame" value="<?php echo $game->getId() ?>" />
            <input type="submit" name="submit" class="button btn-primary btn-large" value="Add screenshot" />
        </form>
        <?php $screenShotsGames=ScreenShotGameRepository::getAllByGame($game->getId());
        foreach ($screenShotsGames as $posicion=>$screenShot){
            ?>
            <form class='form-horizontal flex-container' action='<?php echo PATHSERVER; ?>game/deleteScreenShot' method='post'>
                <input type='hidden' name='idGame' value='<?php echo $game->getId(); ?>' />
                <input type='hidden' name='idScreenShotGame' value='<?php echo $screenShot->getId(); ?>' />
                <?php
                if(PRODUCTION==1){
                    echo "<a href='".PATHSERVERSININDEX.$screenShot->getPath()."' >";
                        echo "<img src='".PATHSERVERSININDEX.$screenShot->getPath()."' width='100px' />";
                    echo "</a>"; 
                }else{
                    echo "<a href='".PATHSERVER.$screenShot->getPath()."' >";
                        echo "<img src='".PATHSERVER.$screenShot->getPath()."' width='100px' />";
                    echo "</a>";
                }
                ?>
                <input type='submit' name='submit' class='button btn-danger' value='X' />
            </form>
            <?php
        }
        ?>
    </div>
</div>     
<hr>
<!-- VIDEOS -->
<div class='form-group m-4' >  
    <label for='text' class='control-label '><h3>URL video:</h3> </label> 
    <div class='col'>
        <form class="form-horizontal" name="addVideoForm" id="addVideoForm" action="<?php echo PATHSERVER."game/insertVideo"?>" method="post">
            <input type="text" class="form-control"  name="text" id="text" title='Se necesita un texto' required /><br>
            <input type="hidden" name="idGame" value="<?php echo $game->getId() ?>" />
            <input type="submit" name="submit" class="button btn-primary btn-large" value="Add Video" />
        </form>
        <?php $VideosGames=VideoGameRepository::getAllByGame($game->getId());
        foreach ($VideosGames as $posicion=>$video){
            ?>
            <form class='form-horizontal' action='<?php echo PATHSERVER; ?>game/deleteVideo' method='post'>
                <input type='hidden' name='idGame' value='<?php echo $game->getId(); ?>' />
                <input type='hidden' name='idVideoGame' value='<?php echo $video->getId(); ?>' />
                <a href="<?php echo $video->getText(); ?>" target="_blanck"><?php echo $video->getText(); ?></a>
                <input type='submit' name='submit' class='button btn-danger' value='X' />
            </form>
            <?php
        }
        ?>
    </div>
</div>  
<hr>
<!-- WEBS--> 
<div class='form-group m-4' >  
    <label for='text' class='control-label '><h3>URL web:</h3> </label> 
    <div class='col'>
        <form class="form-horizontal" action="<?php echo PATHSERVER."game/insertWeb"?>" method="post">
            <input type="text" class="form-control"  name="text" id="text" title='Se necesita un texto' required /><br>
            <input type="hidden" name="idGame" value="<?php echo $game->getId() ?>" />
            <input type="submit" name="submit" class="button btn-primary btn-large" value="Add web" />
        </form>
        <?php $websGames=WebGameRepository::getAllByGame($game->getId());
        foreach ($websGames as $posicion=>$web){
            ?>
            <form class='form-horizontal' action='<?php echo PATHSERVER; ?>game/deleteWeb' method='post'>
                <input type='hidden' name='idGame' value='<?php echo $game->getId(); ?>' />
                <input type='hidden' name='idWebGame' value='<?php echo $web->getId(); ?>' />
                <a href="<?php echo $web->getText(); ?>" target="_blanck"><?php echo $web->getText(); ?></a>
                <input type='submit' name='submit' class='button btn-danger' value='X' />
            </form>
            <?php
        }
        ?>
    </div>
</div>  


<?php include_once("./views/templates/document-end.php"); ?>