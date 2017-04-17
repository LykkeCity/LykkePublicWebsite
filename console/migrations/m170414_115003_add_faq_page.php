<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170414_115003_add_faq_page extends Migration
{
    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'city/faq'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Frequently Asked Questions';
        $block1->content = '';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'FAQ';
        $block2->title = 'About Lykke';
        $block2->content = '
                      <h3>What is Lykke?</h3>
              <p>Lykke is a movement to build one global
                marketplace that is a level playing
                field where everyone has access. We
                start with foreign exchange and expand
                to equities, fixed income, commodities
                and other asset classes. Lykke Corp is
                incorporated in Switzerland and issued
                it\'s shares on the blockchain (Lykke
                Coins).</p>
              <h3>What kind of company is Lykke?</h3>
              <p>Lykke Corp (Lykke AG) is a Swiss
                registered corporation with subsidiaries
                in Vanuatu, Cyprus, and London. For more
                corporate information please refer to <a
                    class="urlextern"
                    title="http://lykke.world"
                    href="http://lykke.world/"
                    rel="nofollow">http://lykke.world</a>.
              </p>
              <h3>How does operate Lykke
                structurally, as an intermediary? as a
                gateway, a Oanda or fx between
                cryptocurrency and forex?</h3>
              <p>Lykke Corp first of all is FinTech
                company that develops a trading platform
                (see our <a
                    class="wikilink2 text-danger"
                    title="github.com:lykkecity:start"
                    href="https://github.com/lykkecity/"
                    rel="nofollow">Github</a>). The
                company has subsidiaries that are
                licensed as financial companies and that
                are providing broker and trading
                services for the clients. All possible
                asset pairs types will be traded: fiat
                fx &lt;&gt; fiat fx, fiat fx &lt;&gt;
                crypto, crypto &lt;&gt; crypto. Lykke is
                not related to Oanda.</p>
              <h3>How Lykke intersects
                with the banking system to make its own
                function?</h3>
              <p>Lykke is supposed to bridge the
                conventional finance with the digital
                assets on the public blockchains. To
                ensure this we plan to be fully
                compliant with the regulatory regimes in
                all jurisdictions where Lykke operates.
                In the grand schema banks may act like a
                digital assets issuers, liquidity
                providers, payments facilities.</p>
              <h3>We are talking of a
                securities firm in cryptocurrency?</h3>
              <p>Lykke is much more than a traditional
                securities business. We believe that in
                future many assets will be digitized,
                from real estate to freelance time, to
                music IP rights, to rent, not to say
                about SME private equity, project
                financing, bonds, community coins, and
                many more.</p>
              <h3>What is the
                business-model?</h3>
              <p>Commissions &amp; fees at Lykke Wallet
                are essentially zero. Lykke will make
                money on providing liquidity, issuance
                services and consulting.</p>
              <h3>Why UK for licensing MTF?</h3>
              <p>We think that UK provides best-in-class
                regulatory environment for such kind of
                trading facility for institutional
                clients. The compliance is hard, but it
                let us streamline the processes and
                operations to provide high-end service
                to our clients.</p>
              <h3>What are the
                regulatory requirements to acquire this
                license?</h3>
              <p>Minimum regulatory capital according to
                MiFID is 730k EUR. The application
                paperwork is also huge: 50+ documents
                with heavy focus on IT processes. A lot
                of work has already been done.</p>
              <h3>If Lykke is open
                sourced won\'t some competing company just
                come in and copy and replicate?</h3>
              <p>Sure, why not, the space has to be
                competitive. However the software code
                is only one of the ingredients of the
                dish.</p>
              <h2>Blockchain tech</h2>
              <h3>Does Lykke build a
                blockchain?</h3>
              <p>No. It uses Colored Coins / tokens of
                other blockchains, such as Bitcoin and
                Ethereum.</p>
              <h3>Could Lykke use theoretically any other Blockchain?</h3>
              <p>Blockchains that support issued coins,
                yes. In practice not all implementations
                make sense.</p>
              <h3>How dependent is Lykke
                on Bitcoin?</h3>
              <p>Currently we use Open Assets protocol and
                blockchain of Bitcoin for settlement. We
                plan to expand to Ethereum.</p>
              <h3>Could the blocksize
                limit become a problem for Lykke?</h3>
              <p>Since Lykke settles all the transactions
                on the blockchain, block size limit put
                constraints on the number of
                transactions that may be processed. We
                are developing off-chain protocols, that
                will allow scaling up the capacity. See
                our <a class="urlextern"
                       title="https://lykke.com/Whitepaper_LykkeExchange.pdf"
                       href="https://lykke.com/Whitepaper_LykkeExchange.pdf"
                       rel="nofollow">Whitepaper</a> for
                details.</p>
              <h2>Lykke wallet</h2>
              <h3>Where can I download a
                Lykke wallet?</h3>
              <p>On the App Store: <a class="urlextern"
                                      title="https://itunes.apple.com/en/app/lykke-wallet/id1112839581"
                                      href="https://itunes.apple.com/en/app/lykke-wallet/id1112839581"
                                      rel="nofollow">https://itunes.apple.com/en/app/lykke-wallet/id1112839581</a>
              </p>
              <p>On Google Play: <a class="urlextern"
                                    title="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet"
                                    href="https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet"
                                    rel="nofollow">https://play.google.com/store/apps/details?id=com.lykkex.LykkeWallet</a>
              </p>
              <h3>What if my coins are
                stolen?</h3>
              <p>Technically it is not possible to steel
                the colored coins from Lykke Wallet
                unless your private key is compromised
                (for example someone has access to your
                paper backup). The wallet has similar
                security to the bitcoin itself. The
                private key is not to leave the device.
                If nevertheless something like this
                happen please let us know immediately <a
                    class="mail"
                    title="support@lykke.com"
                    href="mailto:support@lykke.com">support@lykke.com</a>
                so that we may take measures to lock
                your trading account.</p>
              <h3>Can I store my coins
                in any Bitcoin wallet?</h3>
              <p>No. The special code that makes your
                colored coins yours is in the OP_RETURN
                field of the Bitcoin transaction. (We
                use <a class="urlextern"
                       title="https://github.com/OpenAssets/open-assets-protocol"
                       href="https://github.com/OpenAssets/open-assets-protocol"
                       rel="nofollow">Open Asset
                  protocol</a> to encode the digital
                asset metadata). We have designed the
                wallet so it won’t transfer to a normal
                Bitcoin address. For the moment, the
                only wallets that accept our colored
                coins are the Lykke wallet and the
                Coinprism wallet.</p>
              <h3>Can I send the coins
                from my Lykke mobile wallet to my Coinprism
                wallet?</h3>
              <p>Yes. At the moment, you can transfer
                Lykke coins to another Lykke wallet or a
                Coinprism wallet.</p>
              <h3>Is it safe to keep my
                Lykke coins in my Lykke wallet
                long-term?</h3>
              <p>Yes, but security doesn\'t stop with just
                us.&nbsp;While Apple phones have very
                good security preventing any malware
                from recovering data from an app, you
                should keep a lock code on your phone
                and take other measures to prevent
                people from accessing your wallet. It is
                very important to create paper backup of
                your wallet - just write down 12 words
                seed. This seed will help you to recover
                your private key in case your device is
                lost or stolen.</p>
              <h3>Is it possible to use
                the wallet to do an offline cold
                storage?</h3>
              <p>Assuming there is no malware already on
                your computer or phone, there are two
                ways to do that:</p>
              <ol>
                <li class="level1">
                  <div class="li">Be sure to save the
                    twelve-word password of your
                    wallet in a few different
                    places, then delete the wallet
                    from your phone. You can always
                    re-download it and recover your
                    coins using the password.
                  </div>
                </li>
                <li class="level1">
                  <div class="li">Send your coins to a
                    Coinprism wallet and back up
                    your private key there to an
                    offline device.
                  </div>
                </li>
              </ol>
              <h2>ICO</h2>
              <h3>What is ICO?</h3>
              <p>ICO stands for Initial Coin Offering.
                Lykke offered 30 million Lykke coins
                (LKK) from September 13 to October 11,
                2016, at a price of .05 Swiss francs per
                coin. The offered coins represented
                around 2.33% of the Lykke equity.</p>
              <h3>What are these coins, exactly&#8202;—&#8202;Bitcoins?</h3>
              <p>They are colored coins&#8202;—&#8202;very
                small amounts of bitcoin (imagine a
                penny’s worth of Bitcoin) with codes
                attached that specify the value of the
                asset. Learn more at <a
                    class="urlextern"
                    title="https://github.com/OpenAssets/open-assets-protocol"
                    href="https://github.com/OpenAssets/open-assets-protocol"
                    rel="nofollow">https://github.com/OpenAssets/open-assets-protocol</a>
              </p>
              <h3>Is LKK a currency or a
                stock?</h3>
              <p>Lykke coins (LKK) are cryptographic
                tokens that represent ownership of
                Lykke, a Swiss registered corporation.
                It is not a currency. There is no
                mining, and there are no other exchanges
                that accept it (though that may change).
                One hundred Lykke coins represent a
                single share of Lykke Corp. Read more at
                our <a class="urlextern"
                       title="/Lykke_Corp_Placement_Memorandum.pdf"
                       href="../Lykke_Corp_Placement_Memorandum.pdf"
                       rel="nofollow">Information
                  Memorandum</a></p>
              <h3>Are there two classes
                of stock?</h3>
              <p>No. In a traditional fundraise, early
                investors get prefered stock in exchange
                for cash. In this kind of early-public
                arrangement, investors instead get
                liquidity. All coins have exactly the
                same rights.</p>
              <h3>Are Lykke coins
                divisible?</h3>
              <p>Yes. They are divisible to six decimal
                places. This is probably overkill, but
                it lets people buy Lykke coins with an
                even amount of any currency. In most
                cases, it doesn’t make sense to divide a
                Lykke coin, but you could if you wanted
                to.</p>
              <h3>How did you arrive at
                the ICO valuation?</h3>
              <p>We priced our ICO in reference to other
                fintech companies that have raised and
                are raising money. The fintech market is
                active with many different startups at
                various stages of development, so we had
                a number of companies that we could
                compare with. We also used standard
                present value calculations based on the
                revenue forecasts for the next three
                years. The valuation of Lykke was
                derived from these two valuation methods
                and then validated with professionals,
                who have extensive experience with
                startup and growth companies.</p>
              <h3>Can I still purchase
                Lykke coins after the ICO?</h3>
              <p>Yes, the coins are traded on the open
                market of Lykke Exchange. You can
                download the Lykke wallet, deposit
                Bitcoins, send a SWIFT bank transfer or
                make a credit-card payment, and buy
                Lykke coins on the Exchange page.</p>
              <h3>Can I use my existing Bitcoin wallet?</h3>
              <p>Lykke coins must be purchased using a
                wallet that can hold colored coins on
                the Bitcoin blockchain. At the moment,
                this includes the Lykke wallet for iOS
                and Android, and the Coinprism
                wallet.</p>
              <h3>Are there any
                fees?</h3>
              <p>Yes. Using any other colored coin wallet,
                you will need to provide a small amount
                of Bitcoin to pay for the transaction.
                When you use the Lykke wallet, Lykke
                pays those fees for you.</p>
              <h2>Owning Lykke Coins</h2>
              <h3>What is the exchange
                rate of 1 LKK as of now?</h3>
              <p>It is around 0.05 CHF per LKK, which is
                roughly 0.051$ per LKK or 0.0000837 BTC
                per LKK. The price varies with the
                market demand and supply.</p>
              <h3>Do my coins have
                voting rights?</h3>
              <p>Yes. The shareholders exercise their
                voting right in proportion to the
                overall amount of the Lykke Coins in
                their possession. The voting results
                will be rounded to full votes. The
                calculation of the necessary quorum is
                based on the amount of existing Lykke
                coins. Lykke is working on building a
                in-app voting tool that will let all
                Lykke shareholders vote using their
                tokens. Votes will be held on major
                topics that the board deems appropriate
                or are required in the bylaws. The goal
                is to give Lykke shareholders a say in
                all major decisions of the company.</p>
              <h3>If I have Lykke coins
                am I considered to be a shareholder of Lykke
                Corp?</h3>
              <p>Yes. All coinholders are entitled to
                become shareholders of Lykke Corp. The
                minimum KYC would be required for it.
                The shareholders have additional rights
                such as voting and receiving
                dividends.</p>
              <h3>Why is the KYC process required?</h3>
              <p>The KYC process is a standard AML/CFT
                measure required by all financial
                companies and banks. This includes the
                verification of the ID and Proof of
                Residence. An additional biometrics
                factor (selfie) is added to secure your
                account.</p>
              <h3>Would my personal
                information be safe after KYC process? I
                don’t want my passport to become available
                in the internet one day</h3>
              <p>The personal data is stored protected on
                a standalone server. Strictly our
                Compliance officers have access to
                it.</p>
              <h3>If I own 100 or more
                coins, will I receive share
                certificates?</h3>
              <p>No. All share certificates are being held
                by the secretary. The coins represent
                the value of the company, though the
                share certificates are legally required
                to be maintained.</p>
              <h3>Will the coins pay
                dividends?</h3>
              <p>Yes. They will when the company decides
                to pay profits to investors, rather than
                re-invest to fuel growth. As with most
                startups, dividends may be some time
                away.</p>
              <h3>Can the value of the
                coins be diluted?</h3>
              <p>Yes. At the moment, there are 12,856,900
                shares of stock. The company issues new
                shares on occasion, usually to bring on
                new investors. Now that the company’s
                shares are publicly traded, the company
                will, in the future, set up a voting
                mechanism for existing coin holders to
                vote on matters like this. Be sure to
                see the <a class="urlextern"
                           title="/Lykke_Corp_Placement_Memorandum.pdf"
                           href="../Lykke_Corp_Placement_Memorandum.pdf"
                           rel="nofollow">Shareholder
                  Memorandum</a> for details.</p>
              <h3>Could there be a
                problem with liquidity?</h3>
              <p>Potentially, but unlikely. As with any
                stock, instant liquidity is not
                guaranteed. Lykke has reserved ten
                percent of the funds raised for a
                liquidity pool and will be raising more
                outside funds for an investment pool
                that will purchase Lykke coins. In
                general, the company aims to help
                provide as much liquidity as possible.
                As more people own and want the coins,
                liquidity will increase. If, for some
                reason, fewer people want the coins,
                liquidity will decrease.</p>
              <h3>Will the company
                publish reports?</h3>
              <p>Yes. We plan to report annually via our
                web site. You may find our <a
                    class="urlextern"
                    title="https://lykke.com/Annual_Report_2015.pdf"
                    href="https://lykke.com/Annual_Report_2015.pdf"
                    rel="nofollow">2015 Annual
                  report</a> there as well.</p>
              <h3>Will there be an annual shareholder meeting?</h3>
              <p>The shareholder’s meeting will be held
                electronically. The reference date for
                the access to the shareholder’s meeting
                will be at least 20 days prior to the
                event, based on the respective coin
                holdings. The respective shareholders
                will be invited at least 20 days prior
                to the shareholder’s meeting, if Lykke
                Corp is in possession of the email
                address of the respective Shareholder
                and the shareholder is referenced in the
                share ledger of Lykke Corp. It is also
                planned to have onsite events, which we
                hope will be an opportunity for
                learning, meeting people, creating new
                opportunities, and extending our
                community.</p>
              <h3>How can I best keep up
                with Lykke developments?</h3>
              <p>There is News tab on MyLykke page, also
                everyone who registered a Lykke Wallet
                will receive a newsletter (of course you
                if you haven\'t unsubscribed from
                it).</p>
              <h3>How do I sell my
                coins?</h3>
              <p>Just put in a sell order using an
                Exchange page at your Lykke Wallet.</p>
              <h3>What\'s the total
                supply of Lykke coins?</h3>
              <p>Total number of Lykke Coins issued is
                1,285,690,000. The ownership structure
                is stored on the blockchain: <a
                    class="urlextern"
                    title="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM/owners"
                    href="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM/owners"
                    rel="nofollow">https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM/owners</a>
              </p>
              <h3>In which situations
                can the number of Lykke Coins increase
                again?</h3>
              <p>This may only occur if the decision is
                made by a Shareholders voting.</p>
              <h1>Other questions</h1>
              <h2>How does Lykke earn money?</h2>
              <p>Comissions are zero. Lykke will earn its
                revenue from the value add services such
                as liquidity provision, issuance
                services, whitelabeling and B2B
                consulting.</p>
              <h2>When will Lykke become
                profitable?</h2>
              <p>We will first focus on FX, where the
                daily volume is 4 trillion USD. Lykke
                will be a profitable company with a
                market share of 0.025%.</p>
              <h2>What is the unique
                selling proposition of Lykke?</h2>
              <p>Our marketplace is highly efficient and
                seamless. We provide immediate delivery
                and settlement; there is no secondary
                risk as is typical for the traditional
                banking system. The spreads on our
                marketplace and transaction costs are
                low thanks to our efficient corporate
                structure and new technology.</p>
              <h2>How does Lykke differ
                from the other crypto-ventures?</h2>
              <p>Lykke is building a trading venue, where
                buy and sell orders are crossed with a
                matching engine. The accounting,
                delivery and settlement of the traded
                assets use the distributed ledger
                technology. Our initial focus is the
                foreign exchange market with a daily
                transaction volume of 4 trillion USD,
                the biggest financial market of the
                world. Lykke is not a crypto-currency or
                distributed ledger technology venture;
                we are building a marketplace that
                integrates seamlessly with the existing
                financial system.</p>
              <h2>What is the history of
                Lykke?</h2>
              <p>Lykke traces its history to 1985, when
                Richard Olsen founded Olsen &amp;
                Associates. O&amp;A collected
                tick-by-tick foreign exchange data and
                built an online information system with
                real time forecasts and trading
                recommendations. In 1995, O&amp;A
                organized the first high frequency
                finance conference making a large
                tick-by-tick data set available to
                academia. In 1996, Richard co-founded
                OANDA, a spin-off of O&amp;A. First,
                OANDA introduced a currency converter
                that was an instant success and in 2001
                launched a foreign exchange trading
                platform with second-by-second interest
                payments and uniform spreads for all
                ticket sizes. There was no price
                discrimination for small traders.
                Richard is passionate about reforming
                the financial industry and creating a
                seamless marketplace, where any asset
                can be exchanged against any other asset
                at minimal cost.</p>
              <h2>Why is our matching
                engine price, spread and time based?</h2>
              <p>We reward market makers quoting narrow
                spreads with priority in the queuing
                system. This improves the quality of our
                flow and enhances price discovery
                resulting in lower spreads, reduced
                micro volatility and higher volume
                throughput. Traditional matching engines
                queue on the basis of price and time
                which creates an unfair advantage for
                high frequency traders.</p>
              <h2>Why does the Lykke
                marketplace have an intraday yield
                curve?</h2>
              <p>A financial market has to provide
                liquidity and ensure that there is a
                buyer, whenever someone wants to sell.
                Interest rate payments are a core
                mechanism to incentivize market
                participants to buy or sell a risky
                asset. A major innovation of the Lykke
                marketplace is intraday interest
                payments. The batch-based system of the
                existing market infrastructure has been
                an obstacle to intraday interest rate
                payments and has been a major reason for
                the disjointed price movements in
                periods of crisis.</p>
              <h2>Why does Lykke rely on
                open source software?</h2>
              <p>Open source software nurtures
                transparency, enables people from around
                the world to contribute and, last but
                not least, makes it easy to integrate
                our services with other
                applications.</p>
              <h2>Why does Lykke operate
                as a crowd-based company?</h2>
              <p>Our corporate organization is inspired by
                the mechanisms of nature and its
                unmatched efficiency. The crowd-based
                approach opens our organization to
                contributors from around the world and
                provides us with speed and
                versatility.</p>
              <h2>How can I participate
                in the Lykke movement?</h2>
              <p>We dream of transforming the world into
                an Amazon rain forest, so there is no
                lack of work. We invite you to become a
                Lykke citizen and contribute in any way
                that you think is relevant. There is
                work at all ends, which needs to be
                done; just take the initiative. We want
                to emulate the success of Wikipedia,
                where people from around the world
                started to contribute. You are invited
                to initiate new projects. We have a
                budget of Lykke coins for new projects,
                and there is also a scheme of rewards at
                daily, weekly and monthly intervals to
                show appreciation for voluntary
                work.</p>
              <h2>Why is KYC information
                required to become a citizen?</h2>
              <p>Regulations require the Know Your
                Customer procedure. We have another
                reason as well. Citizens are citizens;
                they shape the future of Lykke. We want
                to know the identity of the people
                involved. To thank you for the hassle,
                we transfer 10 Lykke coins to your
                wallet on completion of the acceptance
                procedure. Thank you.</p>
              <h2>Why do we have
                honorary citizens?</h2>
              <p>We invite people to become honorary
                citizens, because we admire their
                kindness, innovative work and/or
                wisdom.</p>
              <h2>Why is Lykke a
                commercial enterprise?</h2>
              <p>A commercial enterprise has equity with
                shares that can be traded in the market,
                our Lykke coins. The market value of our
                coins mirrors the efficiency and success
                of Lykke. This is a clear-cut metric and
                aligns interests.</p>
              <h2>What are the long-term
                plans of Richard, the major
                shareholder?</h2>
              <p>Richard has pledged his shares to a
                social cause after fulfilling his other
                responsibilities.</p>
              <h2>What is a Lykke
                coin?</h2>
              <p>A Lykke coin is a colored coin that is
                issued by Lykke Corp. One Lykke colored
                coin is 0.01 (one one-hundredth) of one
                share of Lykke Corp. 100 Lykke colored
                coins are one share of Lykke Corp. Lykke
                Corp has committed 2.5 Mio Lykke Corp
                shares (20% of Lykke\'s capital) for
                issuance as Lykke colored coins, which
                means that a total of 250 Mio Lykke
                colored coins will be outstanding. Lykke
                Corp makes a market for its coins so
                that citizens can sell their coins and
                cash out.</p>
              <p>See <a class="urlextern"
                        title="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM?"
                        href="https://www.coinprism.info/asset/AXkedGbAH1XGDpAypVzA5eyjegX4FaCnvM"
                        rel="nofollow">Lykke Coinprism
                  Metadata</a></p>
              <h2>Why do we make our
                payments with Lykke coins?</h2>
              <p>We use Lykke coins to reduce our
                dependence on external funding. If a
                holder of Lykke coins wants to convert
                his Lykke coins into CHF, EUR or USD or
                BTC, Lykke will make the conversion and
                transfer the money to the designated
                address.</p>
              <h2>Will the price of
                Lykke coins change over time?</h2>
              <p>The price of Lykke coins will depend on
                market conditions and the success of the
                products of Lykke. Lykke guarantees for
                the first year of operations to buy back
                the Lykke coins at a minimum price of
                0.004 CHF.</p>
              <h2>Why did we choose the
                name Lykke?</h2>
              <p>Lykke was the surname of Richard\'s
                grandmother on his father\'s side. The
                word means luck and happiness. His
                father explained to them that they are
                Lykke.</p>
              <h2>What is the
                distributed ledger technology?</h2>
              <p>The distributed ledger technology is the
                protocol of decentralized data storage
                in the chain of blocks, where the
                consistency of data is guaranteed by the
                cryptography and consensus of multiple
                nodes. The pioneer and the most popular
                implementation of the DLT is the
                Blockchain of Bitcoin.</p>
              <p>The distributed ledger technology offers
                immediate settlement in a
                non-centralized framework at ultra-low
                costs. This will pave the way for the
                emergence of a global marketplace for
                all asset classes and instruments that
                uses this system.</p>
              <p>The distributed ledger technology
                facilitates step-by-step transactions.
                If contracting parties A and B decide to
                exchange assets X and Y, the transfer
                occurs synchronous and step-by-step; it
                cannot happen that just one side of the
                transaction is executed. The distributed
                ledger technology operates on a global
                scale and is a notary service. The
                technology is highly efficient and
                dramatically reduces risks associated
                with any type of transactions.</p>
              <h2>Why is the distributed
                ledger technology so disruptive?</h2>
              <p>The distributed ledger technology is one
                of the most profound innovations of
                humankind, because contracting parties
                can execute transactions step by step
                independent of location and have direct
                ownership. The step-by-step procedure is
                a safeguard against any misbehavior or
                fraud between transacting parties and
                dramatically reduces the risk associated
                with transactions. Direct ownership
                reduces complexity.</p>
              <p>The distributed ledger technology may be
                used to record ownership of literally
                all types of financial assets. A new
                global marketplace will evolve, where
                all types of assets and instruments will
                be traded. Literally everyone will have
                direct access to this market as is the
                case for the Internet itself. The market
                will be a level playing field, where any
                financial asset can be traded directly
                for any other asset and instrument. The
                operational efficiency of the
                marketplace will foster liquidity. The
                marketplace will be universal and
                ubiquitous, similar to the Internet
                itself, and any asset and instrument
                will be exchangeable into any other
                asset or instrument.</p>
              <h2>Why is direct
                ownership so important?</h2>
              <p>In the history of humankind, step-by-step
                transactions were only possible, when
                individuals had face-to-face contact. A
                shopping experience at the local bakery
                illustrates this point: the buyer points
                to the bread that he wants to buy. The
                shop assistant places the bread on the
                counter and when the customer has put
                the money on the counter, he can take
                the bread and leave. At any time, the
                shop assistant or customer can interrupt
                the process.</p>
              <p>If transactions take place between
                individuals at different locations, a
                step-by-step procedure is not feasible.
                An online shopping experience
                illustrates the issue; the merchant, who
                sells a product online for 50 EUR, can
                book the receipt of a 50 EUR credit card
                payment, but actual settlement of this
                transaction occurs days or weeks later,
                when he receives the money. During this
                period, the merchant is at risk that the
                payment might not occur for any reason.
                Delivery and settlement of financial
                transactions, be they stock purchases,
                buying or selling of currencies or other
                financial assets, suffer from the same
                deficiency. Today, delivery and
                settlement of financial transactions is
                batch-based and occurs with a delay of
                two or more business days. This leads to
                exponential accumulation of risk with
                specific counterparties, who are
                intermediaries and stand in the way of
                direct ownership.</p>
              <h2>How will the financial
                industry change?</h2>
              <p>Today, banks spend massive resources on
                inhouse operations. The adoption of the
                distributed ledger technology will lead
                to massive cost reductions and enable
                banks to focus on their core expertise
                of managing risk.</p>
              <h2>What are colored
                coins?</h2>
              <p>Colored coins issued by banks are money
                market instruments. For example: Bank
                AAA will pay X USD in n days from the
                time point, when the holder of the
                colored coin notifies the bank that he
                is cashing in. Banks will issue colored
                coins for any currency and any maturity.
                Initially, the Lykke marketplace will
                trade so-called spot colored coins that
                can be cashed in according to the terms
                and conditions as a regular foreign
                exchange spot transaction. In the
                medium-term, there will be colored coins
                for any maturity from ultra-short time
                periods of 10 minutes to one hour, 6
                hours and 24 hours to days, weeks and
                months. There will be a market for
                colored coins with different maturities.
                We will have a yield curve that starts
                intraday and extends to months and
                years.</p>
              <h2>What is the difference
                between Colored Coin and Bitcoin?</h2>
              <p>Colored coin protocol (<a
                    class="urlextern"
                    title="http://www.coloredcoins.org"
                    href="http://www.coloredcoins.org/"
                    rel="nofollow">www.coloredcoins.org</a>)
                makes it easy to use the distributed
                ledger technology for any type of
                financial instrument. A financial
                institution can for example buy one
                Bitcoin on the market and then divide
                this one Bitcoin into million
                increments. It can then use each one of
                those increments as a so-called colored
                coin and specify with the colored coin
                protocol the terms and conditions of
                that particular financial instrument.
              </p>
              <p>A colored coin issued by the financial
                institution may represent a share of the
                company itself, or represent any type of
                ‘IOU’, such as the commitment to make a
                payment of X EUR in n days to the holder
                of the colored coin, if so requested.
                The colored coin protocol makes it
                possible to use the distributed ledger
                technology to deliver and settle any
                type of financial transaction of any
                asset within minutes. Colored coins can
                have International Securities
                Identification Numbers (ISINs) to map
                them into the existing back office and
                risk management systems of banks making
                the system compatible with the existing
                financial architecture.</p>
              <p>Issuers of colored coins will buy virtual
                currencies to securitize financial
                assets, but they can use a small
                fraction of a Bitcoin to issue a colored
                coin. One Bitcoin can be sliced into one
                million increments; so in theory a
                colored coin needs to only include ‘1
                millionth of a Bitcoin’ (1 Satoshi); if
                Bitcoins trade at a price of 300 USD per
                Bitcoin, the intrinsic value of the
                virtual currency per colored coin will
                be 0.0003 USD, a negligible amount
                compared to the market value of the
                colored coin. The price volatility of
                Bitcoin will therefore not impact the
                market price of colored coins.</p>
              <iframe class="vshare__none"
                      src="https://www.youtube.com/embed/fmFjmvwPGKU"
                      width="425" height="350"
                      frameborder="0" scrolling="no"
                      allowfullscreen="allowfullscreen"></iframe>
              <h2>How does the Lykke
                marketplace function?</h2>
              <p>The colored coin protocol allows any
                issuer to use a Satoshi (1 millionth of
                Bitcoin) as a piece of paper and specify
                the terms and conditions of the ‘IOU’
                that he intends to issue.</p>
              <p>Bank AAA for example can specify the
                following: holder of this color coin is
                entitled to receive 1 million USD, if he
                hands it over.</p>
              <p>If someone has a bank account with Bank
                AAA, he can request that his assets (1
                million USD) be converted into a Bank’s
                colored coin for 1 million USD. He can
                then use his Bank’s colored coin to buy
                and sell other colored coins of this
                Bank or of other issuers, for that
                matter.</p>
              <p>Settlement with the real world is
                straight forward - the holder of Bank’s
                colored coins of USD converts the
                colored coin into a regular balance of
                USD account at Bank AAA.</p>
              <p>It is obvious that such a system only
                works well, if the marketplace offers
                efficient price discovery. Lykke plans
                to implement a new type of matching
                engine (price, time and spread queuing),
                which is more efficient than the
                traditional approach (only price and
                time queuing) in preventing price
                spikes.</p>
              <p>See <a class="wikilink1"
                        title="price-spread-time_priority_white_paper"
                        href="/price_spread_time_priority_white_paper">Price-Spread-Time
                  priority White Paper</a>.</p>
              <p><a class="media"
                    title="playground:lykkearchitecture.png"
                    href="/userfiles/image/lykkearchitecture.png"><img
                      class="mediacenter img-responsive"
                      src="/userfiles/image/lykkearchitecture.png"
                      alt="" width="1089"
                      height="495"></a></p>
              <h2>How is the Lykke
                development process organized?</h2>
              <p>Lykke is crowd-based. Design competitions
                are announced and the winner leads the
                scrum process of the actual development
                with developers that are sourced among
                the participants of the competition and
                also other places.</p>
              <h2>How to use Lykke Wiki
                Engine?</h2>
              <p>See Welcome to Lykke Wiki.</p>
              <h2>What is the bitcoin
                Refund Transaction?</h2>
              <p>Refund transaction guarantees refunding
                Bitcoins in case of emergency or loosing
                private keys. Refund transaction can be
                broadcasted after specified refund
                delay. <a class="wikilink1"
                          title="faq:refundtransaction"
                          href="/refund_transactions">Read
                  more</a></p>
              <h2>What means
                semi-centrlized exchange</h2>
              <p>Lykke is a semi-centralized exchange.
                This means that the exchange does not
                take possession of the traded coins, but
                needs to be trusted to match trades
                correctly. Lykke has a centralized
                matching engine and decentralized coins
                settlement. Matched trades are settled
                on a blockchain in atomic way. Each
                atomic transaction must be signed both
                by parites and exchange. Still to be
                able to trade, one should deposit his
                coins into Lykke exchange. Depositing
                coins is not equal to trusting coins.
                How can it be? Lykke uses
                multisignatures mechanism to hold
                client\'s funds. Lykke can not spend
                coins without client\'s private key. Even
                if the exchange is compromised and the
                Lykke\'s key is stolen, the client will
                not lose his coins. The second key is
                required to spend deposited coins. Lykke
                exchange also provides refund mechanism
                to guarantee funds recovery in case of
                emergency.</p>
        ';
        $block2->save();

    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'city/faq'
        ]);
        $blocks = ContentBlock::findAll([
            'pageId' => $page->id
        ]);

        foreach ($blocks as $block){
            $block->delete();
        }
        return;
    }
}
