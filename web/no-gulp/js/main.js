
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
	$(function() {
		$.scrollUp({
			scrollName: 'scrollUp', // Element ID
			scrollDistance: 300, // Distance from top/bottom before showing element (px)
			scrollFrom: 'top', // 'top' or 'bottom'
			scrollSpeed: 300, // Speed back to top (ms)
			easingType: 'linear', // Scroll to top easing (see http://easings.net/)
			animation: 'fade', // Fade, slide, none
			animationSpeed: 200, // Animation in speed (ms)
			scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
			//scrollTarget: false, // Set a custom target element for scrolling to the top
			scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
			scrollTitle: false, // Set a custom <a> title if required.
			scrollImg: false, // Set true to use image
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	/*галерея карточки товаров*/




	$('.mega-gallery > a').click(function() {
	img = $(this).find('img').attr('src');
	img = img.replace(/_84x85/, '');
	$('.view-product > img').animate({opacity: 0}, 500).attr('src', img).animate({opacity: 1}, 500);
		return false;
	});

	/*конец*/

});



$(function() {
	$('[data-toggle="tooltip"]').tooltip()
});

$("img.lazy").lazyload({
    effect : "fadeIn"
});




/*$("ul.nav.navbar-nav.collapse.navbar-collapse.top_menu_category > li > a").mouseover(function(){
	//$("ul.sub-category-top-menu").css("display","block");
	$(this).parent().find("ul.sub-category-top-menu").css("display","block");
});

$("ul.nav.navbar-nav.collapse.navbar-collapse.top_menu_category > li > a").mouseout(function(){
	$("ul.sub-category-top-menu").css("display","none");
});
*/


$(document).ready(function(){

  $('ul.nav.navbar-nav.collapse.navbar-collapse.top_menu_category > li').hover(function () {
  	 $('div.dark-background-menu').css("display","block").animate({opacity: 0.45}, 500);
     clearTimeout($.data(this,'timer'));
     $('div.sub-category-top-menu-background > ul.sub-category-top-menu',this).stop(true,true).show();

  }, function () {
    $.data(this,'timer', setTimeout($.proxy(function() {
      $('div.sub-category-top-menu-background > ul.sub-category-top-menu',this).stop(true,true).hide();
    }, this), 100));
    $('div.dark-background-menu').css("display","none");
  });

   $('div.dark-background-menu').on('mouseover',function(){
    $('div.sub-category-top-menu-background > ul.sub-category-top-menu').slideUp();
    $('div.dark-background-menu').css("display","none");
   })

});



