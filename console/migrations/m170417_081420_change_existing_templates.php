<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170417_081420_change_existing_templates extends Migration {

    public function safeUp() {
        $this->execute("
        UPDATE site_pages SET template = 'embedded'
        ");
        $this->execute("
        UPDATE site_pages SET template = 'seo'
        WHERE 
        url = 'bitcoin-euro'
        ");


        $page = SitePages::findOne([
            'url' => 'bitcoin-euro'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = "Every day over 100 million euros' worth of bitcoin change hands, while the price of bitcoin euro has more than doubled in the past year.";
        $block1->content = "
        <p><span style=\"font-weight: 400;\"></span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Do you trade currencies? Every day, you hear pitches from FX brokers and exchanges promising &ldquo;no fees&rdquo; and &ldquo;low spreads,&rdquo; right? These are dinosaur exchanges that use the banking system to settle your trades, have nice offices, and big marketing budgets.&nbsp;</span>At Lykke, we are building the next-generation exchange for the 21st century. Today, you can trade bitcoin euro, dollars, yen, pounds, all on the Lykke Exchange, with these advantages:</p>
        <ul style=\"text-align: left;\">
          <li><span style=\"font-weight: 400;\">All currencies are represented as digital tokens </span></li>
          <li><span style=\"font-weight: 400;\">All trades settle in minutes, not days</span></li>
          <li><span style=\"font-weight: 400;\">You hold your own assets in your own wallet</span></li>
          <li><span style=\"font-weight: 400;\">No fees and very low spreads</span></li>
        </ul>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Soon, you&rsquo;ll be able to trade Ether and an entire Universe of Ethereum-based tokens on the Lykke exchange.&nbsp;</span>When you trade currencies, what matters is high performance and low fees. This is what we offer - an open-source platform designed for the 21st century. Our order book and matching engine are designed specifically for fast, accurate trades with the best possible price for both buyers and sellers.</p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Lykke is a &ldquo;Bitcoin Native&rdquo; ecosystem, where <em>Bitcoin</em>&nbsp;can easilybe traded for other major currencies in a high-volume, low-friction environment. All trades settle on the Bitcoin Blockchain - no waiting for settlements. As soon as you trade, the assets are in your wallet and you&rsquo;re welcome to trade again. Unlike other exchanges, you keep control of your private keys in your mobile wallet - Lykke does not hold your assets on the exchange, ensuring the security of your assets.</span></p>
        <p style=\"text-align: center;\">&nbsp;</p>
        <p style=\"text-align: center;\"><span style=\"font-weight: 400;\"><a href=\"https://appsto.re/ru/Dwjvcb.i\" target=\"_blank\"><img src=\"https://www.lykke.com/img/appstore-badge.svg\" alt=\"\" width=\"203\" height=\"60\" /></a>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet\" target=\"_blank\"><img src=\"https://www.lykke.com/img/google-play.svg\" alt=\"\" width=\"203\" height=\"60\" /></a></span></p>
        <p style=\"text-align: center;\">&nbsp;</p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Bitcoin Euro is on the rise; whether you&rsquo;re a momentum trader, a market timer, a contrarian, an algo-trader, or a buy-and-hold investor, you&rsquo;ll find the low fees on the Lykke platform suited to your investment objectives. <span style=\"text-decoration: underline;\">We also pay the blockchain transaction fees for you</span>, so you only pay the spread, nothing else. We aim to have the lowest spreads in the business, because we run a much less centralized organization with far lower costs, and you get to benefit from that!</span>&nbsp;</p>
        <p><img style=\"float: right;\" src=\"https://res.cloudinary.com/lykkecdn/image/upload/q_100/v1489820087/bitcoin-euro-app_lxu3iw.png\" alt=\"bitcoin euro\" width=\"293\" height=\"502\" /></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">As more uncertainty grows around Brexit and other international populist movements, and as bitcoin has seen so much growth, interest in bitcoin has intensified. All investors should consider adding bitcoin to their portfolios. Here&rsquo;s how:</span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Go to the Apple app store or Google play and download the Lykke wallet app from Lykke Corp in Switzerland. </span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Go through the customer onboarding process. This &ldquo;Know Your Customer&rdquo; process is safer for you and complies with securities, FX, and exchange laws.</span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Send money from your bank to Lykke, with your account as the beneficiary. If you send euros, you will be credited with that many euros in your Lykke wallet. </span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Trade easily. Check our prices and compare against other exchanges - we think you&rsquo;ll be happy with your experience on our platform.</span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">About security: You keep your private keys in your mobile wallet. When you install your wallet, you&rsquo;ll be asked to write down twelve words that serve as your private key and password. You must write down those twelve words and back them up, because Lykke does not have access to your assets! </span></p>
        <p style=\"text-align: left;\"><span style=\"font-weight: 400;\">Most major exchanges hold your assets. Most exchanges have been hacked and are targets for attack, because they keep all the private keys, which concentrates risk. With Lykke, you keep your keys, making it much safer to store and control your own assets. Learn more at <a href=\"https://www.lykke.com/\">lykke.com</a></span><span style=\"font-weight: 400;\">.</span></p>
        <p style=\"text-align: left;\"><strong><span style=\"font-weight: 400;\">If you have any questions, please check out our&nbsp;<a href=\"https://www.lykke.com/city/faq\">FAQ</a>&nbsp;page!</span></strong></p>
        ";
        $block1->save();

    }

    public function safeDown() {
        $this->execute("
        UPDATE site_pages SET template = 'index'
        ");
    }
}
