var app = app || {};

app.init = function () {
    if (typeof page === 'undefined') {
        return;
    }

    switch (page.name) {
        case 'advanced-chart':
            app.page = new AdvancedChartPage(page.options);
            break;
        case 'assets':
            app.page = new AssetsPage(page.options);
            break;
        default:
            break;
    }

    app.page.init();
};

app.init();