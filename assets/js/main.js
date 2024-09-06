/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
   navToggle = document.getElementById('nav-toggle'),
   navClose = document.getElementById('nav-close')

/* Menu show */
navToggle.addEventListener('click', () => {
   navMenu.classList.add('show-menu')
})

/* Menu hidden */
navClose.addEventListener('click', () => {
   navMenu.classList.remove('show-menu')
})

/*=============== SEARCH ===============*/
const search = document.getElementById('search'),
   searchBtn = document.getElementById('search-btn'),
   searchClose = document.getElementById('search-close')

/* Search show */
searchBtn.addEventListener('click', () => {
   search.classList.add('show-search')
})

/* Search hidden */
searchClose.addEventListener('click', () => {
   search.classList.remove('show-search')
})

/*=============== LOGIN ===============*/
const login = document.getElementById('login'),
   loginBtn = document.getElementById('login-btn'),
   loginClose = document.getElementById('login-close')

/* Login show */
loginBtn.addEventListener('click', () => {
   login.classList.add('show-login')
})

/* Login hidden */
loginClose.addEventListener('click', () => {
   login.classList.remove('show-login')
})

window.addEventListener("scroll", () => {
   const header = document.getElementById("header");
   header.classList.toggle("sticky", scrollY > 0);
});

window.addEventListener("scroll", () => {
   const donation = document.getElementById("donation");
   donation.classList.toggle("sticky_donation", scrollY > 0);
})


const btns = document.querySelectorAll(".nav__slider");
const slides = document.querySelectorAll(".image__banner");
const contents = document.querySelectorAll(".content");


var sliderNav = function (manual) {
   btns.forEach((btn) => {
      btn.classList.remove("active");
   });

   slides.forEach((slide) => {
      slide.classList.remove("active");
   });

   contents.forEach((content) => {
      content.classList.remove("active");
   })


   btns[manual].classList.add("active");
   slides[manual].classList.add("active");
   contents[manual].classList.add("active");
}

btns.forEach((btn, i) => {
   btn.addEventListener("click", () => {
      sliderNav(i);
   });
});



var swiper = new Swiper(".slide__content", {
   slidesPerView: 3,
   spaceBetween: 30,
   centerSlide: 'true',
   fade: 'true',
   grabCursor: 'true',
   loop: true,
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
   },
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },

   breakpoints: {
      0: {
         slidesPerView: 1,
      },
      520: {
         slidesPerView: 2,
      },
      950: {
         slidesPerView: 3,
      },
   },
});



var swiper = new Swiper(".box__versicle", {
   slidesPerGroup: 1,
   slidesPerView: 3,
   spaceBetween: 25,
   centerSlide: 'true',
   fade: 'true',
   grabCursor: 'true',
   loop: true,
   pagination: {
      el: ".swiper-pagination-versicle",
      clickable: true,
      dynamicBullets: true,
   },

   breakpoints: {
      0: {
         slidesPerView: 1,
      },
   },
});






/* FANCYBOX */
Fancybox.bind('[data-fancybox="gallery"]', {
   //
}); 


