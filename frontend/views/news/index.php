<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>


<article class="content">

    <section class="section section--lead section--padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 automargin">
                    <h1> <?=$page['name']?></h1>
                    <div class="news_list">
                        <?=$this->render('partial_news_item',
                            ['page' => $page, 'posts' => $posts]);?>
                    </div>
                    <div class="spinner_container" style="display: none;">
                        <div class="spinner">
                            <div class="spinner__inside"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?=Footer::widget();?>


