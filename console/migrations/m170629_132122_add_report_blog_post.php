<?php
use common\models\BlogPosts;
use yii\db\Migration;

class m170629_132122_add_report_blog_post extends Migration {

    public function safeUp() {
        $post = new BlogPosts();
        $post->post_title = "Lykke Annual Report";
        $post->post_url = "annual_report_2016";
        $post->post_text = "
        
                <div class=\"r_intro\">
                  <h1>Dear coinholders,</h1>

                  <p class=\"lead\">Welcome to the Lykke world!</p>

                  <p class=\"lead\">Thank you for joining our cause and investing in Lykke.
                    A special thank you for the many of you, who participate
                    actively in our public channels and provide us feedback
                    of how to improve our products and services.</p>

                  <p class=\"lead\">
                    Lykke builds a global marketplace for all types of
                    digital assets and instruments on blockchain with open
                    knowledge and open source software. As we speak, our
                    users can trade currencies, our own shares and other
                    selected assets. In the coming months, we will expand
                    our coverage to include major cryptos, initial equities,
                    fixed income instruments, commodities and investment
                    products. We will launch an ICO platform for new listings.
                    Initially, we focus on the retail user and develop a wallet
                    to borrow, invest, lend, pay, save, trade and insure all
                    in one. Over time we will enhance the offering to serve
                    the institutional market. Today, we have a Vanuatu
                    brokerage license and hope to soon receive a Cyprus
                    brokerage license. We are applying for brokerage and
                    other licenses in Singapore, Switzerland, United Kingdom, United States, Mexico and more countries will follow.
                  </p>

                  <p class=\"lead\">
                    During the first two years, we have developed an
                    institutional accelerator business, where we support
                    companies and governments to embrace blockchain
                    technology and enhance their services with enterprise
                    solutions of our technology.
                  </p>

                  <p class=\"lead\">
                    Over the past year, our team has grown exponentially
                    from a small group of 20 to 80 people today. It is a joy to
                    work together and build an amazing organization with
                    stellar products. A big thank you to all team members!
                  </p>
                </div>

                <h2 class=\"h1\">Key milestones</h2>

                <div class=\"r_timeline_accent\">2016</div>

                <ul class=\"r_timeline\">
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">April</div>
                    <div class=\"r_timeline_item__text\">The first Lykke Wallet public presentation</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">June</div>
                    <div class=\"r_timeline_item__text\">Lykke Exchange / Lykke Wallet launch</div>
                    <div class=\"r_timeline_item__text\">CHF 500K raised in a private round</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">August</div>
                    <div class=\"r_timeline_item__text\">Android app launch; CHF 600K raised in a private round </div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">September</div>
                    <div class=\"r_timeline_item__text\">Lykke coin ICO (CHF 1.16M raised)</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">November</div>
                    <div class=\"r_timeline_item__text\">Lykke Streams launch</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">December</div>
                    <div class=\"r_timeline_item__text\">SolarCoin trading, Lykke joins Hyperledger</div>
                  </li>
                </ul>

                <div class=\"r_timeline_accent\">2017</div>

                <ul class=\"r_timeline\">
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">February</div>
                    <div class=\"r_timeline_item__text\">Lykke 1-year Forward ICO (CHF 2M raised) </div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">March</div>
                    <div class=\"r_timeline_item__text\">Chronobank TIME token trading</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">April</div>
                    <div class=\"r_timeline_item__text\">Lykke Accelerator launch</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">May</div>
                    <div class=\"r_timeline_item__text\">Offchain settlement implemented</div>
                  </li>
                  <li class=\"r_timeline_item\">
                    <div class=\"r_timeline_item__title\">June</div>
                    <div class=\"r_timeline_item__text\">Ethereum integration</div>
                  </li>
                </ul>

                <h2 class=\"h1\">Key Performance Metrics</h2>

                <div class=\"r_summary\">
                  <div class=\"row\">
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item\">
                        <div class=\"r_summary__accent\">11,442</div>
                        <div class=\"r_summary__text\">Accounts registered</div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item\">
                        <div class=\"r_summary__accent\">43,025 </div>
                        <div class=\"r_summary__text\">Trades settled on blockchain total value of with </div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item\">
                        <div class=\"r_summary__accent\">135</div>
                        <div class=\"r_summary__text\">Countries</div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item\">
                        <div class=\"r_summary__accent\">$70.2M</div>
                        <div class=\"r_summary__text\">Total traded value </div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item r_summary_item--large\">
                        <div class=\"r_summary__accent\">52.5% </div>
                        <div class=\"r_summary__text\">Of the clients come from Switzerland,
                          United States, United Kingdom,
                          German</div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item r_summary_item--large\">
                        <div class=\"r_summary__accent\">77.2</div>
                        <div class=\"r_summary__text\">BTC paid in miners fee paid for
                          onchain settlement
                          (0.11% of the volume)</div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item r_summary_item--last\">
                        <div class=\"r_summary__accent\">2,361</div>
                        <div class=\"r_summary__text\">Active clients (at least 1 trade)</div>

                        <div class=\"r_summary__title\">Clients registered</div>
                        <div class=\"r_summary__image\">
                          <img src=\"/img/report/report_2.jpg\" class=\"img-responsive\" alt=\"Clients registered\">
                        </div>
                      </div>
                    </div>
                    <div class=\"col-sm-6\">
                      <div class=\"r_summary_item r_summary_item--last\">
                        <div class=\"r_summary__accent\">$1,632 </div>
                        <div class=\"r_summary__text\">Average trade</div>

                        <div class=\"r_summary__title\">Trades/day</div>
                        <div class=\"r_summary__image\">
                          <img src=\"/img/report/report_1.jpg\"  class=\"img-responsive\" alt=\"Trades/day\">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <h2 class=\"h1\">Financial Outlook</h2>

                <h3>Financial Hightlights (2016 FY) &middot; mln CHF</h3>
                <div class=\"r_summary r_summary--extended\">
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">6,0</div>
                    <div class=\"r_summary__text\">Consolidated income</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">7,6</div>
                    <div class=\"r_summary__text\">Total expenses</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">-1,6</div>
                    <div class=\"r_summary__text\">Net profit (loss)</div>
                  </div>
                </div>

                <h3>Financial Hightlights (2016 FY) &middot; mln CHF</h3>
                <div class=\"r_summary r_summary--extended\">
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">5,4</div>
                    <div class=\"r_summary__text\">Cash</div>
                    <div class=\"r_summary__hint\">Funds on banking
                      accounts of Lykke Corp
                      and the subsidiaries</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">1</div>
                    <div class=\"r_summary__text\">Cryptocurrencies</div>
                    <div class=\"r_summary__hint\">Market value of the
                      cryptocurrencies at Lykke
                      Corp wallets</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">6,4</div>
                    <div class=\"r_summary__text\">Assets</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">-1,2</div>
                    <div class=\"r_summary__text\">Liabilities</div>
                    <div class=\"r_summary__hint\">Lykke fiat colored coins in clients wallets</div>
                  </div>
                  <div class=\"r_summary_item\">
                    <div class=\"r_summary__accent\">1</div>
                    <div class=\"r_summary__text\">Net liquidity</div>
                  </div>
                </div>

                <div class=\"lead\">
                  This report of Lykke Corp includes the consolidated results of Lykke Corp Switzerland and Lykke Corp UK Limited for the reporting period from January 1, 2016, to December 31, 2016, and operational metrics as of 1 June, 2017.
                </div>

                <p class=\"lead\">
                  Financials statement are currently in the process of being
                  audited and may therefore be subject to change.
                </p>

                <div class=\"r_footer\">
                  <div class=\"row\">
                    <div class=\"col-sm-6\">
                      <a href=\"https://report2016.lykke.com\" class=\"btn btn--red btn-block\" target=\"_blank\">Vote</a>
                      <span class=\"r_hint\">Vote for Lykke Annual report ’16</span>
                    </div>
                    <div class=\"col-sm-6\">
                      <a href=\"/Annual_Report_2016.pdf\" class=\"btn btn--report btn-block\" target=\"_blank\">
                        <span class=\"pdf_icon\"></span> View report
                      </a>
                      <span class=\"r_hint\">View the full version of Lykke Annual report ’16</span>
                    </div>
                  </div>
                </div>
        
        ";
        $post->post_preview_text = "Thank you for joining our cause and investing in Lykke. A special thank you for the many of you, who participate actively in our public channels and provide us feedback of how to improve our products and services.";
        $post->post_datetime = "2017-06-30 13:49:44";
        $post->post_author = 5;
        $post->published = 0;
        $post->report_template = 1;
        $post->save();
    }

    public function safeDown() {
        $post = BlogPosts::findOne([
            'post_url' => "annual_report_2016"
        ]);
        $post->delete();
    }
}
