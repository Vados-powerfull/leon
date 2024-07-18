function getClientHeight() {
	return document.documentElement.clientHeight;
}
function getClientWidth() {
	return document.documentElement.clientWidth;
}

$(document).ready(function () {
	var cl_wi = getClientWidth();
	var navbar = $(".page-navbar");
	var offset = navbar.length > 0 ? navbar.offset().top : 0;
	
	$(".popup-open-btn").click(function() {
  
	  $(".popup-wrapper").addClass("active");
	});
	$(".popup-close-img").click(function() {
	  $(".popup-wrapper").removeClass("active");
	});
	$(window).scroll(function () {
		if ($(window).scrollTop() + 100 >= offset) {
			
			navbar.addClass("fixed-top");
		} else {
			navbar.removeClass("fixed-top");
		}
	});
	if ($('.fancybox').length > 0) {
        // Если элементы присутствуют, активируем Fancybox
        $(".fancybox").fancybox();
      } 	
	// $('.navbar-item').on('click', function (e) {
	// 	e.preventDefault();
	// 	var targetId = $(this).data('scroll-to');
	// 	console.log(targetId);
	// 	console.log($(this));
	// 	$('html, body').animate({
	// 		scrollTop: $('#' + targetId).offset().top
	// 	}, 800);
	// });

	// $(".owl-reviews").owlCarousel({
	// 	responsive: {
	// 		0: { items: 1 },
	// 		575: { items: 2 },
	// 		768: { items: 2 },
	// 		992: { items: 2 },
	// 		1200: { items: 2 },
	// 	},
	// 	loop: true,
	// 	autoplay: true,
	// 	margin: 20,
	// 	autoplayTimeout: 5000,
	// 	autoplayHoverPause: false,
	// 	smartSpeed: 1000,
	// 	navText: [
	// 		'<div class="reviews_arr r_arr_l"><img src="/public/img/arr_left.svg" alt=""></div>',
	// 		'<div class="reviews_arr r_arr_r"><img src="/public/img/arrow.svg" alt=""></div>',
	// 	],
	// 	animateIn: "fadeInRight",
	// 	animateOut: "fadeOutRight",
	// 	nav: true,
	// 	dots: false,
	// });

	// $(".mmenu_btn").click(function () {
	// 	if ($(".mmenu").css("display") == "none") {
	// 		$(".mmenu").slideToggle(300);
	// 		$(this).children("img").attr("src", "/public/img/exit.svg");
	// 	} else {
	// 		$(".mmenu").slideToggle(500);
	// 		$(this).children("img").attr("src", "/public/img/burger.png");
	// 	}
	// });

	// $(".mmenu_href").click(function () {
	// 	$(".mmenu_sub").slideToggle(300);
	// });

	// $(".select").on("click", ".select__head", function () {
	// 	if ($(this).hasClass("open")) {
	// 		$(this).removeClass("open");
	// 		$(this).next().fadeOut();
	// 	} else {
	// 		$(".select__head").removeClass("open");
	// 		$(".select__list").fadeOut();
	// 		$(this).addClass("open");
	// 		$(this).next().fadeIn();
	// 	}
	// });

	// $(".modal-call").click(function () {
	// 	//$( '#'+$(this).data( 'target' ) ).removeClass('hidden');
	// 	$("#" + $(this).data("target")).fadeIn(200);
	// 	return false;
	// });

	// $(".modal-close").click(function () {
	// 	//$(this).parent().parent().addClass('hidden');
	// 	$(this).parent().parent().fadeOut(200);
	// });

	// $(".select").on("click", ".select__item", function () {
	// 	$(".select__head").removeClass("open");
	// 	$(this).parent().fadeOut();
	// 	$(this).parent().prev().html($(this).html());
	// 	$(this).parent().prev().prev().val($(this).html());
	// });

	// $(document).click(function (e) {
	// 	if (!$(e.target).closest(".select").length) {
	// 		$(".select__head").removeClass("open");
	// 		$(".select__list").fadeOut();
	// 	}
	// });

	// $("a[href^='#']").click(function () {
	// 	var _href = $(this).attr("href");
	// 	_href = _href.replace("/", "");
	// 	$("html, body").animate({ scrollTop: $(_href).offset().top - 100 });
	// 	return false;
	// });

	// $("a[href^='/#']").click(function () {
	// 	var _href = $(this).attr("href");
	// 	_href = _href.replace("/", "");
	// 	$("html, body").animate({ scrollTop: $(_href).offset().top - 100 });
	// 	return false;
	// });

	//  $(window).scroll(function(){
	//      if($(this).scrollTop() > 1000){
	//          $(".dop_menu").addClass('dop_menu_fixed');
	         
	//      }
	//      else{
	//          $(".dop_menu").removeClass('dop_menu_fixed');
	//      }

	    
	//  });
	

	// $("#dropdownIcon").click(function() {
	//     // Переключаем отображение выпадающего контента
	//     $(".dropdown-content").toggle();

	//     // Переключаем иконку между стрелкой вверх и вниз
	//     var iconSrc = $("#dropdownIcon img").attr("src");
	//     if (iconSrc === "img/svg/arrow-down.svg") {
	//       $("#dropdownIcon img").attr("src", "img/svg/arrow-up.svg");
	//     } else {
	//       $("#dropdownIcon img").attr("src", "img/svg/arrow-down.svg");
	//     }
	//   });

	// $(".collapsible").click(function () {
	// 	$(this).toggleClass("active");
    // })
	// $(".collapsible-button").click(function() {
	// 	var collapsibleContent = $(".collapsible-content");
	// 	if (collapsibleContent.css("max-height") !== "0px") {
	// 	  collapsibleContent.css("max-height", "0");
	// 	} else {
	// 	  collapsibleContent.css("max-height", collapsibleContent.prop("scrollHeight") + "px");
	// 	}
	//   });



	// Баскет отправляет форму вне формы
	$('#submitForm').click(function() {
		_self = $('#form_basket');
		$.post('/public/forms/basket.php', _self.serializeArray(), function(data){
				$("body").append(data);
				_self.trigger('reset');
				my_target('basket');
		});
	})

	$("#slider-range").slider({
        range: true,
        min: Number($("#start-amount").attr("data-min")),
        max: Number($("#end-amount").attr("data-max")),
        values: [Number($("#start-amount").attr("data-min")), Number($("#end-amount").attr("data-max"))],
        slide: function (event, ui) {
            $("#start-amount").val(ui.values[0]);
            $("#end-amount").val(ui.values[1]);
        },  
      });
      
      $("#start-amount").val($("#slider-range").slider("values", 0));
      $("#end-amount").val($("#slider-range").slider("values", 1));
      
      $("#start-amount, #end-amount").on("input", function() {
          var startValue = parseInt($("#start-amount").val());
          var endValue = parseInt($("#end-amount").val());
          $("#slider-range").slider("values", 0, startValue);
          $("#slider-range").slider("values", 1, endValue);
      });




	  $("#slider-range-popup").slider({
        range: true,
        min: 0,
        max: 1000,
        values: [0, 250],
        slide: function (event, ui) {
            $("#start-amount-popup").val(ui.values[0]);
            $("#end-amount-popup").val(ui.values[1]);
        },  
      });
      
      $("#start-amount-popup").val($("#slider-range-popup").slider("values", 0));
      $("#end-amount-popup").val($("#slider-range-popup").slider("values", 1));
      
      $("#start-amount-popup, #end-amount-popup").on("input", function() {
          var startValuepopup = parseInt($("#start-amount-popup").val());
          var endValuepopup = parseInt($("#end-amount-popup").val());
          $("#slider-range-popup").slider("values", 0, startValuepopup);
          $("#slider-range-popup").slider("values", 1, endValuepopup);
      });
  
	  // Обработчик формы нажатия на кнопки + и -
		// Обработка нажатия на кнопку "-"
	$('.choose-amount button:contains("-")').click(function(){
		var counter = $(this).find('.current-amout');
		var count = parseInt(counter.text()) - 1;
		count = count < 0 ? 0 : count; // Предотвратить отрицательное значение
		counter.text(count);
	  });
	  
	  // Обработка нажатия на кнопку "+"
	  $('.choose-amount button:contains("+")').click(function(){
		var counter = $(this).find('.current-amout');
		var count = parseInt(counter.text()) + 1;
		counter.text(count);
	  });


	$(".collapsible").click(function() {
	
		var content = $(this).find(".content");
		var image = $(this).find(".dropdown-image");
  
		// Toggle the max-height of the content
		content.toggleClass("open");
		content.css("max-height", content.hasClass("open") ? content.prop("scrollHeight") + "px" : "0");
  
		// Toggle the rotation of the image
		image.toggleClass("open");
	  });
	
	  $('.modal-menu-close-btn').on('click', function() {
		// Найти элемент с классом modal-menu-open и удалить у него класс modal-menu-open
		$('.modal-menu-open').removeClass('modal-menu-open');
	  });
	  $('.header-phone-navigation__btn').on('click', function() {
		// Найти элемент с классом modal-menu-open и удалить у него класс modal-menu-open
		$('.modal-menu__wrapper').addClass('modal-menu-open');
	  });
  

	$(".totop").click(function () {
		$("html, body").animate({ scrollTop: 0 }, 300);
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 200) {
			$(".totop").removeClass("hidden");
		} else {
			$(".totop").addClass("hidden");
		}
	});

	$("input[type=tel]").mask("+7 (999) 999 99 99");

	$(".search-input-desk1").keyup(function(){
		val = $(this).val();
		if (val.length > 3){
			$(".search_res").fadeIn(300)
			$.post('/public/forms/search.php', {query:val}, function(data){
				$(".search_res").html(data);
				my_target('search');
	
			});
		} else {
			$(".search_res").fadeOut(300)
			$(".search_res").html('');
		}
	})

	// ПЕРЕЕХАЛО ИЗ АГРОЗА

	// Загрузка счетчика из sessionStorage при инициализации
	if (sessionStorage.getItem("favoritesCount")) {
		$("#favorites-count").text(sessionStorage.getItem("favoritesCount"));
	}


	if ($(".add_to_favorites").length > 0) {
		id = $(".add_to_favorites").attr("data-id");
		mcookie = getCookie("favorites");
		if (mcookie != undefined && mcookie.includes(id+",")) $(".add_to_favorites").css("color","#EE9D01")
	}

	fav_count();
	$(".add_to_favorites").click(function() {
		id = $(this).attr("data-id"); 
		if (checkCookieExists("favorites") == false) 
		{	
			addCookie("favorites", id+",");
			$(this).css("color","#EE9D01")
		}
		else {
			mcookie = getCookie("favorites");
			if (mcookie.includes(id+",") == false)
			{
				addCookie("favorites", mcookie+id+",");
				$(this).css("color","#EE9D01")
			}
			else { 
				mcookie = mcookie.replace(id+",", '');
				addCookie("favorites", mcookie);
				$(this).css("color","lightgrey")
			}
		}
		fav_count();
	});
	$(".del_from_fav").click( function(){
		id = $(this).attr("data-id");
		mcookie = getCookie("favorites");
		mcookie = mcookie.replace(id+",", '');
		addCookie("favorites", mcookie);
		location.reload();
	})


	// document.addEventListener("DOMContentLoaded", function() {
	// 	const element = document.querySelector(".question-text");
	// 	if (element) {
	// 	  element.classList.add("text-active");
	// 	}
	//   });

	
	$(".filtr_btn").click(function(){
		curl = $(".filtr_btn_reset").attr('data-url');
    	
    	price1 = $("#start-amount").val()
    	price2 = $("#end-amount").val()
    	murl = '?price1='+price1+'&price2='+price2;

    	$('.filtr_nav').find('input:checkbox').each(function(){
		    if ($(this).is(':checked')){
		    	if (murl.includes($(this).attr("name"))) murl = murl + ',' + $(this).attr("data-value");
				else murl = murl + '&' + $(this).attr("name") + '=' + $(this).attr("data-value");
			}
		});
    	window.location.replace(murl);
		//submit(curl, {  murl: murl  });
	})

    $(".filtr_btn_reset").click(function(){
    	curl = $(this).attr('data-url');
    	window.location.replace(curl);
    })
});

	

cart_count();
$(".add_to_cart, .buy-btn").click(function() {
	id = $(this).attr("data-id");
	
	if (checkCookieExists("cart") == false) 
	{	
		addCookie("cart", id+",");
		 alert('Товар добавлен в корзину')    //                       						
	}
	else {
		mcookie = getCookie("cart");
		if (mcookie != undefined && mcookie.includes(id+",") == false)
		{
			addCookie("cart", mcookie+id+",");
			alert('Товар добавлен в корзину')
		}
		else { 
			alert('Товар добавлен в корзину')
		}
	}
	cart_count();
});
$(".del_from_cart").click( function(){
	id = $(this).attr("data-id");
	mcookie = getCookie("cart");
	mcookie = mcookie.replace(id+",", '');
	addCookie("cart", mcookie);
	location.reload();
})

$(".del_from_cart-m").click( function(){
    addCookie("cart", "");
    location.reload();
})



$(".make-order-d").click( function(){
	var goods = '';
	$(".order-content-wrapper-d").find(".order-item").each(function(){
		gname = $(this).find(".item-name").text();
		price = $(this).find(".item-price").text();
		amount = $(this).find(".current-amout").text();
		itemimg = $(this).find(".item-img").attr("src");

		goods += `
			<div class="order-item">
			<div class="order-img__container">
				<img class="item-img" src="${itemimg}" alt="" />
			</div>
			<p class="item-name">
				${gname}
			</p>
			<div class="item-total">
				<span class="item-price">${price}</span>
				<span class="item-amount">${amount} шт</span>
			</div>
			</div>
	  		`;
		
	})

	phone = $("#basket-tel").val();
	adress = $("#basket-address").val();
	comment = $("#basket-connet").val();
	ves = $(".order-ves").text();
	summ = $(".total-amount").text();
	gtype = $(".order-type").val();

	if ($("#delivery").is(":checked")) gtype = '2'; else gtype = '1';



	$.post('/public/forms/order.php', {goods:goods, phone:phone, adress:adress, comment:comment, ves:ves, summ:summ, gtype:gtype}, function(data){
		$("body").append(data);
		_self.trigger('reset');

	})

});




$(".make-order-m").click( function(){
	var goods = '';
	$(".order-content-wrapper-m").find(".order-item").each(function(){
		gname = $(this).find(".item-name").text();
		price = $(this).find(".item-price").text();
		amount = $(this).find(".current-amout").text();
		itemimg = $(this).find(".item-img").attr("src");

		goods += `
			<div class="order-item">
				<div class="order-img__container">
					<img class="item-img" src="${itemimg}" alt="" />
				</div>
				<p class="item-name">
					${gname}
				</p>
				<div class="item-total">
					<span class="item-price">${price}</span>
					<span class="item-amount">${amount} шт</span>
				</div>
			</div>
	  		`;
	
		


		
	})

	phone = $("#basket-tel").val();
	adress = $("#basket-address").val();
	comment = $("#basket-connet").val();
	ves = $(".order-ves").text();
	summ = $(".total-amount-m").text();
	gtype = $(".order-type").val();

	if ($("#delivery").is(":checked")) gtype = '2'; else gtype = '1';



	$.post('/public/forms/order.php', {goods:goods, phone:phone, adress:adress, comment:comment, ves:ves, summ:summ, gtype:gtype}, function(data){
		$("body").append(data);
		_self.trigger('reset');

	})

});



$('.ajax-form').submit(function(e){
	e.preventDefault();
	var _self = $(this);
	var tel  = $(this).find("input[name=phone]").val();

	if ($(this).find("input[type=tel]").val().length < 8) alert('Введите номер телефона!')
	else
	{
		$.post('/public/forms/modal.php', $(this).serializeArray(), function(data){
			$("body").append(data);
			_self.trigger('reset');
			$('.modal-close').click();
			my_target('tzvonok');
		});
	}
});

function addCookie(name, val)
{
	exp = $("footer").attr("data-days");
	document.cookie = encodeURIComponent(name)+"="+encodeURIComponent(val)+"; expires=Thu, "+encodeURIComponent(exp)+" UTC; path=/";
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function checkCookieExists(cookieName) {
  // Получаем все куки в виде одной строки
  var cookies = document.cookie;
   
  // Ищем наше куки по имени с добавлением "=" в конец, чтобы точно совпадало имя
  var cookieStart = cookies.indexOf(cookieName + "=");
   
  // Если индекс найден и он равен 0 или после него идет '; ', значит куки существует
  if (cookieStart != -1) { 
    return true;
  }

  return false;
}

function fav_count()
{
	mcookie = getCookie("favorites");
	if (mcookie != undefined)
	{
		count = mcookie.split(',').filter(Boolean).length
		$(".h_fav").find(".right-corner__number").html(count);
	}
}

function cart_count()
{
	mcookie = getCookie("cart");
	if (mcookie != undefined) 
	{
		count = mcookie.split(',').filter(Boolean).length;
		$(".h_cart").find(".right-corner__number").html(count);
	}
}

