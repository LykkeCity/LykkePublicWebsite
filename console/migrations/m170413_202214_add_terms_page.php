<?php
use common\models\ContentBlock;
use common\models\SitePages;
use yii\db\Migration;

class m170413_202214_add_terms_page extends Migration {

    public function safeUp() {
        $page = SitePages::findOne([
            'url' => 'terms_of_issuance'
        ]);

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Lykke Exchange';
        $block1->content = 'A Global Marketplace on the Blockchain';
        $block1->save();

        $block1 = new ContentBlock();
        $block1->pageId = $page->id;
        $block1->ordering = 1;
        $block1->name = 'Main';
        $block1->title = 'Terms and Conditions of Lykke FX Colored Coins Issuance';
        $block1->content = '31 DECEMBER 2016';
        $block1->save();

        $block2 = new ContentBlock();
        $block2->pageId = $page->id;
        $block2->ordering = 2;
        $block2->name = 'BACKGROUND INFORMATION';
        $block2->title = 'BACKGROUND INFORMATION';
        $block2->content = '<p>The Terms and Conditions governs the issuance of
                            certificates of IOUs (referred as "colored coins")
                            by Lykke Corp UK Ltd., full subsidiary of Lykke Corp
                            (referred as "Lykke").</p>
                        <p>Lykke is a FinTech company building a global
                            marketplace with settlement on the blockchain using
                            colored coins technology.</p>
                        <h4>TECHNOLOGICAL NATURE</h4>
                        <p>Lykke is using distributed ledger technology
                            (referred as "blockchain" or "distributed ledger")
                            for providing the services, including issuance,
                            transfers and exchange of colored coins. The
                            services are based on the Open Assets protocol. Open
                            Assets is a colored coin implementation based on the
                            OP_RETURN operator. Metadata is linked from the
                            blockchain and stored on the web. See <a
                                href="http://www.openassets.org/">www.openassets.org</a>.
                        </p>
                        <p>For communication with the distributed ledger, client
                            application has been created for mobile iOS and
                            Android operating system. To own and exchange
                            colored coins the Lykke Wallet mobile app needs to
                            be downloaded and installed.</p>
                        <p>This document might not contain the entire
                            information considered important by the interested
                            parties. Since the blockchain technology is
                            relatively new, Lykke will start testing the new
                            colored coins issue carefully, on a limited scale
                            and by using a design that serves to minimise
                            risks.</p>
                        <h4>LEGAL FRAMEWORK</h4>
                        <p>The precondition for the purchase and redemption of
                            the colored coins is a customer relationship with
                            Lykke. In the establishment of the relationship,
                            Lykke thus adheres, among other things, to the
                            obligations arising from the Money Laundering and
                            Terrorist Financing Prevention Act.</p>
                        <h4>BASIC CONDITIONS FOR THE ISSUANCE</h4>
                        <p>The colored coins shall be freely transferable and
                            exchangeable, subject to the limitations arising
                            from the legal acts of EU and other countries. The
                            issue of the colored coins shall not be registered
                            under the legal acts any other country. The colored
                            coins may not thus be sold or offered for sale in
                            any country, where a previous registration or other
                            formalities are required for the purpose.</p>
                        <p>Any payments to be made by Lykke and the holder of
                            the colored coin in connection with the colored
                            coins shall be made in bitcoins.</p>
                        <h4>ASSET DEFINITION</h4>
                        <p>Colored coins are digital financial securities that
                            specify the obligations of Lykke. A holder of a
                            colored coin has the right to return the colored
                            coin to Lykke and request fulfilment of the
                            obligation (IOU) as specified by the colored
                            coin.</p>
                        <p>FX colored coins issued by Lykke represents the IOU
                            to request a transfer of respective amount in
                            settlement currency. Holder of the colored coin is
                            entitled to receive assets as specified in Appendix
                            A.</p>
                        <p>All FX colored coins trades are placed on Lykke
                            Exchange. Lykke organizes spot exchange to other
                            colored coins traded. No remittance services are
                            possible. Asset specification is provided in
                            Appendix A.</p>
                        <p>Example of a colored coin: 1 Lykke USD colored coin:
                            commitment to pay 1 USD within three business
                            days.</p>
                        <p>The time period for the payment begins with the
                            remittance of the coin to Lykke and the request for
                            delivery.</p>
                        <p>Payment is made to the account of the holder.</p>
                        <h4>ACQUISITION AND REDEMPTION</h4>
                        <p>To acquire a colored coin, customer needs to use
                            Lykke Exchange accessible of the Lykke Wallet mobile
                            application.</p>
                        <p>The value of the colored coins is defined by the
                            reference market prices.</p>
                        <p>Colored coins may be acquired during the entire
                            period of the Terms.</p>
                        <p>Lykke has the right to decide on the cancellation of
                            the issue or reduction of the volume of the
                            issue.</p>
                        <p>Colored coins may only be redeemed by customers of
                            Lykke.</p>
                        <p>The redemption payment per colored coin shall be the
                            nominal value of the colored coin.</p>
                        <p>Lykke has the right to redeem colored coins at an
                            earlier date.</p>
                        <p>Lykke shall make the redemption payment to the person
                            who has sought redemption of the colored coin in
                            Lykke during the term of redemption.</p>
                        <p>The last redemption date of the colored coins is 1
                            January 2019.</p>
                        <h4>FINAL PROVISIONS</h4>
                        <p>Lykke shall be liable for breach of an obligation
                            arising from the conditions of issue only if the
                            breach is deliberate or attributable to gross
                            negligence.</p>
                        <p>The colored coins and any rights and obligations
                            thereof shall be governed by the English Common
                            Law.</p>';
        $block2->save();

    }

    public function safeDown() {
        $page = SitePages::findOne([
            'url' => 'terms_of_issuance'
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
