document.addEventListener("DOMContentLoaded", function () {
	let toggleButton = document.getElementById("navbar-link");

	// Добавляем слушатель события клика на кнопке
	toggleButton?.addEventListener("click", function () {
		// Проверяем, есть ли у кнопки класс 'active'
		let isActive = toggleButton?.classList.contains("active");
	
		// Если есть, убираем класс и возвращаем изначальный цвет

		toggleButton?.classList.toggle("active");
	});

	// Добавляем слушатель события клика на любой другой части страницы
	document.addEventListener("click", function (event) {
		// Проверяем, был ли клик вне кнопки
		if (event.target !== toggleButton && !toggleButton.contains(event.target)) {
			// Убираем класс и возвращаем изначальный цвет
			toggleButton?.classList.remove("active");
			toggleButton.style.backgroundColor = ""; // Возвращаем изначальный цвет (пустое значение)
		}
	});
});

let imageElements = document.querySelectorAll(".product-image");
function getContrastColor(hexColor) {
	let r = parseInt(hexColor.slice(1, 3), 16);
	let g = parseInt(hexColor.slice(3, 5), 16);
	let b = parseInt(hexColor.slice(5, 7), 16);
	let brightness = (r * 299 + g * 587 + b * 114) / 1000;

	return brightness > 128 ? "#000" : "#fff";
}
imageElements.forEach(function (imageElement) {
	// Создаем canvas и получаем цвет фона изображения
	let canvas = document.createElement("canvas");
	let context = canvas.getContext("2d");
	context.drawImage(imageElement, 0, 0, 1, 1);
	let pixel = context.getImageData(0, 0, 1, 1).data;
	let bgColor =
		"#" +
		(
			"000000" + (pixel[2] + 256 * pixel[1] + 65536 * pixel[0]).toString(16)
		).slice(-6);
	// Устанавливаем контрастный цвет текста
	let textOverlay =
		imageElement.nextElementSibling.firstChild.nextElementSibling;
	textOverlay.style.color = getContrastColor(bgColor);
});

const questions = document.querySelectorAll(".question");
questions.forEach((question) => {
	const btn = question.querySelector(".dropdown");
	const text = question.querySelector(".question-text");
	const title = question.querySelector(".question-title");
	question?.addEventListener("click", (event) => {
		if (event.target === title || event.target === btn) {
			if (!question?.classList.contains("question-active")) {
				question?.classList.add("question-active");
				title?.classList.add("title-active");
				text?.classList.add("text-active");
				text?.classList.add("text-slide-in");
				text?.classList.remove("text-slide-out");
				btn?.classList.add("dropdown-active");
			} else {
				question?.classList.remove("question-active");
				title?.classList.remove("title-active");
				text?.classList.remove("text-active");
				text?.classList.remove("text-slide-in");
				text?.classList.add("text-slide-out");
				btn?.classList.remove("dropdown-active");
			}
		}
	});
});

const deliveryBtn = document.querySelector(".courier-delivery");
const pickupBtn = document.querySelector(".pick-up");
const deliveryBtnContent = document.querySelector(".courier-delivery-content");
const pickupBtnContent = document.querySelector(".pick-up-content");

deliveryBtn?.addEventListener("click", () => {
	if (!deliveryBtn?.classList.contains("delivery-button-active")) {
		deliveryBtn?.classList.add("delivery-button-active");
		deliveryBtnContent?.classList.remove("content-hidden");
		pickupBtn?.classList.remove("delivery-button-active");
		pickupBtnContent?.classList.add("content-hidden");
	}
});

pickupBtn?.addEventListener("click", () => {
	if (!pickupBtn?.classList.contains("delivery-button-active")) {
		pickupBtn?.classList.add("delivery-button-active");
		pickupBtnContent?.classList.remove("content-hidden");
		deliveryBtn?.classList.remove("delivery-button-active");
		deliveryBtnContent?.classList.add("content-hidden");
	}
});

const myinfoBtn = document.querySelector(".my-info-button");
const historyBtn = document.querySelector(".order-history-button");
const newsletterBtn = document.querySelector(".newsletter-button");
const infoContent = document.querySelector(".info");
const historyContent = document.querySelector(".history");
const newsletterContent = document.querySelector(".newsletter-wrapper");

myinfoBtn?.addEventListener("click", () => {
	if (!myinfoBtn?.classList.contains("personal-button-active")) {
		try {
			myinfoBtn?.classList.add("personal-button-active");
			historyBtn?.classList.remove("personal-button-active");
			newsletterBtn?.classList.remove("personal-button-active");
			infoContent?.classList.remove("content-hidden");
			historyContent?.classList.add("content-hidden");
			newsletterContent?.classList.add("content-hidden");
		} catch (error) {
			console.log(error);
		}
	}
});

historyBtn?.addEventListener("click", () => {
	if (!historyBtn?.classList.contains("personal-button-active")) {
		try {
			historyBtn?.classList.add("personal-button-active");
			myinfoBtn?.classList.remove("personal-button-active");
			newsletterBtn?.classList.remove("personal-button-active");
			infoContent?.classList.add("content-hidden");
			historyContent?.classList.remove("content-hidden");
			newsletterContent?.classList.add("content-hidden");
		} catch (error) {
			console.log(error);
		}
	}
});

newsletterBtn?.addEventListener("click", () => {
	if (!newsletterBtn?.classList.contains("personal-button-active")) {
		try {
			newsletterBtn?.classList.add("personal-button-active");
			myinfoBtn?.classList.remove("personal-button-active");
			historyBtn?.classList.remove("personal-button-active");
			infoContent?.classList.add("content-hidden");
			historyContent?.classList.add("content-hidden");
			newsletterContent?.classList.remove("content-hidden");
		} catch (error) {
			console.log(error);
		}
	}
});
const alcopopupbtn = document.querySelectorAll(".alco-popup-btn");
const popup = document.querySelector(".popup-wrapper");
const popupCloseAccept = document.querySelector(".alco-popup-close__accept");
const popupCloseDecline = document.querySelector(".alco-popup-close__decline");
popupCloseDecline?.addEventListener("click", () =>{
	popup.classList.remove("active");
})
popupCloseAccept?.addEventListener("click", () =>{
	popup.classList.remove("active");
})

alcopopupbtn?.forEach((e) => {
	e.addEventListener("click", () => {
		popup.classList.add("active");
	});
});

infos = document.querySelectorAll('.info-content')
infos.forEach(info => {
    const btn = info.querySelector('.change-button')
    const input = info.querySelector('.info-text')
    info?.addEventListener('mouseover', () => {
        input.disabled ? btn.classList.remove('content-hidden') : btn.classList.add('content-hidden');
        !input.disabled ? btn.classList.remove('content-hidden') : null;
    })
    info?.addEventListener('mouseout', () => {
        input.disabled ? btn.classList.add('content-hidden') : btn.classList.add('content-hidden');
        !input.disabled ? btn.classList.remove('content-hidden') : null;
    })
    btn.addEventListener('click', () => {
        if (input.disabled)
        {
            input.disabled = false
            input.focus()
        } else {
            input.disabled = true
        }
    })
    document.addEventListener('click', e => {
        if (!input.contains(e.target) && !btn.contains(e.target)) {
            input.disabled = true;
            btn.classList.add('content-hidden')
        }
    })
});
const orders = document.querySelectorAll(".order");

orders?.forEach((order) => {
	const dropwdown = order.querySelector(".dropdown");
	const orderAddress = order.querySelector(".order-address");
	const orderContent = order.querySelector(".order-content-wrapper");
	
	dropwdown.addEventListener("click", () => {
		if (!order.classList.contains("order-active")) {
			order.classList.add("order-active");
			dropwdown.classList.add("dropdown-active");
			orderAddress.classList.add("order-address-active");
			orderContent.classList.add("order-content-wrapper-active");
		} else {
			order.classList.remove("order-active");
			dropwdown.classList.remove("dropdown-active");
			orderAddress.classList.remove("order-address-active");
			orderContent.classList.remove("order-content-wrapper-active");
		}
	});
});

const registerBtn = document.querySelector('.register-btn')
const loginContainer = document.querySelector('.login')
const loginWrapper = document.querySelector('.login-wrapper')
const registerWrapper = document.querySelector('.register-wrapper')
const forgotPasswordBtn = document.querySelector('.forgot-password')
registerBtn?.addEventListener('click', () => {
    loginContainer.classList.add('register')
    loginContainer.classList.remove('login')
    loginWrapper.classList.add('hidden')
    registerBtn.classList.add('hidden')
    forgotPasswordBtn.classList.add('hidden')
    registerWrapper.classList.remove('hidden')
})

const mobileFilterBtn = document.querySelector('.mobile-filter__btn');
const mobileFilterClose = document.querySelector('.modal-catalog-close-btn');
const filterPopup = document.querySelector('.mobile-popup__wrapper');
mobileFilterBtn?.addEventListener('click', () => { 
	filterPopup.classList.add('active');
})
mobileFilterClose?.addEventListener('click', ()=> {
	filterPopup.classList.remove('active');
})

// const orderItems = document.querySelectorAll('.order-item')
// const empty = document.querySelector('.empty')
// const clearBasket = document.querySelector('.clear-basket')

// clearBasket?.addEventListener('click', () => {
//     orderItems.forEach(item => {
//         item.remove();
//         empty.classList.remove('hidden')
//     })
// })

// if (orderItems) {
//     orderItems.forEach(item => {
//         cancelBtn = item.querySelector('.cancel')
//         cancelBtn.addEventListener('click', () => {
//             item.remove();
//             document.querySelectorAll('.order-item').length == 0 ? empty.classList.remove('hidden') : null;
//         })
//     })
// } else {
//     empty.classList.remove('hidden')
// }
// BASKET REMOVAL

const orderItems = document.querySelectorAll('.order-item')
const empty = document.querySelector('.empty')
const clearBasket = document.querySelector('.clear-basket')

clearBasket?.addEventListener('click', () => {
    orderItems.forEach(item => {
        item.remove();
        empty.classList.remove('hidden')
    })
})


console.log(orderItems);
if (orderItems) {	
    orderItems.forEach(item => {
        cancelBtn = item.querySelector('.cancel')
        chooseAmount = item.querySelector('.choose-amount')
        decrease = item.querySelector('.decrease')
        increase = item.querySelector('.decrease')
        cancelBtn.addEventListener('click', () => {
            item.remove();
            document.querySelectorAll('.order-item').length == 0 ? empty.classList.remove('hidden') : null;
        })
        if (window.innerWidth < 767) {
            item.addEventListener('click', (e) => {
                cancel = item.querySelector('.cancel')
                if (e.target == item) {
                    console.log(e.target)
                    if (item.classList.contains('order-item-active')) {
                        item.classList.remove('order-item-active')
                        cancel.classList.remove('cancel-active')
                    } else {
                        item.classList.add('order-item-active')
                        cancel.classList.add('cancel-active')
                    }
                }
            })
        }
    })
} else {
    empty.classList.remove('hidden')
}

// CHANGE AMOUNT LOGIC

const chooseAmountBoxes = document.querySelectorAll('.choose-amount')
chooseAmountBoxes?.forEach(box => {
    const increaseBtn = box.querySelector('.increase')
    const decreaseBtn = box.querySelector('.decrease')
    const current = box.querySelector('.current-amout')
    increaseBtn?.addEventListener('click', () => {
        const value = parseFloat(current.innerHTML)
        current.innerHTML = value + 1
    })
    decreaseBtn?.addEventListener('click', () => {
        const value = parseFloat(current.innerHTML)
        value != 0 ? current.innerHTML = value - 1 : null;
    })
})

// CHECKBOX LOGIC

const deliveryMethods = document.querySelector('.delivery-methods')
const deliveryMethodsCheckboxes = deliveryMethods?.querySelectorAll('input')
const paymentMethods = document.querySelector('.payment-methods')
const paymentMethodsCheckboxes = paymentMethods?.querySelectorAll('input')

function uncheckAllDelivery(checkbox) {
    deliveryMethodsCheckboxes.forEach(cb => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    })
};

function uncheckAllPayment(checkbox) {
    paymentMethodsCheckboxes.forEach(cb => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    })
};
const catalogMobileBtn = document.querySelector('.catalog-mobile-btn')
const catalogOpenBtn = document.querySelector('.phone-round-catalog')
const modalMenu = document.querySelector('.modal-menu__wrapper')
const modalMenuWrapper = document.querySelector('.modal-menu')
const modalClose = document.querySelector('.modal-menu-close-btn')
const submenuBtn = document.querySelector('.submenu-open') 
const submenuWrapper = document.querySelector('.modal-sub-menu')
const submenuBackBtn = document.querySelector('.submenu-back')
const submenuClose = document.querySelector('.submenu-close')
catalogOpenBtn?.addEventListener('click',()=>{
	modalMenu.classList.add('active')
})
const subMenuBack = document.querySelector('.submenu-back')
subMenuBack?.addEventListener('click',()=>{
	modalMenuWrapper.classList.remove('d-none')
})
modalClose?.addEventListener('click',()=>{
	modalMenu.classList.remove('active')
})
catalogMobileBtn?.addEventListener('click',()=>{
	submenuWrapper.classList.add('active')

})
submenuBackBtn?.addEventListener('click',()=>{
	submenuWrapper.classList.remove('active')
	
})
submenuClose?.addEventListener('click',()=>{
	submenuWrapper.classList.remove('active')
	modalMenu.classList.remove('active')
})