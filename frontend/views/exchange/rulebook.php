<?php
use frontend\widgets\Footer;

?>

<article class="content page">
    <section class="section--padding ">
        <div class="container">
            <div class="row">

                <div class="col-sm-8 automargin">
                    <div class="text">
                        <div class="inline-edit" data-page-id="3">
                            <div class="clearfix">
                                <a href="/media/lykkex.rulebook.pdf" target="_blank" class="btn btn--stroke pull-right">PDF Version</a>
                                <h1 class="h1">LykkeX Rulebook</h1>
                            </div>

                            <p><i>31 MARCH 2016</i></p>

                            <h3>Definitions</h3>
                            <p>The official definitions are in the LykkeX Rules.</p>
                            <p><b>Automatic Order Matching</b> The process in the order book whereby sell and buy orders are matched automatically when price, volume and other specifications for a given order correspond with order(s) previously entered in the order book.</p>
                            <p><b>BBO</b> Best Bid Offer of an order book.</p>
                            <p><b>Limit Order</b> A Limit order stipulates a maximum purchase price or minimum selling price.</p>
                            <p><b>Market Order</b>  A market order is an order to sell or buy an instrument at the current market price.</p>
                            <p><b>Round Lot</b> The minimum volume for an instrument which is used for certain statistics and calculations.</p>
                            <p><b>Trading Hours</b> Trading Hours for each market segment are found in Chapter 3 and Appendix 1 of this document. Trading Hours start from the Uncross of the opening call and end at the transition to the Terminating session.</p>
                            <p><b>Uncross</b> A call ends with an Uncross where price determination and share allocation together with order and trade information dissemination take place. Uncross lasts a short time, usually a fraction of a second.</p>

                            <h3>Overview</h3>
                            <p>This document describes the functionalities for trading on LykkeX: the market structure, instrument types traded, trading methods, the registration of OTC-trades, order types and order functionality (insertion, modification and deletion). Finally, in the appendices you can find descriptions of calls, matches, price concepts, trading schedules, etc.</p>
                            <p>While the document has been prepared on the basis of the best information available, the exchange accepts no liability for decisions taken, or systems work carried out by any party, based on this document. This document does not form part of the contractual documentation between the individual exchange and its customers. The content of this document may also be subject to discussions and in some cases approval from relevant authorities.</p>
                            <p>Additional documents referenced in this documentation can be found on the official webpages of LykkeX.</p>

                            <h3>Market participants</h3>
                            <p>Market participants on LykkeX are members, issuers, exchanges, and non-members reporting trades for publication. Each participant takes part in the trading activity with one or several unique participant identification codes. Users are connected to each participant.</p>
                            <p>LykkeX grants access to participants to trading on certain markets and products. LykkeX personnel manage information relating to participants and their users’ access. Access to trading certain products or order books is granted on the participant level.</p>
                            <h3>Trading hours</h3>
                            <p>LykkeX is open for trading 24/7 - every day of the year.</p>
                            <p>The opening hours are no assurance of liquidity; market liquidity depend on the time of the day and week and on public holidays.</p>
                            <h4>Suspension of Trading (Trading Halts)</h4>
                            <p>Trading may be suspended by the Lykkex either for technical reasons or for regulatory reasons. Technical suspension means that trading is suspended when the order book(s) becomes inaccessible for technical reasons. In this case a trading halt will be imposed. Regulatory suspension means that the order book(s) is suspended due to rules and regulations. In this case, a trading halt will be also imposed. The exchange shall provide its members with information on trading halts via suitably accessible information technology. In practice this means that LykkeX publishes a system message and/or an exchange notice.</p>

                            <h3>Trading methods</h3>
                            <p>LykkeX market allows buy/sell operations only. Upon matching buying asset passes into the ownership of the trader and, at the same time, sell asset passes into the ownership of the counterparty.</p>
                            <p>Selling assets that are not in the possession of the trader is currently restricted.</p>

                            <h3>Orders</h3>
                            <h4>Lot Types</h4>
                            <p>Minimum Lot Size are the following:</p>

                            <table class="inline table table--simple table-striped">
                                <tbody><tr class="row0">
                                    <td class="col0"> Asset </td><td class="col1"> Minimum Lot Size </td>
                                </tr>
                                <tr class="row1">
                                    <td class="col0"> USD </td><td class="col1"> USD 0.01 </td>
                                </tr>
                                <tr class="row2">
                                    <td class="col0"> EUR </td><td class="col1"> EUR 0.01 </td>
                                </tr>
                                <tr class="row3">
                                    <td class="col0"> GBP </td><td class="col1"> GBP 0.01 </td>
                                </tr>
                                <tr class="row4">
                                    <td class="col0"> CHF </td><td class="col1"> CHF 0.01 </td>
                                </tr>
                                <tr class="row5">
                                    <td class="col0"> JPY </td><td class="col1"> JPY 0.01 </td>
                                </tr>
                                <tr class="row6">
                                    <td class="col0"> BTC </td><td class="col1"> BTC 0.00000001 </td>
                                </tr>
                                <tr class="row7">
                                    <td class="col0"> Lykke Shares </td><td class="col1"> 1 Coin </td>
                                </tr>
                                </tbody></table>

                            <h4>Order Types</h4>
                            <h5>Limit order</h5>
                            <p>A limit order stipulates a maximum purchase price or minimum selling price. If not fully matched, the remainder of the order is stored in the order book in descending buy-price order or ascending sell-price order and joins the queue of orders having the same price according to time priority. If the price specified by a limit price is not valid according to the allowed tick sizes, it will be rejected. It will only execute at prices equal to or more generous than its specified limit price. Limit orders can be matched in part or in its entirety.</p>

                            <h5>Market order</h5>
                            <p>A market order is an order to sell or buy at the best available price and is therefore entered without a price. During continuous trading the time in force for a market order is always fill-or-kill (the order is matched in full or not at all). The order is never registered in the order book. Note that a market order will trade through the order book until the entire quantity is filled. This means that as long as there is an order on the opposite side of the order book there will be a match no matter the price level.</p>

                            <h4>Time in Force</h4>
                            <p>LykkeX supports GTC (Good till Cancelled) orders in markets that have no specified limit to the maximum number of days an order is allowed to stay in the book. In fact, GTC is the only order type allowed.</p>

                            <h3>Order Modification</h3>
                            <p>All the changes such as increase or decrease of the quantity or change of the price are equivalent to the cancellation of the order and the placing of a new order with a new ranking timestamp.</p>

                            <h3>Ranking of Orders</h3>
                            <p>The main rule for ranking of orders is based firstly upon best price/net price and secondly by the longest storage time.</p>

                            <h3>Tick Sizes</h3>
                            <p>Tick size is the smallest allowed price movement and, thereby, is the smallest possible difference between the buy and sell price in an order book.</p>            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</article>

<?=Footer::widget();?>
