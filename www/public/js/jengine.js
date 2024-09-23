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

	$('#submitForm').click(function(e) { // ПРОВЕРКА ОБЯЗАТЕЛЬНЫХ ПОЛЕЙ В БАКСКЕТЕ
		e.preventDefault();
		
		var email = $('#basket-email').val(); // мыло
		var delivery = $('input[name="cart_dost"]:checked').val(); // способ доставки
		var payment = $('input[name="cart_pay"]:checked').val(); // способ оплаты
		
		var isValid = true;
		var errorMessage = '';
	
		if (!email) {
			isValid = false;
			errorMessage += 'Пожалуйста, введите email.\n';
			$('#basket-email').addClass('error');
		} else {
			$('#basket-email').removeClass('error');
		}
	
		if (!delivery) {
			isValid = false;
			errorMessage += 'Пожалуйста, выберите способ доставки.\n';
			$('.delivery-methods').addClass('error');
		} else {
			$('.delivery-methods').removeClass('error');
		}
	
		if (!payment) {
			isValid = false;
			errorMessage += 'Пожалуйста, выберите способ оплаты.\n';
			$('.payment-methods').addClass('error');
		} else {
			$('.payment-methods').removeClass('error');
		}
	
		if (isValid) {
			// Если все поля заполнены, отправляем форму
			var _self = $('#form_basket');
			$.post('/public/forms/basket.php', _self.serializeArray(), function(data){
				$("body").append(data);
			});
			
		} else {
			// Если есть незаполненные поля, показываем сообщение об ошибке
			alert(errorMessage);
		}
	});
});



// ФОРМА ПОДПИСКИ НА РАССЫЛКУ

$('#subscribeForm').submit(function(event) {
	event.preventDefault();
	var email = $('input[name="email"]').val();
	$.ajax({
		type: 'POST',
		url: '/public/forms/subscribe.php', 
		data: {email: email},
		success: function(data) {
			alert('Email успешно отправлен!');
		},
		error: function(xhr, status, error) {
			alert('Error: ' + error);
		}
	});	
});





	

cart_count();
$(".add_to_cart, .buy-btn").click(function() {
	id = $(this).attr("data-id");
	
	if (checkCookieExists("cart") == false) 
	{	
		addCookie("cart", id+",");
		addCookie("cart_amount", id+"-1,");
		alert('Товар добавлен в корзину')    //                       						
	}
	else {
		mcookie = getCookie("cart");
		amount_mcookie = getCookie("cart_amount");
		if (mcookie != undefined && mcookie.includes(id+",") == false)
		{
			addCookie("cart", mcookie+id+",");
			addCookie("cart_amount", amount_mcookie+id+"-1,");
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

	amount_mcookie = getCookie("cart_amount");
	// Используем регулярное выражение для поиска и удаления id и количества
	let regex = new RegExp(id + '-\\d+,?', 'g');
	// Заменяем найденные совпадения на пустую строку
	amount_mcookie = amount_mcookie.replace(regex, '');
	// Убираем лишнюю запятую в конце, если она осталась
	amount_mcookie = amount_mcookie.replace(/,$/, '');
	addCookie("cart_amount", amount_mcookie);

	location.reload();
})

// Функция для обновления количества товара в куке
function updateCartAmountInCookie(id, newAmount) {
    let amount_mcookie = getCookie("cart_amount") || "";
    let regex = new RegExp(id + '-\\d+,?', 'g');

    // Если новое количество 0, удаляем товар из куки
    if (newAmount === 0) {
        amount_mcookie = amount_mcookie.replace(regex, '');
        amount_mcookie = amount_mcookie.replace(/,$/, ''); // Убираем запятую, если она осталась
    } else {
        // Если товар уже есть в куке, обновляем количество
        if (amount_mcookie.match(regex)) {
            amount_mcookie = amount_mcookie.replace(regex, id + '-' + newAmount + ',');
        } else {
            // Если товара нет в куке, добавляем его с новым количеством
            if (amount_mcookie.length > 0) {
                amount_mcookie += ',';
            }
            amount_mcookie += id + '-' + newAmount;
        }
    }

    addCookie("cart_amount", amount_mcookie);
    updateTotalPrice();
}

// Обработчик формы нажатия на кнопки + и -
// Обработка нажатия на кнопку "-"
$('.choose-amount .decrease').click(function(){
    var counter = $(this).siblings('.current-amout');
    var count = parseInt(counter.text()) - 1;
    count = count < 0 ? 0 : count; // Предотвратить отрицательное значение
    //alert(count)
    counter.text(count);

    // Обновляем куку с количеством товара
    let productId = $(this).data('id'); // Идентификатор товара
    updateCartAmountInCookie(productId, count);
});

// Обработка нажатия на кнопку "+"
$('.choose-amount button:contains("+")').click(function(){
    var counter = $(this).siblings('.current-amout');
    var count = parseInt(counter.text()) + 1;
    //alert(count)
    counter.text(count);

    // Обновляем куку с количеством товара
    let productId = $(this).data('id'); // Идентификатор товара
    updateCartAmountInCookie(productId, count);
});

function updateTotalPrice() {
  let totalPrice = 0;
  document.querySelectorAll('.order-item').forEach(item => {
    let currentAmount = parseInt(item.querySelector('.current-amout').textContent);
    let itemPrice = parseInt(item.querySelector('.item-price').textContent.replace('руб', '').trim());
    totalPrice += itemPrice * currentAmount;
  });
  document.querySelector('.total-amount').textContent = totalPrice + ' руб';
}

// Инициализация общей суммы при загрузке страницы
updateTotalPrice();





$(".make-order").click( function(){
	var goods = '';
	$(".order-item").each(function(){
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

