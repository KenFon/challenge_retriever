<?php
    $filephp = array_reverse(glob("*.php"));
    ?>

<nav>
    <div class="nav-wrapper green lighten-3">
        <a href="#!" class="brand-logo"><img src="logos_icons/logo.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <?php foreach ($filephp as $file) :?>
                <?php $nom = explode(".", "$file")?>
                <li><a href="<?=$file?>"><?= ucfirst($nom[0]) ?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <?php foreach ($filephp as $file) :?>
        <?php $nom = explode(".", "$file")?>
        <li><a href="<?=$file?>"><?= ucfirst($nom[0]) ?></a></li>
    <?php endforeach;?>
</ul>



