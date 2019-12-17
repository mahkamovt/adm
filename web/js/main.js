$('.groupblock').each(function() {
    $(this).children('div').eq(numberBlock).css('display', 'block');
});


function sluchay() {
    let MyRND = Math.random() * 2;
    MyRND = Math.round(MyRND);
    return MyRND;

}



/*Реализация корзины*/

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();

}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });

    return false;
}

$('#cart .modal-body').on('click', '.delete-item', function() {
    var id = $(this).data('id');

    $.ajax({
        url: '/cart/delete-item',
        data: {
            id: id
        },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка!');
            console.log(res);
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });
});


function clearCart() {

    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });

};




$('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var qty = $('#qty').val();
    var size = $('#size').val();
    $.ajax({
        url: '/cart/add',
        data: {
            id: id,
            //qty: qty,
            size: size
        },
        type: 'GET',
        success: function(res) {
            if (!res) alert('Ошибка!');
            console.log(res);
            showCart(res);
        },
        error: function() {
            alert('Error!');
        }
    });
});


/*конец*/



/*Зум главного изображения карточки товара*/

$('#adm-img').zoom({
    on: 'click'
});

/*конец*/


$('.catalog').dcAccordion({});
var RGBChange = function() {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function() {

    /*Мобильная навигация слайдеров*/

    $("#slider-carousel").on("touchstart", function(event) {
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function(event) {
            var xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > 5) {
                $(this).carousel('next');
            } else if (Math.floor(xClick - xMove) < -5) {
                $(this).carousel('prev');
            }
        });
        $("#slider-carousel").on("touchend", function() {
            $(this).off("touchmove");
        });
    });



    /*конец*/

    /*галерея карточки товаров*/

    $('.mega-gallery > a').click(function() {
        img = $(this).find('img').attr('src');
        img = img.replace(/_84x85/, '');
        $('.view-product > img').animate({
            opacity: 0
        }, 500).attr('src', img).animate({
            opacity: 1
        }, 500);
        return false;
    });

    /*конец*/

});



$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

$("img.lazy").lazyload({
    effect: "fadeIn"
});


/*Реализация кнопки показать еще*/

//Для главной страницы
$(function() {
    $("#loadmore").data('page', 1);
    $("div.product_item").slice(0, 2).show();
    $("#loadmore").on('click', function(e) {
        let step = 2;
        let sum = $("div.product_item").length;
        let n = Math.floor(sum / step);
        let pageNum = $(this).data('page')
        $("#loadmore").prev().find(".product_item:hidden").slice(0, step).slideDown();
        pageNum++;
        $(this).data('page', pageNum);
        if (n < pageNum) {
            $(this).hide();
        }
        return false;
    });

})

//Для страницы /category/stock
$(function() {
    $("#loadmore_stoke").data('page', 1);
    $("div.product_stoke_item").slice(0, 3).show();
    $("#loadmore_stoke").on('click', function(e) {
        let step = 3;
        let sum = $("div.product_stoke_item").length;
        let n = Math.floor(sum / step);
        let pageNum = $(this).data('page')
        $("#loadmore_stoke").prev().find(".product_stoke_item:hidden").slice(0, step).slideDown();
        pageNum++;
        $(this).data('page', pageNum);
        if (n <= pageNum) {
            $(this).hide();
        }
        return false;
    });

})