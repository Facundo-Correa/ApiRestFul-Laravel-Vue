var smoothScrolling = function(opt) {
    if (!opt.url) opt.url = '/';
    if (!opt.urlMaxLenght) opt.urlMaxLenght = 20;
    if (!opt.offset) opt.offset = 60;
    if (opt.selector) {
        opt.url.forEach(function (a) {
            if (window.location.pathname == a) {
                opt.selector.click(function (e) {
                    if ($(this).attr('href').length < 20) {
                        e.preventDefault();
                        $('html,body').animate({scrollTop: $($(this).attr('href')).offset().top - opt.offset},'slow');
                    }
                });
            }

        })
    } else {
        console.log('## fma.smoothScrolling ## selector is not defined!')
    }
};