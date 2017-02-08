

<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <section class="leadership section--padding">
    <div class="container">
      <div class="row">

        <div class="col-sm-8 automargin">
          <h1 class="h1">Leadership</h1>

          <div class="leadership_list">
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/7-migin.jpg"><img src="/img/corp/leadership/7-migin-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Andrey Migin</div>
                  <div class="leadership_item__desc">Software Development</div>
                  <div class="leadership_item__text">Andrey is&nbsp;exceptional team leader with 8&nbsp;year professional experience of&nbsp;FX marketplace systems development.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/5-golub.jpg"><img src="/img/corp/leadership/5-golub-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Anton Golub</div>
                  <div class="leadership_item__desc">Science</div>
                  <div class="leadership_item__text">Anton worked at&nbsp;the Manchester Business School as&nbsp;a&nbsp;Marie Curie research fellow on&nbsp;high frequency trading, market micro-structure and Flash Crashes.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/6-steblyuk.jpg"><img src="/img/corp/leadership/6-steblyuk-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Arseniy Steblyuk</div>
                  <div class="leadership_item__desc">Risk Management</div>
                  <div class="leadership_item__text">Arseniy has extensive expertise in&nbsp;maintaining business continuity, ensuring sustainable operations of&nbsp;a&nbsp;highly technical, high-frequency electronic trading firm in&nbsp;complex regulatory environment and promoting companywide risk awareness.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/10-zamboglou.jpg"><img src="/img/corp/leadership/10-zamboglou-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Demetrios Zamboglou</div>
                  <div class="leadership_item__desc">International Operations</div>
                  <div class="leadership_item__text">Demetrios brings a&nbsp;wealth of&nbsp;technical experience finely dovetailed with operational creativity, required to&nbsp;propel Lykke’s growth and popularity worldwide. A&nbsp;financial services visionary, with extensive award-winning experience in&nbsp;the fields of&nbsp;risk management, trading, compliance, product development and behavioural science&nbsp;— Demetrios delivers a&nbsp;high-calibre balanced package of&nbsp;real-time operational proficiency and forward-looking invention to&nbsp;the Lykke vision of&nbsp;changing the world for the better&nbsp;— and for all.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/4-mechenkova.jpg"><img src="/img/corp/leadership/4-mechenkova-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Lena Mechenkova</div>
                  <div class="leadership_item__desc">Communications</div>
                  <div class="leadership_item__text">Lena is&nbsp;a&nbsp;communications professional with more than 17&nbsp;years’ experience in&nbsp;public relations and mass media. Areas of&nbsp;expertise include corporate communications, internal communications, event management, change communications, writing, and public speaking.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/3-nikulin.jpg"><img src="/img/corp/leadership/3-nikulin-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Michael Nikulin</div>
                  <div class="leadership_item__desc">Technology</div>
                  <div class="leadership_item__text">Michael is&nbsp;an&nbsp;architect, designer and developer with 10&nbsp;year experience in&nbsp;creating market solutions for financial institutions, including Anti-Money Laundering, Fraud Detection and Financial Markets Compliance solutions. Combines deep knowledge of&nbsp;financial architecture with Blockchain settlement mechanisms.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/1-olsen.jpg">
                  <img src="/img/corp/leadership/1-olsen-preview.jpg" alt="">
                </div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Richard Olsen</div>
                  <div class="leadership_item__desc">Founder, CEO</div>
                  <div class="leadership_item__text">Richard is&nbsp;a&nbsp;pioneer in&nbsp;high frequency finance with extensive entrepreneurial experience and well known for his academic work. He&nbsp;was a co-founder of&nbsp;OANDA, a&nbsp;currency information company and market maker in&nbsp;foreign exchange. Under Richard’s stewardship as&nbsp;CEO of&nbsp;OANDA the company was a&nbsp;shooting star that launched the first fully automated&nbsp;FX trading platform offering second-by-second interest rate payments and netted 37&nbsp;Mio of&nbsp;profits in&nbsp;2007. Already at&nbsp;OANDA, he&nbsp;conceived the first trading platform with second-by-second interest payments. He&nbsp;is&nbsp;chief executive of&nbsp;Olsen Ltd, an&nbsp;investment manager, and visiting professor at&nbsp;the Centre for Computational Finance and Economic Agents at&nbsp;the University of&nbsp;Essex. His ambition is&nbsp;to&nbsp;transform financial markets into a&nbsp;seamless system without the inefficiencies that we&nbsp;today take for granted.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/2-ivliev.jpg"><img src="/img/corp/leadership/2-ivliev-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Sergey Ivliev</div>
                  <div class="leadership_item__desc">Products &amp; Operations</div>
                  <div class="leadership_item__text">Sergey’s dream is&nbsp;to&nbsp;make financial market better, faster and more inclusive. For 16&nbsp;years being an&nbsp;industry professional, lecturer, author, events curator, member of&nbsp;editorial boards of&nbsp;academic journals and expert councils he&nbsp;contributes to&nbsp;promote best practices of&nbsp;financial markets and risk management. Executed and supervised 100+ large scale system implementation projects with total revenue exceeding 40&nbsp;Mio. Regional Director at&nbsp;PRMIA Russia and associate professor at&nbsp;Perm State University.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/9-moavenat.jpg"><img src="/img/corp/leadership/9-moavenat-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Shahpour Moavenat</div>
                  <div class="leadership_item__desc">Blockchain</div>
                  <div class="leadership_item__text">Shahpour sees the important role that trust plays in&nbsp;bringing people’s abilities together. During his university studies cryptography was one of&nbsp;his major concerns. Recently he&nbsp;has tried to&nbsp;put efforts of&nbsp;different people over the Internet to&nbsp;build software. He&nbsp;has found all the tree aspects at&nbsp;Lykke.</div>
                </div>
              </a>
            </div>
            <div class="leadership_item">
              <a href="#leadership_modal" class="leadership_item__control" data-toggle="modal">
                <div class="leadership_item__image" data-big-image="/img/corp/leadership/big/8-birrer.jpg"><img src="/img/corp/leadership/8-birrer-preview.jpg" alt=""></div>
                <div class="leadership_item__info">
                  <div class="leadership_item__title h3">Thomas Birrer</div>
                  <div class="leadership_item__desc">Finance</div>
                  <div class="leadership_item__text">Dr. Thomas K. Birrer is Director of Finance of Lykke Corp and a fellow of the Lucerne University of Applied Sciences and Arts. At the University he is engaged as project leader and as tutor for the CAS Swiss Certified Treasurer (SCT) program. Thomas has a background in commerce and banking. He holds a Ph.D. (Dr. rer. pol.) in Economics from the University of Basel. Thomas has written a dissertation on coping with FX Risk Management in Swiss Enterprises. Thomas is a Swiss citizen and speaks German, French and English</div>
                </div>
              </a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

</article>

<?= Footer::widget(); ?>


<div class="modal leadership_modal fade" id="leadership_modal" tabindex="-1" role="dialog" aria-labelledby="leadershipModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-inner">
      <div class="modal-content">
        <div class="modal-header">
          <div class="leadership_modal__image"></div>
        </div>
        <div class="modal-body">
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>
