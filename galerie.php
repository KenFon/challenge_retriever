<?php
$title="Galerie";
$tabImages = glob("img/*.{jpg,png,gif}", GLOB_BRACE);
$indice = floor(count($tabImages)/4)+1;
$arrayImages = array_chunk($tabImages, $indice);


require "elements/header.php"?>

    <div class="container content">
        <h1 class="center-align">Notre galerie</h1>
    </div>

    <div class="container z-depth-4 galerie content blue-grey lighten-4">
        <div class="lines">

                <?php foreach ($arrayImages as $images) :?>
                    <div class="column">
                        <?php foreach ($images as $image) :?>

                            <a data-fancybox="gallery" href="<?= $image ?>"><img src="<?= $image?>"></a>

                        <?php endforeach;?>
                    </div>
                <?php endforeach;?>
        </div>
    </div>


<?php require "elements/footer.php"?>