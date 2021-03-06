<?php
use frontend\widgets\Footer;
use frontend\widgets\SubMenu;

?>

<?=SubMenu::widget()?>

<article class="content page">
    <section class="section--padding ">
        <div class="container">
            <div class="row">

                <div class="col-sm-8 automargin">
                    <div class="text">
                        <h1 class="h1"><?=$blocks['Main']['title']?></h1>
                        <?=$blocks['Main']['content']?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</article>

<?=Footer::widget();?>