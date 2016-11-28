

<?
use frontend\widgets\Footer;
use \frontend\widgets\SubMenu;

?>
<article class="content content-block container">
  <?= SubMenu::widget(['parentId' => $page['parent'] == "" ? $page['id'] : $page['parent']]) ?>

  <div class="row section--padding leadership">


    <div class="col-sm-8 automargin">

      <?= $page['content'] ?>

        <div class="grid">
          <div class="grid__item" data-size="1680x1680">
            <a href="/img/leadership/big/1-olsen.jpg" class="img-wrap"><img src="/img/leadership/1-olsen-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Richard Olsen</h3>
                <span>Founder, CEO</span>
                <p>Richard is&nbsp;a&nbsp;pioneer in&nbsp;high frequency finance with extensive entrepreneurial experience and well known for his academic work. He&nbsp;was a co-founder of&nbsp;OANDA, a&nbsp;currency information company and market maker in&nbsp;foreign exchange. Under Richard&rsquo;s stewardship as&nbsp;CEO of&nbsp;OANDA the company was a&nbsp;shooting star that launched the first fully automated&nbsp;FX trading platform offering second-by-second interest rate payments and netted 37&nbsp;Mio of&nbsp;profits in&nbsp;2007. Already at&nbsp;OANDA, he&nbsp;conceived the first trading platform with second-by-second interest payments. He&nbsp;is&nbsp;chief executive of&nbsp;Olsen Ltd, an&nbsp;investment manager, and visiting professor at&nbsp;the Centre for Computational Finance and Economic Agents at&nbsp;the University of&nbsp;Essex. His ambition is&nbsp;to&nbsp;transform financial markets into a&nbsp;seamless system without the inefficiencies that we&nbsp;today take for granted.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="1120x1680">
            <a href="/img/leadership/big/2-ivliev.jpg" class="img-wrap"><img src="/img/leadership/2-ivliev-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Sergey Ivliev</h3>
                <span>Products & Operations</span>
                <p>Sergey&rsquo;s dream is&nbsp;to&nbsp;make financial market better, faster and more inclusive. For 16&nbsp;years being an&nbsp;industry professional, lecturer, author, events curator, member of&nbsp;editorial boards of&nbsp;academic journals and expert councils he&nbsp;contributes to&nbsp;promote best practices of&nbsp;financial markets and risk management. Executed and supervised 100+ large scale system implementation projects with total revenue exceeding 40&nbsp;Mio. Regional Director at&nbsp;PRMIA Russia and associate professor at&nbsp;Perm State University.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="370x288">
            <a href="/img/leadership/big/3-nikulin.jpg" class="img-wrap"><img src="/img/leadership/3-nikulin-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Michael Nikulin</h3>
                <span>Technology</span>
                <p>Michael is&nbsp;an&nbsp;architect, designer and developer with 10&nbsp;year experience in&nbsp;creating market solutions for financial institutions, including Anti-Money Laundering, Fraud Detection and Financial Markets Compliance solutions. Combines deep knowledge of&nbsp;financial architecture with Blockchain settlement mechanisms.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="1400x1680">
            <a href="/img/leadership/big/6-steblyuk.JPG" class="img-wrap"><img src="/img/leadership/6-steblyuk-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Arseniy Steblyuk</h3>
                <span>Risk Management</span>
                <p>Arseniy has extensive expertise in&nbsp;maintaining business continuity, ensuring sustainable operations of&nbsp;a&nbsp;highly technical, high-frequency electronic trading firm in&nbsp;complex regulatory environment and promoting companywide risk awareness.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="337x449">
            <a href="/img/leadership/big/8-birrer.jpg" class="img-wrap"><img src="/img/leadership/8-birrer-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Thomas Birrer</h3>
                <span>Finance</span>
                <p>Thomas&rsquo; background is&nbsp;in&nbsp;commerce and banking. Currently Thomas is&nbsp;preparing his PhD-Thesis in&nbsp;Economics at&nbsp;the University of&nbsp;Basel. He&nbsp;is&nbsp;also a&nbsp;fellow and tutor at&nbsp;the Institute for Financial Services Zug where he&nbsp;is&nbsp;engaged as&nbsp;director of&nbsp;the &laquo;CFO Forum Schweiz&raquo;, as&nbsp;project leader of&nbsp;different projects&nbsp;&mdash; amongst them &laquo;currencies as&nbsp;value drivers in&nbsp;companies&raquo; sponsored by&nbsp;the Confederation&rsquo;s innovation promotion agency.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="647x760">
            <a href="/img/leadership/big/4-mechenkova.jpg" class="img-wrap"><img src="/img/leadership/4-mechenkova-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Lena Mechenkova</h3>
                <span>Communications</span>
                <p>Lena is&nbsp;a&nbsp;communications professional with more than 17&nbsp;years&rsquo; experience in&nbsp;public relations and mass media. Areas of&nbsp;expertise include corporate communications, internal communications, event management, change communications, writing, and public speaking.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="678x1012">
            <a href="/img/leadership/big/9-moavenat.jpg" class="img-wrap"><img src="/img/leadership/9-moavenat-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Shahpour Moavenat</h3>
                <span>Blockchain</span>
                <p>Shahpour sees the important role that trust plays in&nbsp;bringing people&rsquo;s abilities together. During his university studies cryptography was one of&nbsp;his major concerns. Recently he&nbsp;has tried to&nbsp;put efforts of&nbsp;different people over the Internet to&nbsp;build software. He&nbsp;has found all the tree aspects at&nbsp;Lykke.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="955x849">
            <a href="/img/leadership/big/5-golub.jpg" class="img-wrap"><img src="/img/leadership/5-golub-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Anton Golub</h3>
                <span>Science</span>
                <p>Anton worked at&nbsp;the Manchester Business School as&nbsp;a&nbsp;Marie Curie research fellow on&nbsp;high frequency trading, market micro-structure and Flash Crashes.</p>
              </div>
            </a>
          </div>
          <div class="grid__item" data-size="1280x1168">
            <a href="/img/leadership/big/7-migin.jpg" class="img-wrap"><img src="/img/leadership/7-migin-preview.jpg" alt="">
              <div class="description description--grid">
                <h3>Andrey Migin</h3>
                <span>Software Development</span>
                <p>Andrey is&nbsp;exceptional team leader with 8&nbsp;year professional experience of&nbsp;FX marketplace systems development.</p>
              </div>
            </a>
          </div>
        </div>

        <div class="preview">
          <button class="action action--close"></button>
          <div class="description description--preview"></div>
        </div>
      </div>
  </div>

</article>

<?= Footer::widget(); ?>

<?
$this->registerJsFile('/js/imagesloaded.pkgd.min.js');
$this->registerJsFile('/js/masonry.pkgd.min.js');
$this->registerJsFile('/js/classie.js');
$this->registerJsFile('/js/modernizr-custom.js');
$this->registerJsFile('/js/main.js');
?>


<script>
  $(document).ready(function () {
    (function() {
      var support = { transitions: Modernizr.csstransitions },
      // transition end event name
        transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
        transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
        onEndTransition = function( el, callback ) {
          var onEndCallbackFn = function( ev ) {
            if( support.transitions ) {
              if( ev.target != this ) return;
              this.removeEventListener( transEndEventName, onEndCallbackFn );
            }
            if( callback && typeof callback === 'function' ) { callback.call(this); }
          };
          if( support.transitions ) {
            el.addEventListener( transEndEventName, onEndCallbackFn );
          }
          else {
            onEndCallbackFn();
          }
        };

      new GridFx(document.querySelector('.grid'), {
        imgPosition : {
          x : -0.5,
          y : 1
        },
        onOpenItem : function(instance, item) {
          instance.items.forEach(function(el) {
            if(item != el) {
              var delay = Math.floor(Math.random() * 50);
              el.style.WebkitTransition = 'opacity .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1), -webkit-transform .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';
              el.style.transition = 'opacity .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1), transform .5s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';
              el.style.WebkitTransform = 'scale3d(0.1,0.1,1)';
              el.style.transform = 'scale3d(0.1,0.1,1)';
              el.style.opacity = 0;
            }
          });
        },
        onCloseItem : function(instance, item) {
          instance.items.forEach(function(el) {
            if(item != el) {
              el.style.WebkitTransition = 'opacity .4s, -webkit-transform .4s';
              el.style.transition = 'opacity .4s, transform .4s';
              el.style.WebkitTransform = 'scale3d(1,1,1)';
              el.style.transform = 'scale3d(1,1,1)';
              el.style.opacity = 1;

              onEndTransition(el, function() {
                el.style.transition = 'none';
                el.style.WebkitTransform = 'none';
              });
            }
          });
        }
      });
    })();
  });

</script>
