<?php
use frontend\widgets\Footer;

?>

<!-- TEMP -->
<style>
    .tv-chart iframe {
        width: 100% !important;
        height: 700px !important;
    }
    @media only screen and (max-width: 1199px) {
        .tv-chart iframe {
            height: 500px !important;
        }
    }
    @media only screen and (max-width: 991px) {
        .tv-chart iframe {
            height: 400px !important;
        }
    }
</style>
<article class="content page">
    <section>
        <div id="tv_chart_container" class="tv-chart col-lg-8 col-md-10 col-sm-12 col-xs-12 automargin"></div>
    </section>

</article>

<?=Footer::widget();?>
