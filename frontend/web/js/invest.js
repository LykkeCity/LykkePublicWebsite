/**
 * Created by user on 28.04.2017.
 */

$(document).ready(function() {
    var totalValue = $('#invest_total__value-api').text().replace(/,/g,"");

    var privateWallets = $('#invest_private-wallets__value-api').text().replace(/,/g,"");
    var privateWalletsPercent = (parseInt(privateWallets, 10) * 100) / parseInt(totalValue, 10);

    var tradingWallets = $('#invest_trading-wallets__value-api').text().replace(/,/g,"");
    var tradingWalletsPercent = (parseInt(tradingWallets, 10) * 100) / parseInt(totalValue, 10);

    var treasuryCoins = $('#invest_treasury-coins__value-api').text().replace(/,/g,"");
    var treasuryCoinsPercent = (parseInt(treasuryCoins, 10) * 100) / parseInt(totalValue, 10);

    $('#invest_private-wallets__value-percent').text(privateWalletsPercent.toFixed(1));
    $('#invest_trading-wallets__value-percent').text(tradingWalletsPercent.toFixed(1));
    $('#invest_treasury-coins__value-percent').text(treasuryCoinsPercent.toFixed(1));

    $('#invest_private-wallets__line').attr('style', 'width:'+privateWalletsPercent+'%');
    $('#invest_trading-wallets__line').attr('style', 'width:'+tradingWalletsPercent+'%');
    $('#invest_treasury-coins__line').attr('style', 'width:'+treasuryCoinsPercent+'%');
});