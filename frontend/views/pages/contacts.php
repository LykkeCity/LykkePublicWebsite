<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block ">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>


    <section class="contacts" style="background-image: url(/img/office-bg.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-xs-10 col-sm-offset-6 col-sm-6 col-md-offset-7 col-md-5">
            <?= $page['content'] ?>
          </div>
        </div>
      </div>
    </section>

    <section class="contacts--bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-10 col-md-9 col-lg-8 automargin">

            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-xs-6 col-sm-12">
                    <div class="contacts__block">
                      <div class="sub_title"><i class="contacts__icon contacts__icon--mail"></i> Media contact</div>
                      <a href="mailto:pr@lykke.com">pr@lykke.com</a>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-12">
                    <div class="contacts__block">
                      <div class="sub_title"><i class="contacts__icon contacts__icon--call"></i> support</div>
                      <p><a href="mailto:support@lykke.com">support@lykke.com</a></p>
                      <a class="visible-md visible-lg" href="callto:+41615880402">+41 61 588 04 02</a>
                      <a class="visible-xs visible-sm" href="tel:+41615880402">+41 61 588 04 02</a>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-sm-6">
                <div class="sub_title"><i class="contacts__icon contacts__icon--pin"></i> Addresses</div>

                <div class="row">
                  <div class="col-xs-6">
                    <p class="contacts__block">Lykke Corp <br>
                      52 Bahnhofstrasse <br>
                      8001 Zurich <br>
                      Switzerland <br>
                    </p>
                  </div>
                  <div class="col-xs-6">
                    <p class="contacts__block">Lykke Corp UK <br>
                      86-90 Paul Street <br>
                      London EC2A 4NE <br>
                      United Kingdom <br>
                    </p>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>

      </div>
    </section>


</article>

<?= Footer::widget(); ?>