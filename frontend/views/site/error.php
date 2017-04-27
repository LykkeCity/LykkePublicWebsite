<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

$this->title = $name;
?>
<article class="content page">
  <section class="section section--padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-6 automargin">
          <div class="form_status">
            <div class="error_page">
              4<span class="status_icon status_icon--warning"></span>4
            </div>
            <h2>Oops! Page not found</h2>

            <p>This content has been moved or is no longer available.  If you
              have any other problem contact ous support:
               <a href="mailto:support@lykke.com">support@lykke.com</a></p>
            <div style="display: none;">name: <?=$name?></div>
            <div style="display: none;">message: <?=$message?></div>
            <div class="form_status__button text-center">
              <a href="/" class="btn btn-sm">Go Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</article>


<?=Footer::widget();?>


