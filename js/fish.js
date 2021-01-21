var btnGroup = document.querySelectorAll(".btn-group .btn");

for(let i = 0; i < btnGroup.length; i++) {
    btnGroup.item(i).addEventListener("click", function() {
        for(let j = 0; j < btnGroup.length; j++) {
            btnGroup.item(j).classList.remove("active");
        }
        this.classList.add("active");
    });
}

var catalogDB = (function($) {
 
    var ui = {
        $prices: $('#prices'),
        $pricesLabel: $('#prices-label'),
        $minPrice: $('#min-price'),
        $maxPrice: $('#max-price')
    };
 
    // Инициализация модуля

    _initPrices({
        minPrice: Number($("#min-price").val()),
        maxPrice: Number($("#max-price").val())
    });

 
    // Изменение диапазона цен
    function _onSlidePrices(event, elem) {
        var minPrice = elem.values[0],
            maxPrice = elem.values[1];
        ui.$pricesLabel.html(minPrice + ' - ' + maxPrice + ' руб.');
        ui.$minPrice.val(minPrice);
        ui.$maxPrice.val(maxPrice);
    }
 
    // Инициализация цен с помощью jqueryUI
    function _initPrices(options) {
        ui.$prices.slider({
            range: true,
            min: options.minPrice,
            max: options.maxPrice,
            values: [options.minPrice, options.maxPrice],
            slide: _onSlidePrices
        });
    }
})(jQuery);