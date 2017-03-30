<?php
use frontend\widgets\ContactUs;
use frontend\widgets\Footer;
?>

<?=ContactUs::widget()?>

<article class="content page">
    <section class="section section--lead section--padding">
        <div class="container container--extend">
            <div class="row">
                <div class="col-sm-8 col-md-6 automargin">
                    <div class="form_status">
                        <div class="status_icon status_icon--success"></div>
                        <h2>Thank you for getting in&nbsp;touch!</h2>
                        <p>We appreciate you contacting us and will get back to you as soon as possible. In the meantime, you can check the <a href="">FAQ</a> section,
                            learn more <a href="">about Lykke</a>,
                            or browse through our latest <a href="">blog posts</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?=Footer::widget();?>
