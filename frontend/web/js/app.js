var app = app || {
    page: {}
};

app.init = function () {
    if (typeof page === 'undefined') {
        return;
    }

    switch (page) {
        case 'advanced-chart':
            app.page = new AdvancedChartPage();
            break;
        case 'assets':
            app.page = new AssetsPage();
            break;
        default:
            break;
    }

    // all the pages should implement init method
    app.page.init();
};

app.init();